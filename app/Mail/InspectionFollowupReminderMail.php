<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\HRM;

class InspectionFollowupReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $hrm;

    public function __construct(HRM $hrm)
    {
        $this->hrm = $hrm;
    }

    public function build()
    {
        return $this->subject('🛠️ Inspection Follow-up Reminder')
                    ->view('emails.inspection_followup_reminder');
    }
}
