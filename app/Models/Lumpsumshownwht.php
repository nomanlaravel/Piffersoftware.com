<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lumpsumshownwht extends Model
{
    use HasFactory;
    protected $fillable = [
        'ls_sw_category',
        'ls_sw_social',
        'ls_sw_weapon_cost',
        'ls_sw_monthly_rate',
        'ls_sw_total_monthly_rate',
        'ls_sw_salary',
        'ls_sw_group_life',
        'ls_sw_training_cost',
        'ls_sw_app_gst',
        'ls_sw_gst',
        'ls_sw_eobi',
        'ls_sw_uni_cost',
        'ls_sw_admin_cost',
        'ls_sw_app_wht',
        'ls_sw_wht',
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirements_id');
    }
}
