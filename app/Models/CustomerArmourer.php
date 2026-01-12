<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerArmourer extends Model
{
    use HasFactory;

    protected $fillable = [
        'arm_branch_name',
        'arm_branch_id',
        'arm_site_id',
        'arm_client_name',
        'arm_weapon_no',
        'arm_weapon_bore',
        'arm_weapon_type',
        'arm_work_detail',
        'arm_sign_cus',
        'arm_auth',
        'arm_auth_no',
        'arm_auth_date',
        'arm_auth_issue',
        'arm_weapon_cleaned',
        'type_weapon_cleaned',
        'arm_pic_b',
        'arm_pic_a',
        'arm_cost_day',
        'arm_cost_bill',
        'arm_next_clean',
        'arm_auth_notes',
        'arm_auth_attach',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id');
    }


}
