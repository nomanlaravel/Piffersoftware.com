<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class WhatsAppTestController extends Controller
{
    public function index()
    {
        return view('admin.whatsapp_test');
    }

    public function send(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'string'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $phone = $request->phone;
        $message = $request->message;

        $toE164 = $this->toE164Pakistan($phone);

        if (!$toE164) {
            return back()->with([
                'error' => 'Invalid phone format. Use like: 0340xxxxxxx or +92340xxxxxxx',
            ]);
        }

        try {
            $client = new Client(env('TWILIO_ACCOUNT_SID'), env('TWILIO_AUTH_TOKEN'));

            $msg = $client->messages->create(
                "whatsapp:$toE164",
                [
                    'from' => env('TWILIO_WHATSAPP_FROM'), // sandbox: whatsapp:+14155238886
                    'body' => $message,
                ]
            );

            return back()->with([
                'success' => "WhatsApp sent successfully! SID: {$msg->sid}",
            ]);

        } catch (\Throwable $e) {
            return back()->with([
                'error' => "Failed to send WhatsApp: " . $e->getMessage(),
            ]);
        }
    }

    private function toE164Pakistan(?string $phone): ?string
    {
        if (!$phone) return null;

        $phone = trim($phone);

        if (str_starts_with($phone, '+')) {
            $digits = '+' . preg_replace('/\D/', '', substr($phone, 1));
        } else {
            $digits = preg_replace('/\D/', '', $phone);
        }

        if (!$digits) return null;

        if (str_starts_with($digits, '+92') && strlen($digits) >= 13) return $digits;
        if (str_starts_with($digits, '92') && strlen($digits) >= 12) return '+' . $digits;
        if (str_starts_with($digits, '0')) return '+92' . substr($digits, 1);
        if (str_starts_with($digits, '3') && strlen($digits) === 10) return '+92' . $digits;

        return null;
    }
}
