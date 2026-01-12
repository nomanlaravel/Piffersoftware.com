<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniformRecord extends Model
{
    use HasFactory;
    protected $fillable = [
        'uni_date', 'branch_id',
        'stand_uniform', 'white_sleeves', 'ssg_uniform', 't_shirt', 'lady_gown', 'suit', 'dms', 'standard_shows',
        'beige_color_shoes', 'whistile_n_dory', 'employee_card', 'p_gap', 'barret_cap', 'white_belt', 'black_belt',
        'sash', 'qamar_barand', 'white_gloves', 'white_arm_sleves', 'arm_band', 'scarf', 'winter_jacket',
        'high_visibility_jacket', 'jarsee', 'rain_coat', 'umbrella', 'torch', 'others',
        'supervisor_signature', 'manager_operation_signature', 'gm_signature',
    ];

    public function Ubranch()
    {
        return $this->belongsTo(Admin::class, 'branch_id');
    }

}
