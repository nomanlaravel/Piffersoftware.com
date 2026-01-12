<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requirementfacilitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'guest_arrival_time',
        'security_reporting_time',
        'photograph_of_guest',
        'photograph_of_passport',
        'nationality_of_guest',
        'security_staff_rep_loc',
        'airline_details',
        'name_of_airline',
        'contact_of_airline',
        'email_of_airline',
        'web_of_airline',
        'poc_of_airline',
        'facility_poc_name',
        'facility_poc_desig',
        'facility_poc_contact',
        'facility_poc_email',
        'facility_poc_office',
        'facility_poc_floor',
        'facility_poc_building',
        'facility_poc_block',
        'facility_poc_area',
        'facility_poc_city',
        'facility_poc_building',
        'facility_poc_loc',
        'flight_number',
        'flying_from',
        'guest_number',
        'copy_of_guest_ticket',
        'copy_of_guest_visa',
        'guest_schedule',
        'hand_carry',
        'luggage_weight',
        'tag_number',
        'color_of_bags',
        'weight_of_bags',
        'picture_of_bags',
        'facilitation_notes',
        'facilitation_attach',
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirements_id');
    }
}
