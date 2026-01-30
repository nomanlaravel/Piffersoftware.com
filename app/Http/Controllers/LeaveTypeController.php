<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function leave_types()
    {
        return view('attendance_management.leave_types.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'allowed' => 'required|integer',
                'time_span' => 'required|in:annualy,monthly,once',
                'status' => 'required|in:active,held',
            ]);

            LeaveType::create([
                'name' => $request->name,
                'allowed' => $request->allowed,
                'time_span' => $request->time_span,
                'status' => $request->status,
                'paid' => $request->has('paid') ? true : false,
                'owner_id' => auth()->id(),
            ]);

            return response()->json('Leave type created successfully', 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while saving the leave type.',
                'status' => 'error',
                'error_detail' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get data for DataTables
     */
    public function get_data()
    {
        $leaveTypes = LeaveType::all();
        return response()->json($leaveTypes);
    }

    /**
     * Display the specified resource.
     */
    public function show(LeaveType $leaveType)
    {
        return response()->json($leaveType);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeaveType $leaveType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|exists:leave_types,id',
                'name' => 'required|string|max:255',
                'allowed' => 'required|integer',
                'time_span' => 'required|in:annualy,monthly,once',
                'status' => 'required|in:active,held',
            ]);

            $leaveType = LeaveType::find($request->id);
            $leaveType->update([
                'name' => $request->name,
                'allowed' => $request->allowed,
                'time_span' => $request->time_span,
                'status' => $request->status,
                'paid' => $request->has('paid') ? true : false,
            ]);

            return response()->json(['message' => 'Leave type updated successfully'], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while updating the leave type.',
                'status' => 'error',
                'error_detail' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $leaveType = LeaveType::findOrFail($request->id);
            $leaveType->delete();
            return response()->json(['message' => 'Leave type deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while deleting the leave type.',
                'status' => 'error',
                'error_detail' => $e->getMessage()
            ], 500);
        }
    }
}
