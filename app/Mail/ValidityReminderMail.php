<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\HRM;

class ValidityReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $hrm;

    public function __construct(HRM $hrm)
    {
        $this->hrm = $hrm;
    }

    public function build()
    {
        return $this->subject('Validity Date Reminder')
                    ->view('emails.validity_reminder');
    }
}
