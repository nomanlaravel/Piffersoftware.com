<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Customer;

class DepartmentConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $customer;
    public $department;

    public function __construct(Customer $customer, array $department)
    {
        $this->customer = $customer;
        $this->department = $department;
    }

    public function build()
    {
        return $this->subject('Customer Registration Confirmation')
            ->view('emails.customer_poc_confirmation')
            ->with([
                'customerName' => $this->customer->display_name_as,
                'customerId' => $this->customer->id,
                'viewUrl' => route('viewcustomer', ['id' => $this->customer->id]),
                'department' => $this->department,
            ]);
    }
}
