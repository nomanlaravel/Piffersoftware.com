<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class DialyBranchReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_date',
        'site_id',
        'branch',
        'location',
        'auth_guards',
        'army',
        'ssg',
        'civil',
        'absente',
        'leave',
        'reason',
        'r_provided',
        'last_comp_date',
        'any_inc',
        'any_fire',
        'no_of_new_gaurds',
        'pending_nadra',
        'unsent_dpo_rep',
        'no_of_resigns',
        'guards_wout_bank',
        'any_new_site',
        'no_of_guards',
        'any_site_closed',
        'no_of_guards_of_closed_site',
        'escort_duties',
        'pending_recoveries',
        'sign_manager',
        'staff_on_leav',
        'short_leav',
        'utility_bills',
        'bio_matric',
        'bio_register',
        'office_rent',
        'ups',
        'guard_file',
        'guard_accomodation',
        'any_maintainence',
        'weapon_register',
        'cctv',
        'attendance_register',
        'kote_register',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admins_id');
    }
}
