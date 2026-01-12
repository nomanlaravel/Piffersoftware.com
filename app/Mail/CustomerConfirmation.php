<?php

namespace App\Mail;

use App\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $customer;

    /**
     * Create a new message instance.
     *
     * @param Customer $customer
     * @return void
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Customer Registration Confirmation')
                    ->view('emails.customer_confirmation')
                    ->with([
                        'customerName' => $this->customer->display_name_as,
                        'customerId' => $this->customer->id,
                        'viewUrl' => route('viewcustomer', ['id' => $this->customer->id])
                    ]);
    }
}
