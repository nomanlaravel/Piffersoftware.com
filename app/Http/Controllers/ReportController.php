<?php

namespace App\Http\Controllers;

use App\Models\PlanningItems;
use App\Models\Customer;
use App\Models\SocialMediaAnalytics;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function admin_reports()
    {
        $items = PlanningItems::all();
        $regions = Customer::whereNotNull('customers_region')
            ->where('customers_region', '!=', '')
            ->distinct()
            ->pluck('customers_region');
        $branches = Customer::whereNotNull('branch_name')
            ->where('branch_name', '!=', '')
            ->distinct()
            ->pluck('branch_name');
        $analytics = SocialMediaAnalytics::firstOrCreate(['date' => now()->format('Y-m-d')]);
        return view('admin.reports.report', compact('items', 'branches', 'regions', 'analytics'));
    }
     public function score_card(Request $request)
    {
        $query = Customer::query();

        if ($request->filled('client_id')) {
            $query->where('id', $request->client_id);
        }

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('scr_cus_date', [$request->start_date, $request->end_date]);
        } elseif ($request->filled('start_date')) {
            $query->where('scr_cus_date', '>=', $request->start_date);
        } elseif ($request->filled('end_date')) {
            $query->where('scr_cus_date', '<=', $request->end_date);
        }

        if ($request->filled('month')) {
            $query->where('f_month', 'like', $request->month . '%');
        }

        // Only include customers that have score card data (e.g. have a grand total)
        $query->whereNotNull('marks_grand_total');

        $customers = $query->get();
        
        return view('admin.reports.score_card', compact('customers', 'request'));
    }
}
