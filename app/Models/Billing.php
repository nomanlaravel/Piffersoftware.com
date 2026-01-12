<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor',
        'po_number',
        'bill_date',
        'bill_number',
        'payment_terms',
        'payment_details',
        'payment_mode',
        'bank_name',
        'cheque_number',
        'ins_number',
        'attachments',
    ];

    public function billingProducts()
    {
        return $this->hasMany(BillingProduct::class, 'billing_id');
    }
}
