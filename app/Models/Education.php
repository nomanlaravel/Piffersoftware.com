<?php

namespace App\Models;

use App\Models\Hrm;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'degree',
        'degree_date',
        'degree_pic',
        'institute_name',
        'a_body',
        'ex_notes',
        'degree_no',
        'degree_level',
        'obmarks',
        't_marks',
        'grade',
        'date_start',
        'date_end',
        'adress_inst',
        'deg_attach',
    ];

    public function hrm()
    {
        return $this->belongsTo(Hrm::class, 'hrms_id');
    }
}
