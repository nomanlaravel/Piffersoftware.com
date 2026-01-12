<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Training;
use App\Models\Hrm;
use App\Models\Customer;

class TrainingNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $training;
    public $guard;
    public $customer;
    public $recipientType;

    public function __construct(Training $training, ?Hrm $guard, ?Customer $customer = null, string $recipientType = 'guard')
    {
        $this->training = $training;
        $this->guard = $guard;
        $this->customer = $customer;
        $this->recipientType = $recipientType; // 'guard' or 'customer'
    }

    public function build()
    {
        return $this->subject('New Training Assignment')
                    ->view('emails.training_notification')
                    ->with([
                        'training' => $this->training,
                        'guard' => $this->guard,
                        'customer' => $this->customer,
                        'recipientType' => $this->recipientType,
                    ]);
    }
}
