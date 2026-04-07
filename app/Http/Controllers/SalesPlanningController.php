<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Carbon\Carbon;
use App\Models\Campaign;
use App\Models\Allreport;
use App\Models\Cro;
use App\Models\Requirement;
use App\Models\Wnationwide;
use Illuminate\Http\Request;
use App\Models\PlanningItems;
use App\Models\SocialMediaAnalytics;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;


class SalesPlanningController extends Controller
{

    public function deletereports($id)
    {
        $report = Allreport::find($id);

        if (!$report) {
            return redirect()->back()->with('error', "Report not found");
        }

        // If the image exists, delete it
        if ($report->image) {
            $imagePath = public_path('sales/' . $report->image); // assuming the image field holds the filename only

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        // Now delete the record
        $report->delete();

        return redirect()->back()->with('success', "Report deleted successfully along with the image");
    }
    public function search_sales_register_report(Request $request)
    {
        $cros = Cro::whereNotIn('region', ['Central-2', 'Central-3'])->orderBy('id')->get();
        $query = Allreport::with('cro')->where('report_name', 'sales_register_report');
        // Filtering logic
        if ($request->filled('month')) {
            try {
                $date = Carbon::createFromFormat('Y-m', $request->month);
                $startDate = $date->startOfMonth()->toDateString();
                $endDate = $date->endOfMonth()->toDateString();

                $query->whereDate('start_date', '>=', $startDate)
                    ->whereDate('end_date', '<=', $endDate);
            } catch (\Exception $e) {
                return back()->with('error', 'Invalid month format.');
            }
        } elseif ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereDate('start_date', '>=', $request->start_date)
                ->whereDate('end_date', '<=', $request->end_date);
        }

        $salesreport = $query
            ->orderBy('start_date', 'asc')
            ->get()
            ->groupBy(function ($report) {
                return Carbon::parse($report->start_date)->format('Y-m-d');
            });

        return view('salesreport.index', compact('cros', 'salesreport'));
    }
    public function quotation_register_report(Request $request)
    {
        $cros = Cro::orderBy('id')->get();
        $branches = Admin::orderBy('branch_office_name')->get();
        $query = Allreport::with(['cro', 'branch'])->where('report_name', 'quotation_register_report');
        $regions = Cro::select('region')->distinct()->pluck('region');

        // Branch Filter - FIXED
        if ($request->filled('branch') && $request->branch !== 'all') {
            $branch = Admin::where('branch_office_name', $request->branch)->first();
            if ($branch) {
                $query->where('branch_id', $branch->id);
            }
        }
        // Region Filter
        if ($request->filled('region')) {
            $query->whereHas('cro', function ($q) use ($request) {
                $q->where('region', $request->region);
            });
        }
        if ($request->filled('month')) {
            try {
                $date = Carbon::createFromFormat('Y-m', $request->month);
                $startDate = $date->startOfMonth()->toDateString();
                $endDate = $date->endOfMonth()->toDateString();

                $query->whereDate('start_date', '>=', $startDate)
                    ->whereDate('end_date', '<=', $endDate);
            } catch (\Exception $e) {
                return back()->with('error', 'Invalid month format.');
            }
        } elseif ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereDate('start_date', '>=', $request->start_date)
                ->whereDate('end_date', '<=', $request->end_date);
        }


        $quotationreport = $query
            ->orderBy('start_date', 'asc')
            ->get()
            ->groupBy(function ($report) {
                return Carbon::parse($report->start_date)->format('Y-m-d');
            });

        //   return $quotationreport;
        return view('quotationreport.index', compact('cros', 'quotationreport', 'regions', 'branches'));
    }

    public function feedback_register_report(Request $request)
    {
        $cros = Cro::whereNotIn('region', ['Central-2', 'Central-3'])->orderBy('id')->get();
        $query = Allreport::with(['cro', 'branch'])->where('report_name', 'feedback_register_report');
        $branches = Admin::orderBy('branch_office_name')->get();

        // Branch Filter - FIXED
        if ($request->filled('branch') && $request->branch !== 'all') {
            $branch = Admin::where('branch_office_name', $request->branch)->first();
            if ($branch) {
                $query->where('branch_id', $branch->id);
            }
        }
        // Region Filter
        if ($request->filled('region') && $request->region !== 'all') {
            $query->whereHas('cro', function ($q) use ($request) {
                $q->where('region', $request->region);
            });
        }
        // Customer Name Filter (client_name)
        if ($request->filled('client_name') && $request->client_name !== 'all') {
            $query->whereHas('cro', function ($q) use ($request) {
                $q->where('name', $request->client_name);
            });
        }
        // Filtering logic
        if ($request->filled('month')) {
            try {
                $date = Carbon::createFromFormat('Y-m', $request->month);
                $startDate = $date->startOfMonth()->toDateString();
                $endDate = $date->endOfMonth()->toDateString();

                $query->whereDate('start_date', '>=', $startDate)
                    ->whereDate('end_date', '<=', $endDate);
            } catch (\Exception $e) {
                return back()->with('error', 'Invalid month format.');
            }
        } elseif ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereDate('start_date', '>=', $request->start_date)
                ->whereDate('end_date', '<=', $request->end_date);
        }

        $feedbackreport = $query
            ->orderBy('start_date', 'asc')
            ->get()
            ->groupBy(function ($report) {
                return Carbon::parse($report->start_date)->format('Y-m-d');
            });

        return view('feedbackreport.index', compact('cros', 'feedbackreport', 'branches'));
    }

    public function nationwide_report(Request $request)
    {
        $query = Wnationwide::with('admin')->whereHas('admin');

        if ($request->filled('branch') && $request->branch !== 'all') {
            $query->where('branch_id', $request->branch);
        }


        if ($request->filled('remarks')) {
            $query->whereDate('remarks', $request->remarks);
        }

        $nationwide = $query->orderBy('id', 'desc')->get();

        return view('nationwide.index', [
            'nationwide' => $nationwide,
            'filters' => $request->all(),
            'total_new' => $nationwide->sum(fn($row) => (int) $row->new_profiles),
            'total_old' => $nationwide->sum(fn($row) => (int) $row->old_profiles),
            'total_sedulous' => $nationwide->sum(fn($row) => (int) $row->sedulous_profiles),
            'total_handbooks' => $nationwide->sum(fn($row) => (int) $row->handbooks),
            'total_kaychains' => $nationwide->sum(fn($row) => (int) $row->kay_chains),
            'total_calenders' => $nationwide->sum(fn($row) => (int) $row->calenders),
        ]);
    }

    public function search_daily_email_analytics_compaign(Request $request)
    {
        $query = SocialMediaAnalytics::query()->with(['admin', 'customer']);

        // Date Filter
        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        }

        // Month Filter
        if ($request->filled('month')) {
            try {
                $date = Carbon::createFromFormat('Y-m', $request->month);
                $query->whereBetween('date', [
                    $date->startOfMonth()->toDateString(),
                    $date->endOfMonth()->toDateString()
                ]);
            } catch (\Exception $e) {
            }
        }

        // Branch Filter
        if ($request->filled('branch') && $request->branch !== 'all') {
            $query->whereHas('customer', function ($q) use ($request) {
                $q->where('branch_name', $request->branch);
            });
        }

        // Region Filter
        if ($request->filled('region') && $request->region !== 'all') {
            $query->whereHas('customer', function ($q) use ($request) {
                $q->where('customers_region', $request->region);
            });
        }

        $analytics = $query->paginate(50);

        return view('analytics.index', [
            'analytics' => $analytics,
            'filters' => $request->all(),
        ]);
    }
    public function search_requirement_report(Request $request)
    {
        $query = Requirement::query();
        // Filter by RHQ if not "all"
        if ($request->filled('rhq') && $request->rhq !== 'all') {
            $query->where('rhq', $request->rhq);
        }
        // Filter by Date (format: Y-m-d)
        if ($request->filled('s_date')) {
            $query->whereDate('s_date', $request->s_date);
        }
        if ($request->filled('e_date')) {
            $query->whereDate('e_date', $request->e_date);
        }
$requirements = $query->where('type', 'security')->get();
        // Get unique RHQs for the select dropdown - formatted for blade template
        $all_rhqs_requirements = Requirement::select('rhq')->distinct()->get();

        return view('requirement.index', [
            'requirements' => $requirements,
            'filters' => $request->all(),
            'all_rhqs' => $all_rhqs_requirements,
        ]);
    }

    public function search_active_requirement_report(Request $request)
    {
        $query = Requirement::query();
        // Filter by RHQ if not "all"
        if ($request->filled('rhq') && $request->rhq !== 'all') {
            $query->where('rhq', $request->rhq);
        }
        // Filter by Date (format: Y-m-d)
        if ($request->filled('s_date')) {
            $query->whereDate('s_date', $request->s_date);
        }

        if ($request->filled('e_date')) {
            $query->whereDate('e_date', $request->e_date);
        }

$requirements = $query->where('type', 'sedulous')->get();
        // Get unique RHQs for the select dropdown - formatted for blade template
        $all_rhqs_requirements = Requirement::select('rhq')->distinct()->get();

        return view('requirement.active', [
            'requirements' => $requirements,
            'filters' => $request->all(),
            'all_rhqs' => $all_rhqs_requirements,
        ]);
    }

    public function items()
    {
        $items = PlanningItems::all();
        return view('Sales.add-item', compact('items'));
    }


    public function addItems(Request $request)
    {
        $validatedData = $request->validate([
            'item_name' => 'required|string|max:255',
            'item_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('item_image')) {
            $file = $request->file('item_image');
            $destinationPath = 'items';
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($destinationPath), $fileName);
            $imagePath = $destinationPath . '/' . $fileName;
        }

        $item = new PlanningItems();
        $item->item_name = $validatedData['item_name'];
        $item->item_image = $imagePath;
        $item->save();

        return redirect()->back()->with('success', 'Item created successfully!');
    }


    public function addCompaign()
    {
        $items = PlanningItems::all();
        return view('Sales.add-compaign', compact('items'));
    }

    public function compaign()
    {
        $campaigns = Campaign::all();
        $items = PlanningItems::all();

        return view('Sales.campaigns', compact('campaigns', 'items'));
    }


    // public function search_compaign_report(Request $request)
    // {
    //     $query = Campaign::query();
    //     $region = $request->region;
    //     if ($region && $region !== 'all') {
    //         $query->where('region', $region);
    //     }
    //     $compaigns = $query->get();
    //     // return $compaign;
    //     return view('searchresults.nationwide', [
    //         'compaigns' => $compaigns,
    //         'filters' => $request->all(),
    //     ]);
    // }

    public function search_compaign_report(Request $request)
{
    $query = Campaign::query();

    // Region Filter
    if ($request->region && $request->region !== 'all') {
        $query->where('region', $request->region);
    }

    // Branch Filter ✅ (BEST WAY)
    if ($request->branch && $request->branch !== 'all') {
        $query->where('branch_id', $request->branch);
    }

    $compaigns = $query->with('branch')->get();

    return view('searchresults.nationwide', [
        'compaigns' => $compaigns,
        'filters' => $request->all(),
    ]);
}

    public function search_sales_email_compaign(Request $request)
    {
        $query = Campaign::query();

        if ($request->filled('start_date')) {
            $query->whereDate('start_date', $request->start_date); // OK: start_date is a date field
        }
        if ($request->filled('end_date')) {
            $query->whereDate('end_date', $request->end_date); // OK: start_date is a date field
        }
        if ($request->filled('campaign_number')) {
            $query->where('campaign_number', $request->campaign_number); // Use where()
        }
        if ($request->filled('segment')) {
            $query->where('segment', $request->segment); // Use where()
        }

        if ($request->filled('item_name')) {
            $query->where('item_name', $request->item_name); // Use where()
        }
        $email_compaigns = $query->get();
        return view('searchresults.sales_email_compaign_report', [
            'email_compaigns' => $email_compaigns,
            'filters' => $request->all(),
        ]);
    }


    public function storeCampaign(Request $request)
    {
        $campaign = new Campaign();

        $campaign->fill($request->except([
            'reporting_to_attach',
            'list_of_address_attach',
            'dispatched_to_attach',
            'items_return_attach',
            'dispatch_by_attach'
        ]));

        $imageFields = [
            'reporting_to_attach',
            'list_of_address_attach',
            'dispatched_to_attach',
            'items_return_attach',
            'dispatch_by_attach',
        ];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                // Store the file in public/campaigns and use the original file name
                $file = $request->file($field);
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('campaigns'), $fileName);

                // Save just the file name in the database
                $campaign->$field = $fileName;
            }
        }

        $campaign->save();

        return redirect()->back()->with('success', 'Campaign created successfully!');
    }



    public function editCampaign($id)
    {
        // return 2345;
        $campaign = Campaign::findOrFail($id);
        return view('Sales.edit-campaign', compact('campaign'));
    }

    public function viewCampaign($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('Sales.view-campaign', compact('campaign'));
    }

    public function updateCampaign(Request $request, $id)
    {
        $campaign = Campaign::findOrFail($id);

        $campaign->fill($request->except([
            'reporting_to_attach',
            'list_of_address_attach',
            'dispatched_to_attach',
            'items_return_attach',
            'dispatch_by_attach'
        ]));

        $imageFields = [
            'reporting_to_attach',
            'list_of_address_attach',
            'dispatched_to_attach',
            'items_return_attach',
            'dispatch_by_attach',
        ];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                // Store the file in public/campaigns and use the original file name
                $file = $request->file($field);
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('campaigns'), $fileName);

                // Save just the file name in the database
                $campaign->$field = $fileName;
            }
        }

        $campaign->save();

        return redirect()->route('campaign')->with('success', 'Campaign updated successfully!');
    }

    public function deleteCampaign($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->delete();

        return redirect()->route('campaign')->with('success', 'Campaign deleted successfully!');
    }



    public function sendPDFViaEmail(Request $request)
    {
        try {
            $email = $request->input('email');
            $cc = $request->input('cc');
            $bcc = $request->input('bcc');
            $subject = $request->input('subject');
            $body = $request->input('body');
            $pdf = $request->file('pdf');

            Mail::send([], [], function ($message) use ($email, $cc, $bcc, $subject, $body, $pdf) {
                $message->to($email)
                    ->subject($subject);

                // Check if CC is provided
                if (!empty($cc)) {
                    $message->cc($cc);
                }

                // Check if BCC is provided
                if (!empty($bcc)) {
                    $message->bcc($bcc);
                }

                $message->attach($pdf, ['as' => 'campaign_information.pdf'])
                    ->text($body);
            });

            return response()->json(['message' => 'Email sent successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to send email.'], 500);
        }
    }
}
