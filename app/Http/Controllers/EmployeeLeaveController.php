<?php

namespace App\Http\Controllers;

use App\Models\EmployeeLeave;
use App\Models\LeaveType;
use App\Models\Hrm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmployeeLeaveController extends Controller
{
    public function index()
    {
        return view('attendance_management.employee_leaves.index');
    }

    public function get_data(Request $request)
    {
        $user = auth()->user();
        $query = EmployeeLeave::with(['leaveType', 'employee', 'approver']);

        // Check for admin role
        $isAdmin = $user->role === 'admin' || $user->role === 'superadmin' || $user->hasRole('Super Admin') || $user->hasRole('Admin');

        if (!$isAdmin) {
            // Find linked HRM profile by email
            $hrm = Hrm::where('email', $user->email)->first();

            if ($hrm) {
                $query->where('hrm_id', $hrm->id);
            } else {
                // If no HRM profile found, return empty result or handle appropriately
                return response()->json([]);
            }
        }

        $leaves = $query->latest()->get();

        return response()->json($leaves);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'leave_type_id' => 'required|exists:leave_types,id',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'description' => 'nullable|string|max:255',
            ]);

            $user = auth()->user();
            $hrm = Hrm::where('email', $user->email)->first();
            if (!$hrm) {
                $role = strtolower($user->role ?? '');

                if (in_array($role, ['admin', 'super admin'])) {
                    return response()->json([
                        'message' => ucfirst($role) . ' You Are Not Allowed To Send Leave Request'
                    ], 403);
                } else {
                    return response()->json([
                        'message' => 'Employee profile not found for this user.'
                    ], 422);
                }
            }

            $start = Carbon::parse($request->start_date);
            $end = Carbon::parse($request->end_date);
            $days = $start->diffInDays($end) + 1;

            // Check balance
            $leaveType = LeaveType::find($request->leave_type_id);
            $year = $start->year;

            $usedLeaves = EmployeeLeave::where('hrm_id', $hrm->id)
                ->where('leave_type_id', $request->leave_type_id)
                ->where('year', $year)
                ->where('status', 'approved')
                ->sum('number_of_leaves');

            if (($usedLeaves + $days) > $leaveType->allowed) {
                return response()->json([
                    'message' => "Insufficient leave balance. Remaining: " . ($leaveType->allowed - $usedLeaves) . " days. Requested: $days days."
                ], 422);
            }

            EmployeeLeave::create([
                'leave_type_id' => $request->leave_type_id,
                'hrm_id' => $hrm->id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'number_of_leaves' => $days,
                'description' => $request->description,
                'status' => 'pending',
                'year' => $year,
            ]);

            return response()->json(['message' => 'Leave request submitted successfully'], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['message' => 'Validation error', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function update_status(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|exists:employee_leaves,id',
                'status' => 'required|in:approved,rejected',
                'remarks' => 'nullable|string',
            ]);

            $leave = EmployeeLeave::findOrFail($request->id);

            // Only admin can approve/reject
            if (auth()->user()->role !== 'admin' && auth()->user()->role !== 'superadmin' && !auth()->user()->hasRole('Super Admin') && !auth()->user()->hasRole('Admin')) {
                return response()->json(['message' => 'Unauthorized'], 403);
            }

            $leave->update([
                'status' => $request->status,
                'remarks' => $request->remarks,
                'approved_by' => auth()->id(),
            ]);

            return response()->json(['message' => 'Leave status updated to ' . $request->status], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $leave = EmployeeLeave::findOrFail($request->id);
            $user = auth()->user();
            $isAdmin = $user->role === 'admin' || $user->role === 'superadmin' || $user->hasRole('Super Admin') || $user->hasRole('Admin');

            if (!$isAdmin) {
                $hrm = Hrm::where('email', $user->email)->first();
                if (!$hrm || $leave->hrm_id !== $hrm->id) {
                    return response()->json(['message' => 'Unauthorized'], 403);
                }
            }

            if ($leave->status !== 'pending' && !$isAdmin) {
                return response()->json(['message' => 'Cannot delete non-pending leaves'], 422);
            }

            $leave->delete();
            return response()->json(['message' => 'Leave request deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
}
