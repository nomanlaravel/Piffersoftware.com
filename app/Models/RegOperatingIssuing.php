<?php

namespace App\Models;

use App\Models\Regulator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegOperatingIssuing extends Model
{
    use HasFactory;

    protected $fillable = [
        'oper_iss_co_name',
        'oper_iss_co_desig',
        'oper_iss_co_dept',
        'oper_iss_co_section',
        'oper_iss_co_ptcl',
        'oper_iss_co_cell',
        'oper_iss_co_email',
        'oper_iss_co_web',
        'oper_iss_co_front',
        'oper_iss_co_back',
        'oper_iss_co_notes',
        'oper_iss_co_attach',
    ];

    public function regulator()
    {
        return $this->belongsTo(Regulator::class, 'regulators_id');
    }

}
