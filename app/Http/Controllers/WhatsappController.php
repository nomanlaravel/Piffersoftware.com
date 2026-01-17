<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\Customer; // adjust your model path
use Illuminate\Support\Facades\Mail; // if you already use Mail

class WhatsappController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'customer_ids' => ['required', 'array'],
            'message' => ['required', 'string'],
            'send_email' => ['nullable', 'boolean'],
            'send_whatsapp' => ['nullable', 'boolean'],
        ]);

        $customerIds = $request->customer_ids;
        $messageBody = $request->message;

        $customers = Customer::whereIn('id', $customerIds)->get();

        // ---------------------------
        // 1) SEND EMAIL (your existing logic)
        // ---------------------------
        if ($request->boolean('send_email')) {
            foreach ($customers as $customer) {
                if (!$customer->email) continue;

                // Replace with your current mail code
                Mail::raw($messageBody, function ($mail) use ($customer) {
                    $mail->to($customer->email)
                        ->subject('Admin Message');
                });
            }
        }

        // ---------------------------
        // 2) SEND WHATSAPP (Twilio)
        // ---------------------------
        $whatsappReport = [
            'attempted' => 0,
            'sent' => 0,
            'failed' => 0,
            'errors' => [],
        ];

        if ($request->boolean('send_whatsapp')) {

            $twilioSid = env('TWILIO_ACCOUNT_SID');
            $twilioToken = env('TWILIO_AUTH_TOKEN');
            $from = env('TWILIO_WHATSAPP_FROM'); // whatsapp:+14155238886 (sandbox)

            $client = new Client($twilioSid, $twilioToken);

            foreach ($customers as $customer) {

                // You must store customer whatsapp/phone
                $phone = $customer->phone ?? null; // change column if needed
                $toE164 = $this->toE164Pakistan($phone);

                if (!$toE164) continue;

                $to = "whatsapp:$toE164";
                $whatsappReport['attempted']++;

                try {
                    $client->messages->create($to, [
                        "from" => $from,
                        "body" => $messageBody,
                    ]);

                    $whatsappReport['sent']++;
                } catch (\Throwable $e) {
                    $whatsappReport['failed']++;

                    $whatsappReport['errors'][] = [
                        'customer_id' => $customer->id,
                        'phone' => $phone,
                        'error' => $e->getMessage(),
                    ];
                }
            }
        }

        return back()->with([
            'success' => 'Message sent successfully!',
            'whatsapp_report' => $whatsappReport,
        ]);
    }

    /**
     * Convert Pakistani phone numbers to E164 format.
     * Examples:
     * 0340xxxxxxx -> +92340xxxxxxx
     * 92340xxxxxxx -> +92340xxxxxxx
     * +92340xxxxxxx -> +92340xxxxxxx
     */
    private function toE164Pakistan(?string $phone): ?string
    {
        if (!$phone) return null;

        $phone = trim($phone);

        // allow + sign then digits only
        if (str_starts_with($phone, '+')) {
            $digits = '+' . preg_replace('/\D/', '', substr($phone, 1));
        } else {
            $digits = preg_replace('/\D/', '', $phone);
        }

        if (!$digits) return null;

        // already correct
        if (str_starts_with($digits, '+92') && strlen($digits) >= 13) return $digits;

        // starts with 92...
        if (str_starts_with($digits, '92') && strlen($digits) >= 12) return '+' . $digits;

        // starts with 0...
        if (str_starts_with($digits, '0')) return '+92' . substr($digits, 1);

        // starts with 3...
        if (str_starts_with($digits, '3') && strlen($digits) === 10) return '+92' . $digits;

        return null;
    }
}
