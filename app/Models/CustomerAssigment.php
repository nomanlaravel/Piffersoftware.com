<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAssigment extends Model
{
    use HasFactory;

    protected $fillable = [
        'asig_customer_name',
        'task_assigning',
        'asig_desig',
        'asig_office',
        'asig_building',
        'asig_road',
        'asig_area',
        'asig_city',
        'asig_country',
        'asig_security',
        'asig_contact',
        'incharge_name',
        'incharge_desig',
        'incharge_contact',
        'incharge_help',
        'incharge_desc',
        'incharge_risk',
        'incharge_asig',
        'incharge_signed_by',
        'incharge_date',
        'incharge_offc',
        'incharge_floor',
        'incharge_build',
        'incharge_block',
        'incharge_area',
        'incharge_city',
        'incharge_pin',
        'longitude4',
        'latitude4',
        'incharge_country',
        'incharge_site',
        'incharge_a_g',
        'incharge_a_ung',
        'incharge_t_g',
        'rec_inc_rel',
        'feq_occ',
        'exp_piff',
        'any_spec',
        'petr_instruc',
        'asig_ex_attach',
        'asig_ex_notes',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id');
    }
}
