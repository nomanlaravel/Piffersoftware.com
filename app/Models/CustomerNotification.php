<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerNotification extends Model
{
    use HasFactory;

    protected $fillable = [
        'notification_no',
        'notification_related',
        'notification_of_month',
        'notification_attach',
        'notification_note',
        'notification_shared',
        'notification_ex_attach',
        'notification_ex_note',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id');
    }
}
