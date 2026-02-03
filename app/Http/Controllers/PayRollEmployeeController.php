<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeSalaryStatus;
use App\Models\EmployeeSalarySlip;
use App\Models\Hrm;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PayRollEmployeeController extends Controller
{
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
        ]);

        $nextIncrement = Carbon::parse($request->salary_start)->addMonths($request->increment_time)->toDateString();

        try {
            DB::beginTransaction();

            EmployeeSalaryStatus::updateOrCreate(
                ['employee_id' => $request->employee_id],
                [
                    'time_period' => $request->increment_time . ' months',
                    'before_increment' => $request->basic_salary,
                    'next_increment' => $nextIncrement,
                    'increment_amount' => 0,
                    'status' => 'active',
                    'user_id' => Auth::id(),
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
}
