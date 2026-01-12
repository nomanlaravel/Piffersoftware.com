<?php

namespace App\Models;

use App\Models\Regulator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegWeaponIssuing extends Model
{
    use HasFactory;

    protected $fillable = [
        'wep_iss_co_name',
        'wep_iss_co_desig',
        'wep_iss_co_dept',
        'wep_iss_co_sec',
        'wep_iss_co_ptcl',
        'wep_iss_co_cell',
        'wep_iss_co_email',
        'wep_iss_co_web',
        'wep_iss_co_front',
        'wep_iss_co_back',
        'wep_iss_co_notes',
        'wep_iss_co_attach',
        'wep_p_co_name',
        'wep_co_p_desig',
        'wep_co_p_dept',
        'wep_co_p_sec',
        'wep_co_p_ptcl',
        'wep_co_p_cell',
        'wep_co_p_email',
        'wep_co_p_web',
        'wep_co_p_front',
        'wep_co_p_back',
        'wep_co_p_notes',
        'wep_co_p_attach',
    ];

    public function regulator()
    {
        return $this->belongsTo(Regulator::class, 'regulators_id');
    }
}
