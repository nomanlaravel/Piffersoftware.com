<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function attendance_view(Request $request)
    {
        $employeesT = User::all();
        $years = range(Carbon::now()->year, Carbon::now()->year - 5);

        $month = $request->month ? Carbon::parse($request->month)->month : Carbon::now()->month;
        $year = $request->year ?? Carbon::now()->year;

        $date = Carbon::create($year, $month, 1);
        $daysInMonth = $date->daysInMonth;

        $monthDays = [];
        for ($i = 1; $i <= $daysInMonth; $i++) {
            $monthDays[] = Carbon::create($year, $month, $i)->format('Y-m-d');
        }

        $query = User::with([
            'attendances' => function ($q) use ($month, $year) {
                $q->whereMonth('date', $month)->whereYear('date', $year);
            }
        ]);

        if ($request->employee_id) {
            $query->where('id', $request->employee_id);
        }

        $result = $query->get();

        // Basic calculation for stats
        $satSuns = [
            'saturdays' => 0,
            'sundays' => 0
        ];
        foreach ($monthDays as $day) {
            $d = Carbon::parse($day);
            if ($d->isSaturday())
                $satSuns['saturdays']++;
            if ($d->isSunday())
                $satSuns['sundays']++;
        }
        $workingDays = count($monthDays) - ($satSuns['saturdays'] + $satSuns['sundays']);

        return view('attendance.attendance-update', compact('employeesT', 'years', 'monthDays', 'result', 'workingDays', 'satSuns'));
    }

    public function get_attendance(Request $request)
    {
        $attendance = Attendance::where('user_id', $request->id)
            ->where('date', $request->date)
            ->first();

        if ($attendance) {
            // Format to match what the JS expects (an array of punches)
            // Even though we only have one row, we'll return it as an array
            $data = [];
            if ($attendance->check_in) {
                $data[] = [
                    'id' => $attendance->id,
                    'attendance' => $attendance->date . ' ' . $attendance->check_in,
                    'time' => Carbon::parse($attendance->check_in)->format('h:i A'),
                    'type' => 'in'
                ];
            }
            if ($attendance->check_out) {
                $data[] = [
                    'id' => $attendance->id,
                    'attendance' => $attendance->date . ' ' . $attendance->check_out,
                    'time' => Carbon::parse($attendance->check_out)->format('h:i A'),
                    'type' => 'out'
                ];
            }
            return response()->json($data);
        }

        return response()->json([]);
    }

    public function update_att(Request $request)
    {
        $attendance = Attendance::updateOrCreate(
            [
                'user_id' => $request->employee_id,
                'date' => $request->day_attendance,
            ],
            [
                'check_in' => $request->punch_in_time,
                'check_out' => $request->punch_out_time,
                'status' => 'present'
            ]
        );

        // Calculate total hours if both are present
        if ($attendance->check_in && $attendance->check_out) {
            $in = Carbon::parse($attendance->check_in);
            $out = Carbon::parse($attendance->check_out);
            $attendance->total_hours = $out->diffInMinutes($in) / 60;
            $attendance->save();
        }

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
