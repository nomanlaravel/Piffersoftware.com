<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class UsageMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'usage_vehicle_no',
        'avg_per_liter',
        'date_of_m',
        'time_from',
        'time_to',
        'details_of_j',
        'purpose_of_j',
        'name_of_officer',
        'meter_reading_to',
        'meter_reading_from',
        'distance_covered',
        'signature',
        'p_o_l',
        'remarks',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admins_id');
    }
}
