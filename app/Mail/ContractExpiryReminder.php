<?php

namespace App\Mail;

use App\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContractExpiryReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }


public function build()
{
    // return $this->markdown('emails.contract_expiry')
    //             ->subject('Contract Expiry Reminder');

                return $this->subject('Reminder: Your contract will end soon')
                ->view('emails.contract_expiry')
                ->with([
                    'customer' => $this->customer,
                ]);
}

}
