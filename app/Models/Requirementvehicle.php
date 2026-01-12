<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirementvehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_ownership',
        'vehicle_type',
        'vehicle_category',
        'vehicle_required',
        'vehicle_mantenance',
        'vehicle_fuel',
        'vehicle_rate_per_km',
        'vehicle_km_required',
        'vehicle_toll',
        'vehicle_tol',
        'vehicle_meter_reading',
        'vehicle_meter_picture',
        'vehicle_reporting_time',
        'vehicle_reporting_address',
        'vehicle_rep_office_no',
        'vehicle_rep_floor',
        'vehicle_rep_building',
        'vehicle_rep_block',
        'vehicle_rep_area',
        'vehicle_rep_city',
        'vehicle_rep_picture',
        'vehicle_rep_location',
        'vehicle_duty_start_date',
        'vehicle_duty_end_date',
        'vehicle_duty_start_time',
        'vehicle_duty_end_time',
        'vehicle_shift_duration',
        'vehicle_no_of_shifts',
        'vehicle_req_with_driver',
        'vehicle_food_by_client',
        'vehicle_req_with_security',
        'vehicle_guard_category',
        'vehicle_guard_quantity',
        'vehicle_guard_shift_timing',
        'vehicle_guard_food_by_client',
        'vehicle_guard_accomodation',
        'vehicle_guard_transportation',
        'vehicle_guard_req_monthly',
        'vehicle_guard_req_dialy',
        'vehicle_guard_no',
        'vehicle_guard_notes',
        'vehicle_guard_attach',
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirements_id');
    }
}
