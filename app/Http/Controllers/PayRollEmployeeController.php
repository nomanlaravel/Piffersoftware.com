<?php

namespace App\Http\Controllers;

use App\Models\MonthlyHolidays;
use Illuminate\Http\Request;
use App\Models\EmployeeSalaryStatus;
use App\Models\EmployeeSalarySlip;
use App\Models\Hrm;
use Carbon\Carbon;
use App\Models\EmployeeLeave;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Log;
use Validator;

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

        // Fetch holidays for this month
        $holidays = MonthlyHolidays::where('month', (int) $month)
            ->where('year', (int) $year)
            ->pluck('date')
            ->toArray();

        // Query employees with their salary slips for the selected month
        $query = Hrm::with([
            'salaryStatus',
            'employeeLeaves.leaveType',
            'salarySlips' => function ($q) use ($payrollMonth) {
                $q->where('payroll_month', $payrollMonth);
            },
            'payrolls' => function ($q) use ($month, $year) {
                $q->where(function ($q2) use ($month, $year) {
                    $q2->whereMonth('created_at', $month)
                        ->whereYear('created_at', $year)
                        ->orWhereMonth('updated_at', $month)
                        ->whereYear('updated_at', $year);
                });
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

            // Get bank account details from HRM model
            $bankAccount = $employee->bank_account ?? 'N/A';
            if ($employee->bank) {
                $bankAccount = $employee->bank . ' (' . $bankAccount . ')';
            }
            $unpaidLeaves = EmployeeLeave::where('hrm_id', $employee->id)
                ->where('status', 'approved')
                ->whereHas('leaveType', function ($q) {
                    $q->where('paid', 0);
                })
                ->sum('number_of_leaves');

            $paidLeaves = EmployeeLeave::where('hrm_id', $employee->id)
                ->where('status', 'approved')
                ->whereHas('leaveType', function ($q) {
                    $q->where('paid', 1);
                })
                ->sum('number_of_leaves');


            $designation = $employee->designation ?? 'N/A';

            $payroll = $employee->payrolls->first();
            $salarySlip = $employee->salarySlips->first();
            if ($salarySlip) {
                // Use data from existing salary slip
                $data[] = [
                    'DT_RowIndex' => $rowNum++,
                    'name' => $employee->name,
                    'bank_account' => $bankAccount,
                    'designation' => $designation,
                    'department' => $payroll->p_department ?? ($employee->unit ?? 'N/A'),
                    'salary_details' => $payroll->p_salary_details ?? 'N/A',
                    'attendance_records' => $payroll->p_attendance_records ?? 'N/A',
                    'leave_records' => $paidLeaves,
                    'unpaid_leave_record' => $unpaidLeaves,
                    'unpaid_leave_deduction' => number_format($unpaidLeaveDeduction, 2),
                    'basic_salary' => number_format($salarySlip->basic_salary, 2),
                    'absents' => $salarySlip->absents,
                    'absent_deduction' => number_format($salarySlip->absent_deduction, 2),
                    'half_days' => $salarySlip->half_days,
                    'half_day_deduction' => number_format($salarySlip->half_day_deduction, 2),
                    'late_minutes' => $salarySlip->late_minutes,
                    'late_minutes_deduction' => number_format($salarySlip->late_minutes_deduction, 2),
                    'sandwich_rule_deduction' => number_format($salarySlip->sandwich_rule_deduction, 2),
                    'other_deduction' => number_format($salarySlip->other_deduction, 2),
                    'ot_hours' => $salarySlip->over_time_hours ?? ($payroll->p_total_overtime_hours ?? 0),
                    'ot_rate' => $payroll->p_overtime_rate ?? 0,
                    'tax_deduction' => number_format($salarySlip->tax_deduction, 2),
                    'income_tax' => number_format($salarySlip->income_tax, 2),
                    'insurance_deductions' => $payroll->p_insurance_deductions ?? 0,
                    'loan' => number_format($salarySlip->loan, 2),
                    'advance' => number_format($salarySlip->advance, 2),
                    'lunch_allowance' => $payroll->lunch_allowlance ?? '0.00',
                    'eobi' => $employee->c_eobi ?? ($payroll->peobi ?? 'N/A'),
                    'social_security' => $employee->ss_staff ?? 'N/A',
                    'performance_bonus' => $payroll->p_performance_bonus ?? 0,
                    'year_end_bonus' => $payroll->p_year_end_bonus ?? 0,
                    'other_allowances' => $payroll->p_other_allowances ?? 0,
                    'total_increment' => number_format($salarySlip->totalIncrement, 2),
                    'gross_salary' => $payroll->p_gross_salary ?? number_format($salarySlip->total_salary, 2),
                    'total_salary' => number_format($salarySlip->total_salary, 2),
                    'appraisal' => number_format($employee->appraisal, 2),
                    'others' => $payroll->p_others ?? 0,
                    'misc' => $payroll->p_misc ?? 0,
                    'total_earning' => $payroll->total_earning ?? 0,
                    'total_deductions' => number_format($salarySlip->total_deduction, 2),
                    'net_salary' => number_format($salarySlip->approved_salary, 2),
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

                $dailySalary = $daysInMonth > 0 ? $basicSalary / $daysInMonth : 0;
                
                // --- NEW LOGIC: Custom Daily Salary Integration ---
                // Calculate salary adjustment for days with manually set salaries
                $customSalaryAdjustments = 0;
                $customSalaryDayDates = [];
                
                foreach ($attendances as $att) {
                    if ($att->custom_daily_salary !== null) {
                        // User wants: (Fixed salary day NOT count) + (Given attendance salary count)
                        // This means we subtract the fixed daily rate and add the custom one.
                        $customSalaryAdjustments += ($att->custom_daily_salary - $dailySalary);
                        $customSalaryDayDates[] = $att->date;
                    }
                }

                // Filter out days that have custom salaries from standard deduction counts
                $absentOnly = $attendances->where('status', 'absent')
                    ->filter(fn($att) => !in_array($att->date, $holidays) && !in_array($att->date, $customSalaryDayDates))
                    ->count();

                $halfDays = $attendances->where('status', 'half_day')
                    ->filter(fn($att) => !in_array($att->date, $holidays) && !in_array($att->date, $customSalaryDayDates))
                    ->count();

                $unpaidLeaves = EmployeeLeave::where('hrm_id', $employee->id)
                    ->where('status', 'approved')
                    ->whereHas('leaveType', fn($q) => $q->where('paid', 0))
                    ->get()
                    ->filter(function($leave) use ($customSalaryDayDates) {
                        // Normally leaves are for specific dates. If a leave day has a custom salary,
                        // we prioritize the custom salary (as per user request "given attendance salary will be count").
                        // Note: This assumes leave dates are checked properly. 
                        // For now we use the sum provided by number_of_leaves but try to be safe.
                        return true; 
                    })
                    ->sum('number_of_leaves');

                // Calculate Late Minutes (Still applies to all attendances)
                $lateMinutes = $attendances->sum('late_minutes') ?? 0;

                // Deduction Calculations (Using fixed daily rate for non-custom days)
                $absentDeduction = $dailySalary * $absentOnly;
                $halfDayDeduction = ($dailySalary / 2) * $halfDays;
                $unpaidLeaveDeduction = $dailySalary * $unpaidLeaves;
                // --- END NEW LOGIC ---
                // Late minutes deduction (1/480 of daily salary per late minute)
                $dailySalary = $daysInMonth > 0 ? $basicSalary / $daysInMonth : 0;
                $lateMinutesDeduction = $dailySalary > 0 ? ($dailySalary / 480) * $lateMinutes : 0;

                // Sandwich Rule Deduction
                $sandwichRuleDeduction = $this->calculateSandwichRuleDeduction($attendances, $dailySalary, $holidays);

                // Other Deductions
                $otherDeduction = 0;

                // Tax Deduction (2% of basic salary)
                $taxDeduction = $basicSalary * 0.02;

                // Loan Deduction
                $loan = 0;

                // Total Increment
                $totalIncrement = $status ? ($status->last_increment_amount ?? 0) : 0;

                // Total Salary (Basic + Increment + Custom Salary Adjustments)
                $totalSalary = $basicSalary + $totalIncrement + $customSalaryAdjustments;

                // Deduction Before Compensation
                $deductionBeforeCompensation = $absentDeduction + $unpaidLeaveDeduction + $halfDayDeduction + $lateMinutesDeduction +
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
                    'department' => $payroll->p_department ?? ($employee->unit ?? 'N/A'),
                    'salary_details' => $payroll->p_salary_details ?? 'N/A',
                    'attendance_records' => $payroll->p_attendance_records ?? 'N/A',
                    'leave_records' => $paidLeaves,
                    'unpaid_leave_record' => $unpaidLeaves,
                    'unpaid_leave_deduction' => number_format($unpaidLeaveDeduction, 2),
                    'basic_salary' => number_format($basicSalary, 2),
                    'absents' => $absentOnly,
                    'absent_deduction' => number_format($absentDeduction, 2),
                    'half_days' => $halfDays,
                    'half_day_deduction' => number_format($halfDayDeduction, 2),
                    'late_minutes' => $lateMinutes,
                    'late_minutes_deduction' => number_format($lateMinutesDeduction, 2),
                    'sandwich_rule_deduction' => number_format($sandwichRuleDeduction, 2),
                    'other_deduction' => number_format($otherDeduction, 2),
                    'ot_hours' => $payroll->p_total_overtime_hours ?? 0,
                    'ot_rate' => $payroll->p_overtime_rate ?? 0,
                    'tax_deduction' => number_format($taxDeduction, 2),
                    'income_tax' => '0.00',
                    'insurance_deductions' => $payroll->p_insurance_deductions ?? 0,
                    'loan' => number_format($loan, 2),
                    'advance' => '0.00',
                    'lunch_allowance' => $payroll->lunch_allowlance ?? '0.00',
                    'eobi' => $employee->c_eobi ?? ($payroll->peobi ?? 'N/A'),
                    'social_security' => $employee->ss_staff ?? 'N/A',
                    'performance_bonus' => $payroll->p_performance_bonus ?? 0,
                    'year_end_bonus' => $payroll->p_year_end_bonus ?? 0,
                    'other_allowances' => $payroll->p_other_allowances ?? 0,
                    'total_increment' => number_format($totalIncrement, 2),
                    'gross_salary' => $payroll->p_gross_salary ?? number_format($totalSalary, 2),
                    'total_salary' => number_format($totalSalary, 2),
                    'appraisal' => number_format($employee->appraisal, 2),
                    'others' => $payroll->p_others ?? 0,
                    'misc' => $payroll->p_misc ?? 0,
                    'total_earning' => $payroll->total_earning ?? 0,
                    'total_deductions' => number_format($deductionAfterCompensation, 2),
                    'net_salary' => number_format($totalSalaryApproved, 2),
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
    private function calculateSandwichRuleDeduction($attendances, $dailySalary, $holidays = [])
    {
        $deduction = 0;
        $dates = $attendances->pluck('date')->sort()->values();

        foreach ($dates as $index => $date) {
            $currentDate = Carbon::parse($date);

            // Check if this is a leave day
            $attendance = $attendances->firstWhere('date', $date);
            if ($attendance && in_array($attendance->status, ['leave', 'absent'])) {
                // Check if previous day and next day were non-working
                $prevDay = $currentDate->copy()->subDay();
                $nextDay = $currentDate->copy()->addDay();

                // If holidays are set for the month, use them.
                // If NO holidays are set, everything is a working day (per user request)
                if (count($holidays) > 0) {
                    if (
                        $this->isHoliday($prevDay, $holidays) &&
                        $this->isHoliday($nextDay, $holidays)
                    ) {
                        $deduction += $dailySalary;
                    }
                }
            }
        }

        return $deduction;
    }

    /**
     * Check if a date is a holiday
     */
    private function isHoliday($date, $holidays = [])
    {
        return in_array($date->format('Y-m-d'), $holidays);
    }
    public function index()
    {
        return view('a_payroll.set_salary');
    }

    public function getSalaries(Request $request)
    {
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
            'branch_name' => 'required|string',
        ]);

        $nextIncrement = Carbon::parse($request->salary_start)->addMonths($request->increment_time)->toDateString();

        try {
            DB::beginTransaction();

            // Update salary status
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

            // Update bank details in HRM model
            Hrm::where('id', $request->employee_id)->update([
                'bank' => $request->bank_name,
                'account_title' => $request->account_title,
                'bank_account' => $request->account_number,
                'branch' => $request->branch_name,
            ]);

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
            $employee = Hrm::with(['salaryStatus'])->findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => [
                    'salary' => $employee->salaryStatus,
                    'bank' => [
                        'account_title' => $employee->account_title,
                        'bank_name' => $employee->bank,
                        'account_number' => $employee->bank_account,
                        'branch_name' => $employee->branch ?? ''
                    ],
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


    public function holiDays()
    {
        $holidays = MonthlyHolidays::all();
        return view('a_payroll.holidays', compact('holidays'));
    }
    public function holiDays_Store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'holiday_title' => 'required',
            'holiday_date' => 'required',
            'type' => 'required|in:holiday,weekend',
            'is_paid' => 'required|in:1,0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $date = Carbon::parse($request->holiday_date);

            if ($request->id) {
                // Update existing holiday
                $holiday = MonthlyHolidays::find($request->id);
                if (!$holiday) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Holiday not found'
                    ], 404);
                }

                $holiday->update([
                    'title' => $request->holiday_title,
                    'year' => $date->year,
                    'month' => $date->month,
                    'date' => $date,
                    'user_id' => Auth::id(),
                    'is_paid' => (int) $request->is_paid,
                    'type' => $request->type,
                ]);

                $message = 'Holiday updated successfully';
            } else {
                // Create new holiday
                MonthlyHolidays::create([
                    'title' => $request->holiday_title,
                    'year' => $date->year,
                    'month' => $date->month,
                    'date' => $date,
                    'user_id' => Auth::id(),
                    'is_paid' => (int) $request->is_paid,
                    'type' => $request->type,
                ]);

                $message = 'Holiday created successfully';
            }

            return response()->json([
                'success' => true,
                'message' => $message
            ]);

        } catch (\Throwable $e) {
            Log::error($e);

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong'
            ], 500);
        }
    }
    public function deleteHoliday($id)
    {
        $holiday = MonthlyHolidays::find($id);

        if (!$holiday) {
            return response()->json([
                'success' => false,
                'message' => 'Holiday not found'
            ], 404);
        }

        try {
            $holiday->delete();

            return response()->json([
                'success' => true,
                'message' => 'Holiday deleted successfully'
            ]);

        } catch (\Throwable $e) {

            Log::error($e);

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong'
            ], 500);
        }
    }
    public function getHolidayDetail(Request $request)
    {
        $holiday = MonthlyHolidays::where('date', $request->date)->first();

        if (!$holiday) {
            return response()->json(['success' => false, 'message' => 'Holiday not found'], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'title' => $holiday->title,
                // 'date' => $holiday->date->format('Y-m-d'),
                'date' => Carbon::parse($holiday->date)->format('d M Y'),
                'type' => $holiday->type,
                'is_paid' => $holiday->is_paid ? 'Paid' : 'Unpaid'
            ]
        ]);
    }

    public function get_holidays(Request $request)
    {
        $holidays = MonthlyHolidays::all()->map(function ($holiday) {
            return [
                'id' => $holiday->id,
                'title' => $holiday->title,
                'created_by' => $holiday->user ? $holiday->user->name : 'N/A',
                'date' => Carbon::parse($holiday->date)->format('d M Y'),
                'type' => $holiday->type,
                'is_paid' => $holiday->is_paid ? 'Paid' : 'Unpaid'
            ];
        });

        return response()->json($holidays);
    }

}
