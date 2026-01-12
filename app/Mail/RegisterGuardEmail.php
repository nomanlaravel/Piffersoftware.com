<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegisterGuardEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $guardName;
public $position;
public $startDate;
public $loginUrl;

public function __construct($guardName, $position = null, $startDate = null, $loginUrl = null)
{
    $this->guardName = $guardName;
    $this->position  = $position;
    $this->startDate = $startDate;
    $this->loginUrl  = $loginUrl;
}

public function content(): Content
{
    return new Content(
        view: 'emails.guard_welcome',
        with: [
            'guardName' => $this->guardName,
            'position'  => $this->position,
            'startDate' => $this->startDate,
            'loginUrl'  => $this->loginUrl,
        ]
    );
}
}
