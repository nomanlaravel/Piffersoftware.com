<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LookBackReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $hrm;
    public $note;
    public $reminderNumber;

    public function __construct($hrm, $note, $reminderNumber)
    {
        $this->hrm = $hrm;
        $this->note = $note;
        $this->reminderNumber = $reminderNumber;
    }

    public function build()
    {
        return $this->subject("Look Back Reminder {$this->reminderNumber}")
                    ->view('emails.lookback-reminder'); // we will create this view
    }
}
