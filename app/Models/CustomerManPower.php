<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerManPower extends Model
{
    use HasFactory;

    protected $fillable = [
        'man_post',
        'man_cat',
        'man_uni',
        'man_uni_no',
        'man_weapon',
        'man_ammu',
        'man_equip',
        'man_equip_attach',
        's_start_date',
        's_end_date',
        's_start_time',
        's_end_time',
        'man_start_date',
        'man_end_date',
        'man_start_time',
        'man_end_time',
        'man_quan',
        'man_hours',
        'man_jd_attach',
        'man_any_sp',
        'man_apr_l',
        'man_salary',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id');
    }
}
