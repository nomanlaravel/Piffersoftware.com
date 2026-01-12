<?php

namespace App\Models;

use App\Models\Regulator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegWeaponLicense extends Model
{
    use HasFactory;

    protected $fillable = [
        'wep_license',
        'wep_lic_no',
        'wep_lic_type',
        'wep_lic_caliber',
        'wep_lic_juris',
        'wep_lic_tenure',
        'wep_lic_cost',
        'wep_lic_expiry',
        'wep_lic_sancdate',
        'wep_lic_attach',
        'wep_lic_dealername',
        'wep_lic_vendorid',
        'wep_lic_scanned',
        'wep_lic_category',
        'wep_lic_endate',
        'wep_lic_encopy',
        'wep_lic_ex_notes',
        'wep_lic_ex_attach',
    ];

    public function regulator()
    {
        return $this->belongsTo(Regulator::class, 'regulators_id');
    }

}
