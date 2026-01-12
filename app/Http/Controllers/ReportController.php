<?php

namespace App\Http\Controllers;

use App\Models\PlanningItems;
use App\Models\SocialMediaAnalytics;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function admin_reports(){
        $items = PlanningItems::all();
         $analytics = SocialMediaAnalytics::firstOrCreate(['date' => now()->format('Y-m-d')]);
        return view('admin.reports.report',compact('items','analytics'));
    }
}
