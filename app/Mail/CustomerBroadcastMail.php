<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class CustomerBroadcastMail extends Mailable
{
    public function __construct(
        public string $subjectText,
        public string $bodyText,
        public ?string $attachmentPath
    ) {}

    public function build()
    {
        $mail = $this->subject($this->subjectText)
            ->view('admin.emails.customer_broadcast_mail')
            ->with([
                'body' => $this->bodyText,
            ]);

        if ($this->attachmentPath) {
            $mail->attach(storage_path('app/' . $this->attachmentPath));
        }

        return $mail;
    }
}


