<?php

/**
 * Sample Salary Slip Generator
 * 
 * This script demonstrates how to create salary slips for employees.
 * You can run this in tinker or create a seeder/command from it.
 * 
 * Usage in Tinker:
 * php artisan tinker
 * include('generate_sample_salary_slips.php');
 */

use App\Models\EmployeeSalarySlip;
use App\Models\Hrm;
use Carbon\Carbon;

// Get all active employees
$employees = Hrm::where('activation', 1)->get();

// Set the month you want to generate slips for
$month = Carbon::now()->format('Y-m'); // Current month, e.g., "2026-02"
$daysInMonth = Carbon::parse($month . '-01')->daysInMonth;

echo "Generating salary slips for {$employees->count()} employees for month: $month\n";
echo "Days in month: $daysInMonth\n\n";

foreach ($employees as $employee) {
    // Get employee's salary status
    $salaryStatus = $employee->salaryStatus;

    if (!$salaryStatus) {
        echo "⚠️  Skipping {$employee->name} - No salary status set\n";
        continue;
    }

    $basicSalary = $salaryStatus->before_increment;
    $dailySalary = $basicSalary / $daysInMonth;
    $perHour = $dailySalary / 8;
    $perMinute = $perHour / 60;

    // Get attendance data for this month
    $attendances = $employee->attendances()
        ->whereYear('date', Carbon::parse($month)->year)
        ->whereMonth('date', Carbon::parse($month)->month)
        ->get();

    // Calculate attendance metrics
    $absents = $attendances->where('status', 'absent')->count();
    $halfDays = $attendances->where('status', 'half_day')->count();
    $leaves = $attendances->where('status', 'leave')->count();
    $lateMinutes = $attendances->sum('late_minutes') ?? 0;
    $salariedDays = $daysInMonth - $absents - ($halfDays * 0.5);

    // Calculate deductions
    $absentDeduction = $dailySalary * $absents;
    $halfDayDeduction = ($dailySalary / 2) * $halfDays;
    $lateMinutesDeduction = $perMinute * $lateMinutes;

    // Sandwich rule deduction (simplified - you can enhance this)
    $sandwichRuleDeduction = 0;

    // Other deductions (example values - customize as needed)
    $otherDeduction = 0; // e.g., uniform, damages, etc.
    $taxDeduction = $basicSalary * 0.02; // 2% tax
    $loan = 0; // Fetch from loan records if you have them
    $advance = 0;
    $electricity = 0;

    // Increments and bonuses (example values)
    $totalIncrement = $salaryStatus->last_increment_amount ?? 0;
    $bonus = 0; // Add bonus logic here

    // Overtime (example)
    $overtimeHours = 0;
    $overtimePay = 0;

    // Compensation (allowances, etc.)
    $compensation = 0; // e.g., transport, food allowance

    // Calculate totals
    $totalSalary = $basicSalary + $totalIncrement;

    $deductionBeforeCompensation =
        $absentDeduction +
        $halfDayDeduction +
        $lateMinutesDeduction +
        $sandwichRuleDeduction +
        $otherDeduction +
        $taxDeduction +
        $loan +
        $advance +
        $electricity;

    $deductionAfterCompensation = max(0, $deductionBeforeCompensation - $compensation);

    $totalDeduction = $deductionAfterCompensation;

    $approvedSalary = $totalSalary + $bonus + $compensation + $overtimePay - $deductionBeforeCompensation;

    $netSalary = $approvedSalary;

    // Create or update salary slip
    try {
        $salarySlip = EmployeeSalarySlip::updateOrCreate(
            [
                'employee_id' => $employee->id,
                'payroll_month' => $month
            ],
            [
                'dated' => Carbon::now(),
                'basic_salary' => $basicSalary,
                'per_day' => $dailySalary,
                'per_hour' => $perHour,
                'per_minute' => $perMinute,
                'salaried_days' => $salariedDays,
                'leaves' => $leaves,
                'absents' => $absents,
                'half_days' => $halfDays,
                'days_deduction' => 0,
                'absent_deduction' => $absentDeduction,
                'half_day_deduction' => $halfDayDeduction,
                'sandwich_rule_deduction' => $sandwichRuleDeduction,
                'late_minutes' => $lateMinutes,
                'late_minutes_deduction' => $lateMinutesDeduction,
                'over_time_hours' => $overtimeHours,
                'over_time_pay' => $overtimePay,
                'over_time_pay_status' => null,
                'advance' => $advance,
                'loan' => $loan,
                'electricity' => $electricity,
                'income_tax' => $taxDeduction,
                'tax_deduction' => $taxDeduction,
                'other_deduction' => $otherDeduction,
                'deduction_before_compensation' => $deductionBeforeCompensation,
                'compensation' => $compensation,
                'deduction_after_compensation' => $deductionAfterCompensation,
                'total_deduction' => $totalDeduction,
                'bouns' => $bonus,
                'totalIncrement' => $totalIncrement,
                'total_salary' => $totalSalary,
                'net_salary' => $netSalary,
                'approved_salary' => $approvedSalary,
                'user_id' => 1 // Set to admin user ID
            ]
        );

        echo "✅ Generated salary slip for: {$employee->name}\n";
        echo "   Basic: " . number_format($basicSalary, 2) . " | ";
        echo "Absents: {$absents} | ";
        echo "Half Days: {$halfDays} | ";
        echo "Late: {$lateMinutes}min | ";
        echo "Final: " . number_format($approvedSalary, 2) . "\n";

    } catch (\Exception $e) {
        echo "❌ Error for {$employee->name}: " . $e->getMessage() . "\n";
    }
}

echo "\n✅ Salary slip generation complete!\n";
echo "You can now view the report at: /employee-payroll/salary-report\n";
