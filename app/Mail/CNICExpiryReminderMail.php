<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CNICExpiryReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $hrm;

    public function __construct($hrm)
    {
        $this->hrm = $hrm;
    }

    public function build()
    {
        return $this->subject('Reminder: CNIC Expiry Approaching')
                    ->view('emails.cnic_expiry_reminder');
    }
}
