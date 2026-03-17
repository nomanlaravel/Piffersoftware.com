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
}
