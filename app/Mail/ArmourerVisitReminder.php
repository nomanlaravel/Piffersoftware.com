<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\CustomerArmourer;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ArmourerVisitReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $armourer;

    public function __construct(CustomerArmourer $armourer)
    {
        $this->armourer = $armourer;
    }
    public function build()
        {
            return $this->subject('Reminder: Armourer Visit Due')
                ->view('emails.armourer_reminder')
                ->with([
                    'armourer' => $this->armourer,
                ]);
        }
}
