<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegisteredMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $rawPassword; // <- NEW

    public function __construct($user, $rawPassword)
    {
        $this->user = $user;
        $this->rawPassword = $rawPassword; // <- NEW
    }

    public function build()
    {
        return $this->subject('Your Login Credentials')
                    ->view('emails.customeradded');
    }
}

