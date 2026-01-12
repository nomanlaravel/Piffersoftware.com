<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerBussiness extends Model
{
    use HasFactory;

    protected $fillable = [
        'cb_name',
        'cb_desig',
        'cb_comp_name',
        'cb_email',
        'cb_cno',
        'bussiness_name',
        'bussiness_nature',
        'bussiness_office_no',
        'bussiness_floor',
        'bussiness_building',
        'bussiness_block',
        'bussiness_area',
        'bussiness_city',
        'bussiness_photo',
        'bussiness_email',
        'bussiness_web',
        'bussiness_pin',
        'longitude5',
        'latitude5',
        'bussiness_notes',
        'bussiness_attach',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id');
    }
}
