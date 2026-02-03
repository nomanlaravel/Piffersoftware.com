<?php

namespace App\Http\Controllers;

use App\Models\EmployeeBankDetail;
use Illuminate\Http\Request;
use App\Models\EmployeeSalaryStatus;
use App\Models\EmployeeSalarySlip;
use App\Models\Hrm;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PayRollEmployeeController extends Controller
{
    public function salaryReport()
    {
        $years = range(Carbon::now()->year, Carbon::now()->year - 5);
        $months = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December'
        ];
        return view('a_payroll.salary_report', compact('years', 'months'));
    }

    public function getSalaryReportData(Request $request)
    {
        $month = $request->month ?? Carbon::now()->month;
        $year = $request->year ?? Carbon::now()->year;

        // Format as YYYY-MM for matching payroll_month
        $payrollMonth = sprintf('%04d-%02d', $year, $month);
        $dateStr = "$year-$month-01";
        $daysInMonth = Carbon::parse($dateStr)->daysInMonth;

        // Query employees with their salary slips for the selected month
        $query = Hrm::with([
            'salaryStatus.bankDetail',
            'salarySlips' => function ($q) use ($payrollMonth) {
                $q->where('payroll_month', $payrollMonth);
            }
        ]);

        if ($request->has('search') && isset($request->search['value'])) {
            $searchValue = $request->search['value'];
            $query->where(function ($q) use ($searchValue) {
                $q->where('name', 'like', "%$searchValue%")
                    ->orWhere('employee_no', 'like', "%$searchValue%");
            });
        }

        $totalData = Hrm::count();
        $totalFiltered = $query->count();

        $limit = $request->input('length', 10);
        $start = $request->input('start', 0);

        $employees = $query->offset($start)
            ->limit($limit)
            ->get();

        $data = [];
        $rowNum = $start + 1;


        foreach ($employees as $employee) {
            $status = $employee->salaryStatus;

            // Skip if no salary status
            if (!$status) {
                continue;
            }

            $basicSalary = $status->before_increment;

            // Get bank account details
            $bankAccount = 'N/A';
            if ($status && $status->bankDetail) {
                $bankAccount = $status->bankDetail->account_number ?? 'N/A';
            }

            // Get designation
            $designation = $employee->designation ?? 'N/A';

            // Check if salary slip exists for this month
            $salarySlip = $employee->salarySlips->first();

            if ($salarySlip) {
                // Use data from existing salary slip
                $data[] = [
                    'DT_RowIndex' => $rowNum++,
                    'name' => $employee->name,
                    'bank_account' => $bankAccount,
                    'designation' => $designation,
                    'basic_salary' => number_format($salarySlip->basic_salary, 2),
                    'absents' => $salarySlip->absents,
                    'absent_deduction' => number_format($salarySlip->absent_deduction, 2),
                    'half_days' => $salarySlip->half_days,
                    'half_day_deduction' => number_format($salarySlip->half_day_deduction, 2),
                    'late_minutes' => $salarySlip->late_minutes,
                    'late_minutes_deduction' => number_format($salarySlip->late_minutes_deduction, 2),
                    'sandwich_rule_deduction' => number_format($salarySlip->sandwich_rule_deduction, 2),
                    'other_deduction' => number_format($salarySlip->other_deduction, 2),
                    'tax_deduction' => number_format($salarySlip->tax_deduction, 2),
                    'loan' => number_format($salarySlip->loan, 2),
                    'total_increment' => number_format($salarySlip->totalIncrement, 2),
                    'total_salary' => number_format($salarySlip->total_salary, 2),
                    'deduction_before_compensation' => number_format($salarySlip->deduction_before_compensation, 2),
                    'bonus' => number_format($salarySlip->bouns, 2),
                    'compensation' => number_format($salarySlip->compensation, 2),
                    'deduction_after_compensation' => number_format($salarySlip->deduction_after_compensation, 2),
                    'total_salary_approved' => number_format($salarySlip->approved_salary, 2)
                ];
            } else {
                // Check if employee's salary started on or before the selected month
                if (!$status->salary_start) {
                    // Skip if no salary start date
                    continue;
                }

                $salaryStartDate = Carbon::parse($status->salary_start);
                $reportDate = Carbon::parse($dateStr);

                // Only show employee if their salary started on or before the report month
                if ($salaryStartDate->greaterThan($reportDate)) {
                    // Employee wasn't employed in this month, skip
                    continue;
                }

                // Calculate on-the-fly if no salary slip exists
                // Get attendance data
                $attendances = $employee->attendances()
                    ->whereMonth('date', $month)
                    ->whereYear('date', $year)
                    ->get();

                // Count Absents
                $absents = $attendances->where('status', 'absent')->count();

                // Count Half Days
                $halfDays = $attendances->where('status', 'half_day')->count();

                // Calculate Late Minutes
                $lateMinutes = $attendances->sum('late_minutes') ?? 0;

                // Deduction Calculations
                $absentDeduction = $daysInMonth > 0 ? ($basicSalary / $daysInMonth) * $absents : 0;
                $halfDayDeduction = $daysInMonth > 0 ? ($basicSalary / $daysInMonth / 2) * $halfDays : 0;

                // Late minutes deduction (1/480 of daily salary per late minute)
                $dailySalary = $daysInMonth > 0 ? $basicSalary / $daysInMonth : 0;
                $lateMinutesDeduction = $dailySalary > 0 ? ($dailySalary / 480) * $lateMinutes : 0;

                // Sandwich Rule Deduction
                $sandwichRuleDeduction = $this->calculateSandwichRuleDeduction($attendances, $dailySalary);

                // Other Deductions
                $otherDeduction = 0;

                // Tax Deduction (2% of basic salary)
                $taxDeduction = $basicSalary * 0.02;

                // Loan Deduction
                $loan = 0;

                // Total Increment
                $totalIncrement = $status ? ($status->last_increment_amount ?? 0) : 0;

                // Total Salary (Basic + Increment)
                $totalSalary = $basicSalary + $totalIncrement;

                // Deduction Before Compensation
                $deductionBeforeCompensation = $absentDeduction + $halfDayDeduction + $lateMinutesDeduction +
                    $sandwichRuleDeduction + $otherDeduction + $taxDeduction + $loan;

                // Bonus
                $bonus = 0;

                // Compensation
                $compensation = 0;

                // Deduction After Compensation
                $deductionAfterCompensation = max(0, $deductionBeforeCompensation - $compensation);

                // Total Salary Approved (Final)
                $totalSalaryApproved = $totalSalary + $bonus + $compensation - $deductionBeforeCompensation;

                $data[] = [
                    'DT_RowIndex' => $rowNum++,
                    'name' => $employee->name,
                    'bank_account' => $bankAccount,
                    'designation' => $designation,
                    'basic_salary' => number_format($basicSalary, 2),
                    'absents' => $absents,
                    'absent_deduction' => number_format($absentDeduction, 2),
                    'half_days' => $halfDays,
                    'half_day_deduction' => number_format($halfDayDeduction, 2),
                    'late_minutes' => $lateMinutes,
                    'late_minutes_deduction' => number_format($lateMinutesDeduction, 2),
                    'sandwich_rule_deduction' => number_format($sandwichRuleDeduction, 2),
                    'other_deduction' => number_format($otherDeduction, 2),
                    'tax_deduction' => number_format($taxDeduction, 2),
                    'loan' => number_format($loan, 2),
                    'total_increment' => number_format($totalIncrement, 2),
                    'total_salary' => number_format($totalSalary, 2),
                    'deduction_before_compensation' => number_format($deductionBeforeCompensation, 2),
                    'bonus' => number_format($bonus, 2),
                    'compensation' => number_format($compensation, 2),
                    'deduction_after_compensation' => number_format($deductionAfterCompensation, 2),
                    'total_salary_approved' => number_format($totalSalaryApproved, 2)
                ];
            }
        }

        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        ]);
    }

    /**
     * Calculate sandwich rule deduction
     * Deducts salary for leaves taken between holidays/weekends
     */
    private function calculateSandwichRuleDeduction($attendances, $dailySalary)
    {
        $deduction = 0;
        $dates = $attendances->pluck('date')->sort()->values();

        foreach ($dates as $index => $date) {
            $currentDate = Carbon::parse($date);

            // Check if this is a leave day
            $attendance = $attendances->firstWhere('date', $date);
            if ($attendance && in_array($attendance->status, ['leave', 'absent'])) {
                // Check if previous day was weekend or holiday
                $prevDay = $currentDate->copy()->subDay();
                $nextDay = $currentDate->copy()->addDay();

                // If sandwiched between weekend/holiday, apply deduction
                if (
                    ($prevDay->isWeekend() || $this->isHoliday($prevDay)) &&
                    ($nextDay->isWeekend() || $this->isHoliday($nextDay))
                ) {
                    $deduction += $dailySalary;
                }
            }
        }

        return $deduction;
    }

    /**
     * Check if a date is a holiday
     */
    private function isHoliday($date)
    {
        // TODO: Implement holiday checking logic
        // You can create a holidays table and check against it
        return false;
    }
    public function index()
    {
        return view('a_payroll.set_salary');
    }

    public function getSalaries(Request $request)
    {
        $employeeSalaries = EmployeeSalaryStatus::with('bankDetail')->get();

        // Simple manual implementation for DataTables
        $query = Hrm::with('salaryStatus');

        if ($request->has('search') && isset($request->search['value'])) {
            $searchValue = $request->search['value'];
            $query->where(function ($q) use ($searchValue) {
                $q->where('name', 'like', "%$searchValue%")
                    ->orWhere('employee_no', 'like', "%$searchValue%");
            });
        }

        $totalData = Hrm::count();
        $totalFiltered = $query->count();

        $limit = $request->input('length', 10);
        $start = $request->input('start', 0);

        $employees = $query->offset($start)
            ->limit($limit)
            ->get();

        $data = [];
        foreach ($employees as $employee) {
            $status = $employee->salaryStatus;

            $statusHtml = '<span class="badge badge-danger">NOT SET</span>';
            if ($status) {
                $statusHtml = '<span class="badge badge-success">' . strtoupper($status->status) . '</span>';
            }

            $action = '<div class="btn-group shadow-sm" style="border-radius: 12px; overflow: hidden;">';
            $action .= '<button class="btn btn-sm btn-success set-salary-btn px-3" data-id="' . $employee->id . '" data-name="' . $employee->name . '"><i class="fas fa-plus mr-1"></i>Set</button>';
            if ($status) {
                $action .= '<button class="btn btn-sm btn-primary view-increment-btn px-3" data-id="' . $employee->id . '"><i class="fas fa-chart-line mr-1"></i>Increments</button>';
                $action .= '<button class="btn btn-sm btn-danger delete-salary-btn px-3" data-id="' . $status->id . '"><i class="fas fa-trash"></i></button>';
            }
            $action .= '</div>';

            $data[] = [
                'id' => $employee->id,
                'name' => $employee->name,
                'employee_no' => $employee->employee_no ?? 'N/A',
                'basic_salary' => $status ? number_format($status->before_increment, 2) : '0.00',
                'next_increment' => $status && $status->next_increment ? $status->next_increment : 'N/A',
                'status' => $statusHtml,
                'action' => $action
            ];
        }

        $employee_salaries = EmployeeSalaryStatus::with('bankDetail')->get();

        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:hrms,id',
            'basic_salary' => 'required|numeric',
            'salary_start' => 'required|date',
            'increment_time' => 'required|integer',
            'account_title' => 'required|string',
            'bank_name' => 'required|string',
            'account_number' => 'required',
            'branch_name' => 'required',
        ]);

        $nextIncrement = Carbon::parse($request->salary_start)->addMonths($request->increment_time)->toDateString();

        try {
            DB::beginTransaction();

            EmployeeSalaryStatus::updateOrCreate(
                ['employee_id' => $request->employee_id],
                [
                    'time_period' => $request->increment_time . ' months',
                    'before_increment' => $request->basic_salary,
                    'salary_start' => $request->salary_start,
                    'next_increment' => $nextIncrement,
                    'increment_amount' => 0,
                    'status' => 'active',
                    'user_id' => Auth::id(),
                ]
            );

            EmployeeBankDetail::updateOrCreate(
                [
                    'hrm_id' => $request->employee_id
                ],
                [
                    'account_title' => $request->account_title,
                    'bank_name' => $request->bank_name,
                    'account_number' => $request->account_number,
                    'branch_name' => $request->branch_name
                ]
            );
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Salary formula set successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $status = EmployeeSalaryStatus::findOrFail($id);
            $status->delete();
            return response()->json(['success' => true, 'message' => 'Salary formula deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function getSalaryDetail($id)
    {
        try {
            $employee = Hrm::with(['salaryStatus', 'bankDetail'])->findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => [
                    'salary' => $employee->salaryStatus,
                    'bank' => $employee->bankDetail,
                    'employee' => [
                        'id' => $employee->id,
                        'name' => $employee->name
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function getIncrementSheet($id)
    {
        try {
            $employee = Hrm::with('salaryStatus')->findOrFail($id);
            // Placeholder increments - in future, link to an increments history table.
            return response()->json([
                'success' => true,
                'employee' => $employee,
                'increments' => []
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function salary_report()
    {
        return view('a_payroll.salary_report');
    }
}
