<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requirementevent extends Model
{
    use HasFactory;

    protected $fillable = [
        'ownership_status',
        'event_req_for',
        'event_no_of_staff',
        'event_duty_start_date',
        'event_duty_end_date',
        'event_duty_start_time',
        'event_duty_end_time',
        'event_shift_duration',
        'event_shift_type',
        'event_no_of_shifts',
        'event_reporting_location',
        'event_office_no',
        'event_floor',
        'event_building',
        'event_block',
        'event_area',
        'event_city',
        'event_photo',
        'event_loc',
        'event_date',
        'event_venue',
        'event_deployment_plan',
        'event_security_notes',
        'event_security_attach',
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirements_id');
    }
}
