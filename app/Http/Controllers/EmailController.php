<?php

namespace App\Http\Controllers;

use App\Mail\CustomerBroadcastMail;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Storage;
use Twilio\Rest\Client;

class EmailController extends Controller
{
    public function send(Request $request)
    {
        // 1) Validate request
        $validated = $request->validate([
            'email_subject' => 'required|string|max:255',
            'email_message' => 'required|string',
            'customers' => 'nullable|array',
            'customers.*' => 'exists:customers,id',
            'send_to_all' => 'nullable|boolean',
            'send_whatsapp' => 'nullable|boolean',
            'emailAttachments' => 'nullable|array',
            'emailAttachments.*' => 'file|max:5120|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png,txt,zip',
        ], [
            'email_subject.required' => 'Email subject is required',
            'email_message.required' => 'Email message is required',
            'emailAttachments.*.max' => 'Attachment size must not exceed 5MB per file',
            'emailAttachments.*.mimes' => 'Invalid file type. Allowed: PDF, DOC, DOCX, XLS, XLSX, JPG, PNG, TXT, ZIP',
        ]);

        // 2) Build customers query
        $customersQuery = Customer::query()->where('notification_status', 1);

        if ($request->boolean('send_to_all')) {
            $excluded = $request->excluded_customers ?? [];

            $customersQuery = $customersQuery
                ->when(count($excluded) > 0, fn($q) => $q->whereNotIn('id', $excluded));

        } else {
            $selectedIds = $request->customers ?? [];
            $customersQuery = $customersQuery->whereIn('id', $selectedIds);
        }

        $customers = $customersQuery->get(['id', 'email', 'phone']);
        $recipientsEmail = $customers->pluck('email')->filter()->values()->toArray();

        if (!$request->boolean('send_whatsapp') && empty($recipientsEmail)) {
            return back()->with('error', 'No customers found with valid email addresses or notifications turned ON.');
        }

        // 4) Handle attachments
        $attachmentFullPaths = [];
        if ($request->hasFile('emailAttachments')) {
            try {
                foreach ($request->file('emailAttachments') as $file) {
                    $attachmentPath = $file->store('email_attachments', 'public');
                    $attachmentFullPaths[] = Storage::disk('public')->path($attachmentPath);
                }
            } catch (Exception $e) {
                Log::error('Failed to store attachments: ' . $e->getMessage());
                return back()->with('error', 'Failed to upload attachments. Please try again.');
            }
        }

        $whatsappReport = [
            'attempted' => 0,
            'sent' => 0,
            'failed' => 0,
            'errors' => [],
        ];

        try {
            // 5) Send EMAIL
            if (!empty($recipientsEmail)) {
                foreach ($recipientsEmail as $email) {
                    Mail::to($email)->send(
                        new CustomerBroadcastMail(
                            $request->email_subject,
                            $request->email_message,
                            $attachmentFullPaths
                        )
                    );
                }
            }

            // 6) Send WhatsApp
            if ($request->boolean('send_whatsapp') && $customers->count() > 0) {
                $twilioSid = env('TWILIO_ACCOUNT_SID');
                $twilioToken = env('TWILIO_AUTH_TOKEN');
                $from = env('TWILIO_WHATSAPP_FROM');

                if ($twilioSid && $twilioToken && $from) {
                    $client = new Client($twilioSid, $twilioToken);
                    foreach ($customers as $customer) {
                        $toE164 = $this->toE164Pakistan($customer->phone);
                        if (!$toE164) {
                            $whatsappReport['failed']++;
                            continue;
                        }
                        $whatsappReport['attempted']++;
                        try {
                            $client->messages->create(
                                "whatsapp:$toE164",
                                [
                                    'from' => $from,
                                    'body' => strip_tags($request->email_message),
                                ]
                            );
                            $whatsappReport['sent']++;
                        } catch (\Throwable $e) {
                            $whatsappReport['failed']++;
                            $whatsappReport['errors'][] = $e->getMessage();
                        }
                    }
                }
            }

            $msg = "Email sent successfully.";
            if ($request->boolean('send_whatsapp')) {
                $msg .= " WhatsApp: Sent {$whatsappReport['sent']}, Failed {$whatsappReport['failed']}.";
            }
            return back()->with('success', $msg);

        } catch (Exception $e) {
            Log::error('Broadcast sending failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to send broadcast.');
        }
    }

    private function toE164Pakistan(?string $phone): ?string
    {
        if (!$phone) return null;
        $phone = preg_replace('/[^0-9+]/', '', trim($phone));
        if (str_starts_with($phone, '+92') && strlen($phone) >= 13) return $phone;
        if (str_starts_with($phone, '92') && strlen($phone) >= 12) return '+' . $phone;
        if (str_starts_with($phone, '0') && strlen($phone) === 11) return '+92' . substr($phone, 1);
        if (str_starts_with($phone, '3') && strlen($phone) === 10) return '+92' . $phone;
        return null;
    }
}
