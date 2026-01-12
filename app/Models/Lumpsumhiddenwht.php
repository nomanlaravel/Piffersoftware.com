<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lumpsumhiddenwht extends Model
{
    use HasFactory;

    protected $fillable = [
        'ls_hw_category',
        'ls_hw_uni_cost',
        'ls_hw_weapon_cost',
        'ls_hw_monthly_rate',
        'ls_hw_total_monthly_rate',
        'ls_hw_salary',
        'ls_hw_social',
        'ls_hw_training_cost',
        'ls_hw_app_gst',
        'ls_hw_gst',
        'ls_hw_admin_cost',
        'ls_hw_eobi',
        'ls_hw_group_life',
        'ls_hw_hidden_admin_cost',
        'ls_hw_app_wht_per',
        'ls_hw_wht',
        'ls_hw_total_admin_cost',
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirements_id');
    }
}
