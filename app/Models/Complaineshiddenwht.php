<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaineshiddenwht extends Model
{
    use HasFactory;

    protected $fillable = [
        'wc_hw_category',
        'wc_hw_social',
        'wc_hw_weapon',
        'wc_hw_monthly_rate',
        'wc_hw_total_monthly_rate',
        'wc_hw_wht',
        'wc_hw_salary',
        'wc_hw_group',
        'wc_hw_training_cost',
        'wc_hw_app_gst',
        'wc_hw_gst',
        'wc_hw_admin_cost',
        'wc_hw_rel_allowance',
        'wc_hw_eobi',
        'wc_hw_uni_cost',
        'wc_hw_hidden_admin_cost',
        'wc_hw_app_wht_per',
        'wc_hw_total_admin_cost',
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirements_id');
    }
}
