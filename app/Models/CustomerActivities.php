<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerActivities extends Model
{
    use HasFactory;

    protected $fillable = [
        'promotional_act',
        'promotional_quantity',
        'prom_price',
        'prom_date',
        'promotional_notes',
        'promotional_attach',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id');
    }
}
