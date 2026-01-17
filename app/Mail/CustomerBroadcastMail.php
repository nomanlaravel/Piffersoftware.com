<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class CustomerBroadcastMail extends Mailable
{
    public function __construct(
        public string $subjectText,
        public string $bodyText,
        public ?string $attachmentPath = null // can be null
    ) {}

    public function build()
    {
        $mail = $this->subject($this->subjectText)
            ->view('admin.emails.customer_broadcast_mail')
            ->with([
                'body' => $this->bodyText,
            ]);

        // ✅ attach directly because it's already a full absolute path
        if (!empty($this->attachmentPath) && file_exists($this->attachmentPath)) {
            $mail->attach($this->attachmentPath);
        }

        return $mail;
    }
}
