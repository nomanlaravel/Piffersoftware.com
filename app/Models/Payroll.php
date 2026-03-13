<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hrm;
class Payroll extends Model
{
    use HasFactory;
protected $fillable = [
    'employee_id', 'p_name', 'p_designation', 'p_department', 'p_salary_details',
     'p_attendance_records', 'p_leave_records', 'unpaid_leave_record', 'unpaid_leave_deduction', 'p_total_overtime_hours', 'p_overtime_rate',
     'p_tax_deductions', 'p_insurance_deductions', 'p_performance_bonus', 'p_year_end_bonus',
     'p_other_allowances', 'p_gross_salary', 'p_total_deductions', 'p_net_salary',
     'p_other_deductions','p_employee_pay_slips', 'p_payroll_reports',
     'peobi', 'lunch_allowlance', 'p_others', 'p_misc',
     'income_tax','p_advance', 'total_earning',
];



  public function hrm()
    {
        return $this->belongsTo(Hrm::class, 'employee_id');
    }
    public function items()
{
    return $this->hasMany(Item::class, 'payroll_id'); // Ensure foreign key matches
}


}
