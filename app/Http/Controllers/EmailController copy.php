<?php
namespace App\Http\Controllers;

use App\Mail\CustomerBroadcastMail;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send(Request $request)
    {
        // 1. Validate request
        $validated = $request->validate([
            'email_subject' => 'required|string|max:255',
            'email_message' => 'required|string',
            'customers' => 'nullable|array',
            'customers.*' => 'exists:customers,id',
            'send_to_all' => 'nullable|boolean',
            'emailAttachment' => 'nullable|file|max:5120|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png,txt,zip',
        ], [
            'email_subject.required' => 'Email subject is required',
            'email_message.required' => 'Email message is required',
            'emailAttachment.max' => 'Attachment size must not exceed 5MB',
            'emailAttachment.mimes' => 'Invalid file type. Allowed: PDF, DOC, DOCX, XLS, XLSX, JPG, PNG, TXT, ZIP',
        ]);

        if ($request->boolean('send_to_all')) {
            $excluded = $request->excluded_customers ?? [];

            // Check if ANY applicable customers exist regardless of notification status
            $totalApplicable = Customer::query()
                ->when(count($excluded) > 0, fn($q) => $q->whereNotIn('id', $excluded))
                ->count();

            $recipients = Customer::query()
                ->where('notification_status', 1)
                ->when(count($excluded) > 0, fn($q) => $q->whereNotIn('id', $excluded))
                ->pluck('email')
                ->toArray();
        } else {
            $selectedIds = $request->customers ?? [];
            $totalApplicable = count($selectedIds);

            $recipients = Customer::whereIn('id', $selectedIds)
                ->where('notification_status', 1)
                ->pluck('email')
                ->toArray();
        }

        $recipientsEmail = array_filter($recipients, fn($r) => !empty($r));

        // Check if we have any valid recipients
        if (empty($recipientsEmail)) {
            if ($totalApplicable > 0) {
                return back()->with('error', 'Email sending failed: Selected customer(s) have notifications turned OFF.');
            }
            return back()->withErrors(['customers' => 'No customers found with valid email addresses'])->withInput();
        }

        // 3. Handle attachment
        $attachmentPath = null;

        if ($request->hasFile('emailAttachment')) {
            try {
                $file = $request->file('emailAttachment');
                $attachmentPath = $file->store('email_attachments', 'public');
            } catch (Exception $e) {
                Log::error('Failed to store attachment: ' . $e->getMessage());
                return back()->withErrors(['emailAttachment' => 'Failed to upload attachment. Please try again.'])->withInput();
            }
        }

        try {
            // 4. Send emails (NO QUEUE)
            foreach ($recipientsEmail as $email) {
                Mail::to($email)->send(
                    new CustomerBroadcastMail(
                        $request->email_subject,
                        $request->email_message,
                        $attachmentPath
                    )
                );
            }

            return back()->with('success', 'Email sent successfully to customers.');
        } catch (Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to send email. Please check your mail configuration.');
        }
    }

}
