<?php

namespace App\Models;

use App\Models\Hrm;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'org_name',
        'email_oc',
        'poc',
        'jec',
        'jec_attach',
        'w_desig',
        'w_salary',
        'ser_tenure',
        'ser_other',
        'achivement',
        'join_date',
        'end_date',
        't_exp',
    ];

    public function hrm()
    {
        return $this->belongsTo(Hrm::class, 'hrms_id');
    }
}
