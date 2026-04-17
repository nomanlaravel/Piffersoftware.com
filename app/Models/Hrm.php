<?php

namespace App\Models;

use App\Models\Education;
use App\Models\Guarantor;
use App\Models\Work;
use App\Models\Training;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hrm extends Model
{
    use HasFactory;
    protected $table = 'hrms';
    protected $fillable = [
        'activation',
        'name',
        'fname',
        'cnic',
        'employee_no',
        'bank',
        'account_title',
        'bank_account',
        'branch',
        'cell',
        'photo',
        'category',
        'rank',
        'designation',
        'unit',
        'hired_at',
        'hrm_region',
        'hrm_location',
        'client_id',
        'client_name',
        'dob',
        'religion',
        'caste',
        'gender',
        'p_cell',
        'e_cell',
        'blood',
        'email',
        'cnic_front',
        'cnic_back',
        'f_attach',
        'm_status',
        'no_of_kids',
        'm_kids',
        'f_kids',
        'cnic_issue',
        'cnic_expire',
        'notes',
        't_address',
        't_area',
        't_city',
        't_police',
        't_district',
        't_post',
        't_tehsil',
        't_province',
        't_postal',
        't_residing',
        't_gps',
        't_attach',
        't_note',
        'p_address',
        'p_area',
        'p_city',
        'p_police',
        'p_district',
        'p_post',
        'p_tehsil',
        'p_province',
        'p_postal',
        'p_residing',
        'p_gps',
        'p_attach',
        'p_note',
        'nok_name',
        'nok_cnic',
        'nok_fname',
        'nok_relation',
        'nok_death',
        'nok_frc',
        'h_verify',
        'b_verify',
        'p_verify',
        'd_book',
        'v_verify',
        'copy_bill',
        'n_verify',
        'insurrance',
        'guard_bank',
        'bio_verify',
        'c_verify',
        'dpo_verify',
        'form_send',
        'sent_on',
        'form_attach',
        'form_rec',
        'rec_on',
        'rec_attach',
        'eight_verify',
        'sahulat_v',
        'look_back1',
        'frequency1',
        'notes1',
        'look_back2',
        'frequency2',
        'notes2',
        'look_back3',
        'frequency3',
        'notes3',
        'look_back4',
        'frequency4',
        'notes4',
        'look_back5',
        'frequency5',
        'notes5',
        'look_back6',
        'frequency6',
        'notes6',
        'look_back7',
        'frequency7',
        'notes7',
        'look_back8',
        'frequency8',
        'notes8',
        'look_back9',
        'frequency9',
        'notes9',
        'look_back10',
        'frequency10',
        'notes10',
        'look_back11',
        'frequency11',
        'notes11',
        'look_back12',
        'frequency12',
        'notes12',
        'look_back13',
        'frequency13',
        'notes13',
        'look_back14',
        'frequency14',
        'notes14',
        'l_finger',
        'f_finger',
        'm_finger',
        'i_finger',
        't_finger',
        'additionals',
        'f_attachment',
        'finger_note',
        'h_age',
        'weight',
        'height',
        'complection',
        'ay_other_d',
        'medical_category',
        'vaccine_card',
        'medical_fit_card',
        'medical_fit_attach',
        'medical_fit_note',
        'phy_name',
        'phy_cell',
        'phy_office',
        'phy_building',
        'phy_block',
        'phy_area',
        'phy_city',
        'phy_loc',
        'phy_note',
        'phy_attach',
        'vac_type',
        'vac_pr',
        'c_eobi',
        'f_eobi',
        'sub_eobi',
        'front_eobi',
        'back_eobi',
        'ss_staff',
        'fall_ss',
        'sub_ss',
        'front_ss',
        'back_ss',
        'gli_ins',
        'gli_name',
        'gli_policy',
        'type_ins',
        'sum_gli',
        'date_ins',
        'snc_pol',
        'next_name',
        'next_cnic',
        'next_fname',
        'next_relation',
        'next_death',
        'next_frc',
        'next_legal',
        'next_photo',
        'next_claim',
        'next_amount',
        'next_check',
        'next_date',
        'next_copy',
        'next_bank',
        'next_ins',
        'next_attach',
        'ex_next_attach',
        'ex_next_note',
        's_license',
        's_issuing',
        's_v_date',
        's_date',
        's_fee',
        's_front',
        's_back',
        's_notes',
        's_attach',
        'insp_no',
        'insp_name',
        'insp_cell',
        'insp_date',
        'insp_pic',
        'rem_petr',
        'insp_attach',
        'insp_notes',
        'observ_mon',
        'observ_type',
        'hr_remark',
        'ex_observ_attach',
        'appraisal',
        'appraisal_attach',
        'appraisal_notes',
        'sub_guard_id',
        'last_whatsapp_interaction_at'
    ];
    
    protected $casts = [
        'last_whatsapp_interaction_at' => 'datetime',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'client_id', 'customers_id');
    }

    public function guarantors()
    {
        return $this->hasMany(Guarantor::class, 'hrms_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'hrm_id');
    }

    public function employeeLeaves()
    {
        return $this->hasMany(EmployeeLeave::class, 'hrm_id');
    }


    public function trainingssecontion()
    {
        return $this->hasMany(Training::class, 'hrms_id');
    }

    public function payrolls()
    {
        return $this->hasMany(Payroll::class, 'hrms_id');
    }

    public function workExperiences()
    {
        return $this->hasMany(Work::class, 'hrms_id');
    }

    public function education()
    {
        return $this->hasMany(Education::class, 'hrms_id');
    }

    public function trainings()
    {
        return $this->belongsToMany(Training::class, 'training_guard', 'guard_id', 'training_id');
    }

    public function dispatchsss()
    {
        return $this->hasMany(InternalDispatch::class, 'issued_to');
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function trainingAssignment()
    {
        return $this->hasMany(TrainingGuard::class, 'guard_id');
    }

    public function salaryStatus()
    {
        return $this->hasOne(EmployeeSalaryStatus::class, 'employee_id');
    }


    public function salarySlips()
    {
        return $this->hasMany(EmployeeSalarySlip::class, 'employee_id');
    }
}
