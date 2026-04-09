<?php

namespace App\Actions;

use App\Models\WhatsappMessageLog;
use App\Services\WhatsApp\NeuapixWhatsAppService;

class SendWhatsAppNotification
{
    public function __construct(
        private readonly NeuapixWhatsAppService $whatsAppService
    ) {}

   public function execute(
    string $phone,
    string $message,
    ?string $eventType = null,
    $user = null
): array {

    $result = $this->whatsAppService->sendText(
        to: $phone,
        message: $message,
        user: $user // ✅ pass user
    );

    if ($result['success'] && $user instanceof \Illuminate\Database\Eloquent\Model) {
        // Only update if the model has this specific column/attribute
        // This makes the setup generic for any model that has the tracking column
        try {
            $user->forceFill([
                'last_whatsapp_interaction_at' => now()
            ])->save();
        } catch (\Exception $e) {
            // Log or ignore if the model doesn't have this column
            \Illuminate\Support\Facades\Log::warning("Model " . get_class($user) . " does not have 'last_whatsapp_interaction_at' column.");
        }
    }

    // logging remains same
    return $result;
}
}