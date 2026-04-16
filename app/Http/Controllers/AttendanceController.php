<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\LeaveType;
use Illuminate\Http\Request;

use App\Models\Hrm;
use App\Models\MonthlyHolidays;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function attendance_view(Request $request)
    {
        $employeesT = Hrm::select('id', 'name')->get();
        $years = range(Carbon::now()->year, Carbon::now()->year - 5);

        $month = $request->month ? Carbon::parse($request->month)->month : Carbon::now()->month;
        $year = $request->year ?? Carbon::now()->year;

        $date = Carbon::create($year, $month, 1);
        $daysInMonth = $date->daysInMonth;

        $monthDays = [];
        for ($i = 1; $i <= $daysInMonth; $i++) {
            $monthDays[] = Carbon::create($year, $month, $i)->format('Y-m-d');
        }

        $query = Hrm::with([
            'attendances' => function ($q) use ($month, $year) {
                $q->whereMonth('date', $month)->whereYear('date', $year);
            }
        ]);

        if ($request->employee_id) {
            $query->where('id', $request->employee_id);
        }

        $result = $query->paginate(20)->appends($request->all());

        // Pre-calculate statistics for the month
        $result->getCollection()->transform(function ($employee) {
            $employee->present_count = $employee->attendances->where('status', 'present')->count();
            $employee->leave_count = $employee->attendances->where('status', 'leave')->count();
            $employee->absent_count = $employee->attendances->where('status', 'absent')->count();
            return $employee;
        });

        // Calculate stats using MonthlyHolidays
        $holidays = MonthlyHolidays::where('month', (int) $month)
            ->where('year', (int) $year)
            ->get();

        $holiDayData = $holidays->keyBy('date');
        $nonWorkingDaysCount = $holiDayData->count();

        $workingDays = count($monthDays) - $nonWorkingDaysCount;

        $leaveTypes = LeaveType::all();
        return view('attendance_management.attendance.attendance-update', compact(
            'employeesT',
            'years',
            'monthDays',
            'result',
            'workingDays',
            'holiDayData',
            'leaveTypes'
        ));
    }

    public function get_leave_summary(Request $request)
    {
        $year = $request->year ?? Carbon::now()->year;
        $leaveUsage = Attendance::where('hrm_id', $request->employee_id)
            ->whereYear('date', $year)
            ->where('status', 'leave')
            ->select('leave_type_id', DB::raw('count(*) as used'))
            ->groupBy('leave_type_id')
            ->get();

        $leaveTypes = LeaveType::all();
        $summary = $leaveTypes->map(function ($type) use ($leaveUsage) {
            $usedRecord = $leaveUsage->where('leave_type_id', $type->id)->first();
            return [
                'name' => $type->name,
                'allowed' => $type->allowed,
                'used' => $usedRecord ? $usedRecord->used : 0,
                'remaining' => $type->allowed - ($usedRecord ? $usedRecord->used : 0)
            ];
        });

        return response()->json([
            'leave_summary' => $summary,
            'current_year' => $year
        ]);
    }

    public function get_attendance(Request $request)
    {
        $attendance = Attendance::where('hrm_id', $request->id)
            ->where('date', $request->date)
            ->first();

        $punches = [];
        if ($attendance) {
            if ($attendance->check_in) {
                $punches[] = [
                    'id' => $attendance->id,
                    'attendance' => $attendance->date . ' ' . $attendance->check_in,
                    'time' => Carbon::parse($attendance->check_in)->format('h:i A'),
                    'type' => 'in'
                ];
            }
            if ($attendance->check_out) {
                $punches[] = [
                    'id' => $attendance->id,
                    'attendance' => $attendance->date . ' ' . $attendance->check_out,
                    'time' => Carbon::parse($attendance->check_out)->format('h:i A'),
                    'type' => 'out'
                ];
            }
        }

        return response()->json([
            'punches' => $punches,
            'status' => $attendance ? $attendance->status : null,
            'notes' => $attendance ? $attendance->notes : '',
            'leave_type_id' => $attendance ? $attendance->leave_type_id : null,
            'check_in' => $attendance ? $attendance->check_in : null,
            'check_out' => $attendance ? $attendance->check_out : null,
            'custom_daily_salary' => $attendance ? $attendance->custom_daily_salary : null,
        ]);
    }

    public function update_att(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'day_attendance' => 'required',
            'custom_daily_salary' => 'nullable|numeric|min:0',
        ]);

        $status = 'present';
        $checkIn = $request->punch_in_time;
        $checkOut = $request->punch_out_time;
        $notes = $request->remarks;
        $leaveTypeId = null;

        if ($request->attendance_status === 'absent') {
            $status = 'absent';
            $checkIn = null;
            $checkOut = null;
            $leaveTypeId = null;
        } elseif ($request->attendance_status === 'leave') {
            $status = 'leave';
            $checkIn = null;
            $checkOut = null;
            $leaveTypeId = $request->leave_type_id;

            if ($leaveTypeId) {
                $leaveType = LeaveType::find($leaveTypeId);
                if ($leaveType) {
                    $notes = "Leave: " . $leaveType->name . ". " . $notes;
                }
            }
        }

        $attendance = Attendance::updateOrCreate(
            [
                'hrm_id' => $request->employee_id,
                'date' => $request->day_attendance,
            ],
            [
                'check_in' => $checkIn,
                'check_out' => $checkOut,
                'status' => $status,
                'notes' => $notes,
                'leave_type_id' => $leaveTypeId,
                'custom_daily_salary' => $request->custom_daily_salary
            ]
        );

        // Calculate total hours if both are present
        if ($attendance->check_in && $attendance->check_out) {
            $in = Carbon::parse($attendance->check_in);
            $out = Carbon::parse($attendance->check_out);
            $attendance->total_hours = $out->diffInMinutes($in) / 60;
        } else {
            $attendance->total_hours = 0;
        }
        $attendance->save();

        return response()->json('Attendance Updated Successfully');
    }

    public function delete_punch(Request $request)
    {
        $attendance = Attendance::find($request->id);
        if ($attendance) {
            $attendance->delete();
            return response()->json(['message' => 'success', 'response' => 'Attendance deleted']);
        }
        return response()->json(['message' => 'error', 'response' => 'Not found'], 404);
    }
}
