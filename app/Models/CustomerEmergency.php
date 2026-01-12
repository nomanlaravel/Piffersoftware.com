<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerEmergency extends Model
{
    use HasFactory;

    protected $fillable = [
        'emer_ser',
        'emer_pic',
        'emer_poc_name',
        'emer_poc_desig',
        'emer_poc_cell',
        'emer_poc_email',
        'emer_poc_notes',
        'emer_poc_attach',
        'emer_office',
        'emer_floor',
        'emer_building',
        'emer_block',
        'emer_area',
        'emer_city',
        'emer_loc',
        'emer_email',
        'emer_web',
        'emer_pin',
        'longitude2',
        'latitude2',
        'emer_app_rental',
        'emer_attach',
        'emer_note',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id');
    }
}
