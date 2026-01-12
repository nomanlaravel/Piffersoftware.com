<?php

namespace App\Models;

use App\Models\RegOtherConsultant;
use App\Models\RegOtherIssuing;
use App\Models\RegOtherRenewals;
use App\Models\RegOperatingConsultant;
use App\Models\RegOperatingIssuing;
use App\Models\RegOperatingRenewals;
use App\Models\RegWeaponConsultant;
use App\Models\RegWeaponIssuing;
use App\Models\RegWeaponLegal;
use App\Models\RegWeaponLicense;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regulator extends Model
{
    use HasFactory;

    protected $fillable = [
        'regulator_activation',
        'reg_id',
        'reg_type',
        'jurisdiction',
        'deptartment',
        'section',
        'license_no',
        'document_no',
        'license_attach',
        'validity_from',
        'expiry_date',
        'notes',
        'attachments',
        'oper_home_office',
        'oper_home_build',
        'oper_home_block',
        'oper_home_area',
        'oper_home_city',
        'oper_home_photo',
        'oper_home_email',
        'oper_home_web',
        'oper_home_pin',
        'oper_home_gps',
        'oper_home_notes',
        'oper_home_attach',
        'oper_ra_date',
        'oper_ra_letter',
        'oper_ra_doc',
        'oper_ra_notes',
        'oper_ra_attach',
        'oper_rc_date',
        'oper_rc_letter',
        'oper_rc_doc',
        'oper_rc_notes',
        'oper_rc_attach',
        'oper_rap_date',
        'oper_rap_letter',
        'oper_rap_doc',
        'oper_rap_notes',
        'oper_rap_attach',
        'oper_laws_notes',
        'oper_laws_attach',
        'wep_home_office',
        'wep_home_build',
        'wep_home_block',
        'wep_home_area',
        'wep_home_city',
        'wep_home_photo',
        'wep_home_email',
        'wep_home_web',
        'wep_home_pin',
        'wep_home_gps',
        'wep_home_notes',
        'wep_home_attach',
        'wep_ra_date',
        'wep_ra_letter',
        'wep_ra_doc',
        'wep_ra_notes',
        'wep_ra_attach',
        'wep_rc_date',
        'wep_rc_letter',
        'wep_rc_docs',
        'wep_rc_notes',
        'wep_rc_attach',
        'wep_rap_date',
        'wep_rap_letter',
        'wep_rap_docs',
        'wep_rap_notes',
        'wep_rap_attach',
        'wep_laws_notes',
        'wep_laws_attach',
        'any_a_office',
        'any_a_build',
        'any_a_block',
        'any_a_area',
        'any_a_city',
        'any_a_photo',
        'any_a_email',
        'any_a_web',
        'any_a_pin',
        'any_a_gps',
        'any_a_notes',
        'any_a_attach',
        'any_ra_date',
        'any_ra_letter',
        'any_ra_docs',
        'any_ra_notes',
        'any_ra_attach',
        'any_rc_date',
        'any_rc_letter',
        'any_rc_docs',
        'any_rc_notes',
        'any_rc_attach',
        'any_rap_date',
        'any_rap_letter',
        'any_rap_docs',
        'any_rap_notes',
        'any_rap_attach',
        'any_laws_notes',
        'any_laws_attach',
    ];

    public function operatingconsultants()
    {
        return $this->hasMany(RegOperatingConsultant::class, 'regulators_id');
    }

    public function operatingissuings()
    {
        return $this->hasMany(RegOperatingIssuing::class, 'regulators_id');
    }

    public function operatingrenewals()
    {
        return $this->hasMany(RegOperatingRenewals::class, 'regulators_id');
    }

    public function weaponconsultants()
    {
        return $this->hasMany(RegWeaponConsultant::class, 'regulators_id');
    }

    public function weaponissuings()
    {
        return $this->hasMany(RegWeaponIssuing::class, 'regulators_id');
    }

    public function weaponlegals()
    {
        return $this->hasMany(RegWeaponLegal::class, 'regulators_id');
    }

    public function weaponrenewals()
    {
        return $this->hasMany(RegWeaponRenewals::class, 'regulators_id');
    }

    public function weapondivisions()
    {
        return $this->hasMany(RegWeaponDivision::class, 'regulators_id');
    }

    public function weaponlicenses()
    {
        return $this->hasMany(RegWeaponLicense::class, 'regulators_id');
    }

    public function otherconsultants()
    {
        return $this->hasMany(RegOtherConsultant::class, 'regulators_id');
    }

    public function otherissuings()
    {
        return $this->hasMany(RegOtherIssuing::class, 'regulators_id');
    }

    public function otherrenewals()
    {
        return $this->hasMany(RegOtherRenewals::class, 'regulators_id');
    }

}
