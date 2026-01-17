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
            'send_whatsapp' => 'nullable|boolean', // ✅ added
            'emailAttachment' => 'nullable|file|max:5120|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png,txt,zip',
        ], [
            'email_subject.required' => 'Email subject is required',
            'email_message.required' => 'Email message is required',
            'emailAttachment.max' => 'Attachment size must not exceed 5MB',
            'emailAttachment.mimes' => 'Invalid file type. Allowed: PDF, DOC, DOCX, XLS, XLSX, JPG, PNG, TXT, ZIP',
        ]);

        // 2) Build customers query
        $customersQuery = Customer::query()->where('notification_status', 1);

        if ($request->boolean('send_to_all')) {
            $excluded = $request->excluded_customers ?? [];

            // total customers (even if notifications off)
            $totalApplicable = Customer::query()
                ->when(count($excluded) > 0, fn($q) => $q->whereNotIn('id', $excluded))
                ->count();

            $customersQuery = $customersQuery
                ->when(count($excluded) > 0, fn($q) => $q->whereNotIn('id', $excluded));

        } else {
            $selectedIds = $request->customers ?? [];
            $totalApplicable = count($selectedIds);

            $customersQuery = $customersQuery->whereIn('id', $selectedIds);
        }

        // ✅ fetch customers once (email + whatsapp from same list)
        $customers = $customersQuery->get(['id', 'email', 'phone']);
        // change 'phone' column if you use 'whatsapp_number'

        // 3) Get recipients emails
        $recipientsEmail = $customers->pluck('email')->filter()->values()->toArray();

        // if email is requested but none exists
        if (!$request->boolean('send_whatsapp') && empty($recipientsEmail)) {
            if ($totalApplicable > 0) {
                return back()->with('error', 'Email sending failed: Selected customer(s) have notifications turned OFF.');
            }
            return back()->with('error', 'No customers found with valid email addresses');
        }

        // 4) Handle attachment
        $attachmentPath = null;
        $attachmentFullPath = null;

        if ($request->hasFile('emailAttachment')) {
            try {
                $file = $request->file('emailAttachment');
                $attachmentPath = $file->store('email_attachments', 'public');

                $attachmentFullPath = Storage::disk('public')->path($attachmentPath);
               } catch (Exception $e) {
                Log::error('Failed to store attachment: ' . $e->getMessage());
                return back()->with('error', 'Failed to upload attachment. Please try again.');
            }
        }

        // --- REPORTS ---
        $whatsappReport = [
            'attempted' => 0,
            'sent' => 0,
            'failed' => 0,
            'errors' => [],
        ];

        try {

            // 5) Send EMAIL (NO QUEUE)
            if (!empty($recipientsEmail)) {
                foreach ($recipientsEmail as $email) {
                    Mail::to($email)->send(
    new CustomerBroadcastMail(
        $request->email_subject,
        $request->email_message,
        $attachmentFullPath // ✅ full absolute path
    )
);
                }
            }

            // 6) Send WhatsApp (Twilio) in same controller
            if ($request->boolean('send_whatsapp')) {

                $twilioSid = env('TWILIO_ACCOUNT_SID');
                $twilioToken = env('TWILIO_AUTH_TOKEN');
                $from = env('TWILIO_WHATSAPP_FROM'); // sandbox: whatsapp:+14155238886

                if (!$twilioSid || !$twilioToken || !$from) {
                    return back()->with('error', 'WhatsApp config missing in .env (TWILIO_ACCOUNT_SID, TWILIO_AUTH_TOKEN, TWILIO_WHATSAPP_FROM)');
                }

                $client = new Client($twilioSid, $twilioToken);

                foreach ($customers as $customer) {

                    $toE164 = $this->toE164Pakistan($customer->phone);

                    if (!$toE164) {
                        $whatsappReport['failed']++;
                        $whatsappReport['errors'][] = [
                            'customer_id' => $customer->id,
                            'phone' => $customer->phone,
                            'error' => 'Invalid phone number format',
                        ];
                        continue;
                    }

                    $whatsappReport['attempted']++;

                    try {
                        $msg = $client->messages->create(
                            "whatsapp:$toE164",
                            [
                                'from' => $from,
                                'body' => strip_tags($request->email_message), // WhatsApp text only
                            ]
                        );

                        $whatsappReport['sent']++;
                    } catch (\Throwable $e) {
                        $whatsappReport['failed']++;
                        $whatsappReport['errors'][] = [
                            'customer_id' => $customer->id,
                            'phone' => $toE164,
                            'error' => $e->getMessage(),
                        ];
                    }
                }
            }

            // ✅ Final Success message
            $msg = "Email sent successfully to customers.";
            if ($request->boolean('send_whatsapp')) {
                $msg .= " WhatsApp: Sent {$whatsappReport['sent']}, Failed {$whatsappReport['failed']}.";
            }

            return back()->with([
                'success' => $msg,
                'whatsapp_report' => $whatsappReport
            ]);

        } catch (Exception $e) {
            Log::error('Broadcast sending failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to send broadcast. Please check logs.');
        }
    }

    /**
     * Convert Pakistani numbers to E164 format
     */
    // private function toE164Pakistan(?string $phone): ?string
    // {
    //     if (!$phone) return null;

    //     $phone = trim($phone);

    //     if (str_starts_with($phone, '+')) {
    //         $digits = '+' . preg_replace('/\D/', '', substr($phone, 1));
    //     } else {
    //         $digits = preg_replace('/\D/', '', $phone);
    //     }

    //     if (!$digits) return null;

    //     if (str_starts_with($digits, '+92') && strlen($digits) >= 13) return $digits;
    //     if (str_starts_with($digits, '92') && strlen($digits) >= 12) return '+' . $digits;
    //     if (str_starts_with($digits, '0')) return '+92' . substr($digits, 1);
    //     if (str_starts_with($digits, '3') && strlen($digits) === 10) return '+92' . $digits;

    //     return null;
    // }

    private function toE164Pakistan(?string $phone): ?string
    {
        if (!$phone)
            return null;

        $phone = trim($phone);

        // ✅ remove spaces, dashes, brackets etc
        // 0340-4556573 -> 03404556573
        $phone = preg_replace('/[^0-9+]/', '', $phone);

        if (!$phone)
            return null;

        // already correct
        if (str_starts_with($phone, '+92') && strlen($phone) >= 13) {
            return $phone;
        }

        // 92340xxxxxxx -> +92340xxxxxxx
        if (str_starts_with($phone, '92') && strlen($phone) >= 12) {
            return '+' . $phone;
        }

        // 0340xxxxxxx -> +92340xxxxxxx
        if (str_starts_with($phone, '0') && strlen($phone) === 11) {
            return '+92' . substr($phone, 1);
        }

        // 340xxxxxxx -> +92340xxxxxxx
        if (str_starts_with($phone, '3') && strlen($phone) === 10) {
            return '+92' . $phone;
        }

        return null;
    }

}
