<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_no',
        'types',
        'sizes',
        'quantity',
        'unit_price',
        'tax',
        'total',
        'remarks'
    ];

    public function billing()
    {
        return $this->belongsTo(Billing::class, 'billing_id');
    }
}
