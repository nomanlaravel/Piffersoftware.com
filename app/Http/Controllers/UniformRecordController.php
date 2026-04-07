<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UniformRecord;
use App\Models\ContractDetail;

class UniformRecordController extends Controller
{

    public function storeweakly_uniform_recordes(Request $request)
    {
        $validated = $request->validate([
            'uni_date' => 'nullable',
            'branch_id' => 'required|exists:admins,id',
        ]);

        $fields = [
            'stand_uniform',
            'white_sleeves',
            'ssg_uniform',
            't_shirt',
            'lady_gown',
            'suit',
            'dms',
            'standard_shows',
            'beige_color_shoes',
            'whistile_n_dory',
            'employee_card',
            'p_gap',
            'barret_cap',
            'white_belt',
            'black_belt',
            'sash',
            'qamar_barand',
            'white_gloves',
            'white_arm_sleves',
            'arm_band',
            'scarf',
            'winter_jacket',
            'high_visibility_jacket',
            'jarsee',
            'rain_coat',
            'umbrella',
            'torch',
            'others',
            'supervisor_signature',
            'manager_operation_signature',
            'gm_signature',
        ];

        foreach ($fields as $field) {
            $validated[$field] = $request->input($field);
        }

        UniformRecord::create($validated);

        return back()->with('success', 'Uniform record saved successfully!');
    }

    public function weekly_sales_record(Request $request)
    {
        $contract = new ContractDetail();
        $contract->date = $request->date;
        $contract->branch_id = $request->branch_id;
        $contract->profile = $request->profile;
        $contract->quotations = $request->quotations;
        $contract->visiting_cards = $request->visiting_cards;
        $contract->guards = $request->guards;
        $contract->contractual_value = $request->contractual_value;
        $contract->save();
        return response()->json(['message' => 'Saved successfully', 'data' => $contract]);
    }

    public function search_weekly_sales_record(Request $request)
    {

        $query = ContractDetail::query();

        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        }

        if ($request->filled('branch') && $request->branch != 'all') {
            $query->where('branch_id', $request->branch);
        }

        if ($request->filled('region') && $request->region != 'all') {
            $region = $request->region;

            $query->whereHas('sales_branch', function ($q) use ($region) {
                $q->where('branch_category', $region);
            });
        }

        $sales = $query->get();
        // return $sales;
        return view('salesreport.weekly_sales', [
            'sales' => $sales,
            'filters' => $request->all(),
        ]);
    }

}
