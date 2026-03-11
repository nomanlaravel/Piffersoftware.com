<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customers_activation_check',
        'date_of_entry',
        'payment',
        'qrcode_path',
        'customers_id',
        'customers_name',
        'customers_suffix',
        'city_of_deployment',
        'customers_region',
        'branch_name',
        'display_name_as',
        'nature_of_business',
        'website',
        'phone',
        'email',
        'sub_customer',
        'approved_com',
        'quick_box',
        'eobi',
        'social_security',
        'grp_life_ins',
        'approved_attach',
        'quickbooks_attach',
        'applicable_compliances',
        'sum_apr',
        'acm_status',
        'meal_detail',
        'apr_kpi',
        'approv_q_s',
        'approv_q_s_attach',
        'approv_q_c',
        'approv_q_c_attach',
        'approv_q_cfo',
        'approv_q_cfo_attach',
        'c_e_date',
        'c_end_date',
        'c_r_date',
        'c_r_rem',
        'sales_dept',
        'cmd',
        'ops_dept',
        'finance_dept',
        'directors',
        'signed_ser',
        'signed_ser_attach',
        'com_ins',
        'com_ins_attach',
        'testimonials',
        'testimonials_attach',
        'sales_inc',
        'sales_inc_attach',
        'insc_name',
        'insc_date',
        'per_guan',
        'perfom_attach',
        'perform_note',
        'pay_terms',
        'ntn_fbr',
        'poc_name',
        'poc_desig',
        'poc_cell',
        'poc_email',
        'poc_bill_c',
        'poc_bill_d',
        'poc_bill_l',
        'poc_office',
        'poc_floor',
        'poc_building',
        'poc_block',
        'poc_area',
        'poc_city',
        'poc_photo',
        'poc_pin',
        'longitude',
        'latitude',
        'poc_note',
        'poc_attach',
        'cf_name',
        'cf_desig',
        'cf_no',
        'cf_email',
        'cf_office',
        'cf_floor',
        'cf_building',
        'cf_block',
        'cf_area',
        'cf_city',
        'cf_photo',
        'cf_pin',
        'longitude1',
        'latitude1',
        'cf_note',
        'cf_attach',
        'list_curr',
        'fbr',
        'pra',
        'kpra',
        'srb',
        'bra',
        'ajk',
        'gb',
        'list_prov',
        'currency_attach',
        'currency_note',

        'pat_name',
        'pat_model',
        'pat_make',
        'pat_reg',
        'pat_quan',
        'pat_price',
        'pat_val',
        'meeting_date',
        'meeting_chaired',
        'meeting_minutes',
        'meeting_attach',
        'meeting_comment',
        'meeting_main_point',
        'meeting_ex_attach',
        'meeting_freq',
        'meeting_freq_attach',
        'meeting_freq_note',
        'meeting_freq_alert',
        'meeting_alert_attach',
        'meeting_alert_notes',
        'scr_cus_name',
        'scr_cus_region',
        'scr_cus_id',
        'scr_cus_site_id',
        'scr_cus_report',
        'scr_cus_date',
        'cus_poc_name',
        'cus_poc_signature',
        'cus_poc_cell',
        'cro_name',
        'cro_signature',
        'cro_cell',
        'gm_name',
        'gm_signature',
        'gm_cell',
        'marks1_schf',
        'marks1_rsv',
        'marks1_rsgc',
        'marks1_cd',
        'marks1_tm1',
        'marks2_us',
        'marks2_tm2',
        'marks3_wfds',
        'marks3_av',
        'marks3_tm3',
        'marks4_elfat',
        'marks4_athb',
        'marks4_tm4',
        'marks5_apapc',
        'marks5_gs',
        'marks5_finance',
        'marks5_tm5',
        'marks6_sff',
        'marks6_tm6',
        'marks7_mvtm',
        'marks7_mprs',
        'marks7_srlms',
        'marks7_risite',
        'marks7_risurr',
        'marks7_sdnl',
        'marks7_tm7',
        'marks_grand_total',
        'visit_perf_by',
        'pat_super_loc',
        'pat_super_date',
        'pat_super_day',
        'pat_super_times',
        'pat_super_photo',
        'pat_super_video',
        'pat_super_inform_email',
        'notification_status'
    ];


  public function hrms()
    {
        return $this->hasMany(Hrm::class, 'client_id', 'id');
    }
    public function customersignatories()
    {
        return $this->hasMany(CustomerSignatory::class, 'customers_id');
    }
    public function customersalary()
    {
        return $this->hasMany(CustomerSalary::class, 'customers_id');
    }

    public function customermanpowers()
    {
        return $this->hasMany(CustomerManPower::class, 'customers_id');
    }

    public function customeremergencies()
    {
        return $this->hasMany(CustomerEmergency::class, 'customers_id');
    }

    public function customerdepartments()
    {
        return $this->hasMany(CustomerDepartment::class, 'customers_id');
    }

    public function customerinspections()
    {
        return $this->hasMany(CustomerInspection::class, 'customers_id');
    }

    public function customerarmourers()
    {
        return $this->hasMany(CustomerArmourer::class, 'customers_id');
    }

    public function customerincidents()
    {
        return $this->hasMany(CustomerIncident::class, 'customers_id');
    }

    public function customerassigments()
    {
        return $this->hasMany(CustomerAssigment::class, 'customers_id');
    }

    public function customeraudits()
    {
        return $this->hasMany(CustomerAudits::class, 'customers_id');
    }

    public function customerbussinesses()
    {
        return $this->hasMany(CustomerBussiness::class, 'customers_id');
    }

    public function customeractivities()
    {
        return $this->hasMany(CustomerActivities::class, 'customers_id');
    }

    public function customerfeedbacks()
    {
        return $this->hasMany(CustomerFeedback::class, 'customers_id');
    }

    public function customercomplaints()
    {
        return $this->hasMany(CustomerComplaint::class, 'customers_id');
    }

    public function customernotifications()
    {
        return $this->hasMany(CustomerNotification::class, 'customers_id');
    }

     public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function notifications()
    {
        return $this->hasMany(\App\Models\ReminderNotification::class, 'user_id');
    }

    /**
     * Get the inspection forms for the customer.
     */
    public function inspections()
    {
        return $this->hasMany(InspectionForm::class);
    }
}
