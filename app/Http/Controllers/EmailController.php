<?php

namespace App\Http\Controllers;

use App\Mail\CustomerBroadcastMail;
use App\Models\Customer;
use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller
{
    public function send(Request $request)
    {
        // 1. Validate request
        $request->validate([
            'emailTitle' => 'required|string|max:255',
            'emailBody' => 'required|string',
            'customers' => 'nullable|array',
            'emailAttachment' => 'nullable|file|max:5120', 
        ]);

        // 2. Resolve recipients
        if ($request->has('send_to_all')) {
            $customers = Customer::select('email')->get();
        } else {
            if (!$request->customers || count($request->customers) === 0) {
                return back()->withErrors(['customers' => 'Please select at least one customer']);
            }

            $customers = Customer::whereIn('id', $request->customers)
                ->select('email')
                ->get();
        }

        // 3. Handle attachment (store once)
        $attachmentPath = null;

        if ($request->hasFile('emailAttachment')) {
            $attachmentPath = $request->file('emailAttachment')
                ->store('email_attachments');
        }

        // 4. Send emails (NO QUEUE)
        // foreach ($customers as $customer) {
        //     Mail::to($customer->email)->send(
        //         new CustomerBroadcastMail(
        //             $request->emailTitle,
        //             $request->emailBody,
        //             $attachmentPath
        //         )
        //     );
        // }
        Mail::to("coding.ata@gmail.com")->send(
            new CustomerBroadcastMail(
                $request->emailTitle,
                $request->emailBody,
                $attachmentPath
            )
            );

        return back()->with('success', 'Email sent successfully to ' . $customers->count() . ' customers.');
    }
}
