<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirementcanine extends Model
{
    use HasFactory;

    protected $fillable = [
        'canine_req_for',
        'canine_category',
        'canine_req_for_days',
        'canine_color',
        'canine_no',
        'canine_req_handler',
        'canine_handler_name',
        'canine_handler_cnic_no',
        'canine_handler_age',
        'canine_handler_exp',
        'canine_handler_cell',
        'canine_handler_cnic_front',
        'canine_handler_cnic_back',
        'canine_duty_start_date',
        'canine_duty_end_date',
        'canine_duty_start_time',
        'canine_duty_end_time',
        'canine_shift_duration',
        'canine_no_of_shifts',
        'canine_pic_of_dogs',
        'canine_notes',
        'canine_attach',
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirements_id');
    }
}
