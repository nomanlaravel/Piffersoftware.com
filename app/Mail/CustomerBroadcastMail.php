<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class CustomerBroadcastMail extends Mailable
{
    /**
     * @param string $subjectText
     * @param string $bodyText
     * @param string[] $attachmentPaths Array of absolute paths to files
     */
    public function __construct(
        public string $subjectText,
        public string $bodyText,
        public array $attachmentPaths = []
    ) {}

    public function build()
    {
        $mail = $this->subject($this->subjectText)
            ->view('admin.emails.customer_broadcast_mail')
            ->with([
                'body' => $this->bodyText,
            ]);

        if (!empty($this->attachmentPaths)) {
            foreach ($this->attachmentPaths as $path) {
                if (file_exists($path)) {
                    $mail->attach($path);
                }
            }
        }

        return $mail;
    }
}
