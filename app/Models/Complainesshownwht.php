<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complainesshownwht extends Model
{
    use HasFactory;
    protected $fillable = [
        'wc_sw_category',
        'wc_sw_social_check',
        'wc_sw_weapon',
        'wc_sw_monthly_rate',
        'wc_sw_total_monthly_rate',
        'wc_sw_salary',
        'wc_sw_group',
        'wc_sw_training_cost',
        'wc_sw_app_gst',
        'wc_sw_monthly_gst',
        'wc_sw_rel_allowance',
        'wc_sw_eobi',
        'wc_sw_uni_cost',
        'wc_sw_app_wht',
        'wc_sw_wht',
        'wc_sw_admin_cost',
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirements_id');
    }
}
