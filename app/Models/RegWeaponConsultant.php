<?php

namespace App\Models;

use App\Models\Regulator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegWeaponConsultant extends Model
{
    use HasFactory;

    protected $fillable = [
        'wep_name',
        'wep_desig',
        'wep_org',
        'wep_cell',
        'wep_email',
        'wep_fee',
        'wep_front',
        'wep_back',
        'wep_bank',
        'wep_acc',
        'wep_acc_no',
        'wep_fin',
        'wep_notes',
        'wep_attach',
        'wep_office',
        'wep_build',
        'wep_block',
        'wep_area',
        'wep_city',
        'wep_photo',
        'wep_a_email',
        'wep_web',
        'wep_pin',
        'wep_gps',
        'wep_ex_notes',
        'wep_ex_attach',
    ];

    public function regulator()
    {
        return $this->belongsTo(Regulator::class, 'regulators_id');
    }
}
