<?php

namespace App\Services\WhatsApp;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

class NeuapixWhatsAppService
{
    public function sendText($to, $message, $user = null, $templateName = null, $templateParameters = null, ?string $category = null, ?array $fullComponents = null): array
    {
        $to = $this->normalizePhone($to);  // ✅ ALWAYS use passed phone

            if (!config('services.neuapix.enabled')) {
            return [
                'success' => false,
                'message' => 'WhatsApp sending is disabled.',
            ];
        }

        $token = config('services.neuapix.token');
        $baseUrl = rtrim(config('services.neuapix.base_url'), '/');
        $phoneNumberId = config('services.neuapix.phone_number_id');
        $timeout = (int) config('services.neuapix.timeout', 15);
        $version = config('services.neuapix.version', 'v3');

        if (!$token || !$baseUrl || !$phoneNumberId) {
            Log::error('NeuAPIX config missing.', [
                'token_exists' => !empty($token),
                'base_url' => $baseUrl,
                'phone_number_id' => $phoneNumberId,
            ]);

            return [
                'success' => false,
                'message' => 'NeuAPIX configuration is incomplete.',
            ];
        }

        $url = "{$baseUrl}/whatsapp/{$version}/{$phoneNumberId}/messages";

        if ($this->canSendFreeText($user)) {
            $payload = [
                'messaging_product' => 'whatsapp',
                'recipient_type' => 'individual',
                'to' => $to,
                'type' => 'text',
                'text' => [
                    'preview_url' => true,
                    'body' => $message,
                ],
            ];
        } else {
            // Default template if no session is active
            $templateName = $templateName ?? 'welcome_message_new'; // User should ensure this exists in NeuAPIX
            $payload = [
                'messaging_product' => 'whatsapp',
                'recipient_type' => 'individual',
                'to' => $to,
                'type' => 'template',
                'template' => [
                    'name' => $templateName,
                    'language' => [
                        'code' => 'en',
                    ],
                    'components' => $fullComponents ?? [
                        [
                            'type' => 'body',
                            'parameters' => $templateParameters ?? [
                                ['type' => 'text', 'text' => 'User'],
                            ],
                        ],
                    ],
                ],
            ];
        }

        try {
            $response = Http::timeout($timeout)
                ->withToken($token)
                ->acceptJson()
                ->post($url, $payload);

            $responseData = $response->json();

            if (!$response->successful()) {
                Log::error('NeuAPIX request failed.', [
                    'url' => $url,
                    'payload' => $payload,
                    'status' => $response->status(),
                    'response' => $responseData ?: $response->body(),
                ]);

                return [
                    'success' => false,
                    'status' => $response->status(),
                    'message' => $responseData['message'] ?? 'WhatsApp API request failed.',
                    'response' => $responseData,
                ];
            }

            Log::info('NeuAPIX WhatsApp sent successfully.', [
                'to' => $payload['to'],
                'payload' => $payload,
                'response' => $responseData,
            ]);

            return [
                'success' => true,
                'status' => $response->status(),
                'message' => 'WhatsApp request accepted. ID: ' . (data_get($responseData, 'messages.0.id') ?? 'N/A'),
                'whatsapp_id' => data_get($responseData, 'messages.0.id'),
                'response' => $responseData,
            ];
        } catch (Throwable $e) {
            Log::error('NeuAPIX exception.', [
                'to' => $to,
                'error' => $e->getMessage(),
            ]);

            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }

    private function canSendFreeText($user): bool
    {
        if (!$user || !$user->last_whatsapp_interaction_at) {
            Log::info("WhatsApp session: No previous interaction found for this user. Sending Template.");
            return false;
        }

        try {
            $lastInteraction = \Illuminate\Support\Carbon::parse($user->last_whatsapp_interaction_at);
            $isWithin24Hours = now()->diffInHours($lastInteraction) <= 24;

            Log::info("WhatsApp session check:", [
                'last_interaction' => $lastInteraction->toDateTimeString(),
                'hours_since' => now()->diffInHours($lastInteraction),
                'is_within_24h' => $isWithin24Hours
            ]);

            return $isWithin24Hours;
        } catch (\Exception $e) {
            Log::error("WhatsApp session check failed: " . $e->getMessage());
            return false;
        }
    }

    private function normalizePhone($phone): ?string
    {
        // Remove everything except digits
        $phone = preg_replace('/\D+/', '', $phone);

        // Handle Pakistan numbers
        if (str_starts_with($phone, '0')) {
            // 0342xxxxxxx → 92342xxxxxxx
            $phone = '92' . substr($phone, 1);
        } elseif (str_starts_with($phone, '92')) {
            // Already correct → do nothing
        } elseif (str_starts_with($phone, '3')) {
            // 342xxxxxxx → 92342xxxxxxx
            $phone = '92' . $phone;
        } else {
            // Invalid format
            return null;
        }

        // Validate final length (Pakistan = 12 digits: 92 + 10 digits)
        if (strlen($phone) !== 12) {
            return null;
        }

        return $phone;
    }
}
