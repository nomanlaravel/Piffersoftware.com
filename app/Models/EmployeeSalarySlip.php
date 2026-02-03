<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeSalarySlip extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'payroll_month',
        'dated',
        'basic_salary',
        'per_day',
        'per_hour',
        'per_minute',
        'salaried_days',
        'leaves',
        'absents',
        'half_days',
        'days_deduction',
        'absent_deduction',
        'half_day_deduction',
        'sandwich_rule_deduction',
        'late_minutes',
        'late_minutes_deduction',
        'over_time_hours',
        'over_time_pay',
        'over_time_pay_status',
        'advance',
        'loan',
        'electricity',
        'income_tax',
        'tax_deduction',
        'other_deduction',
        'deduction_before_compensation',
        'compensation',
        'deduction_after_compensation',
        'total_deduction',
        'bouns',
        'totalIncrement',
        'total_salary',
        'net_salary',
        'approved_salary',
        'employee_id',
        'user_id'
    ];

    public function employee()
    {
        return $this->belongsTo(Hrm::class, 'employee_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
