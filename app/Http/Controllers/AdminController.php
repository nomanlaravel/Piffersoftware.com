<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Hrm;
use App\Models\Admin;
use App\Models\Token;
use App\Models\Notice;
use App\Models\Rental;
use App\Models\Repair;
use App\Models\Social;
use App\Models\CroTask;
use App\Models\Campaign;
use App\Models\Customer;
use App\Models\Moveable;
use App\Models\Allreport;
use App\Models\TaskGroup;
use App\Models\Wnationwide;
use App\Models\RentalAmount;
use Illuminate\Http\Request;
use App\Models\UsageMovement;
use App\Models\OfficeBranding;
use App\Models\TaskAssignment;
use App\Models\TrackerCompany;
use App\Models\OfficeEquipment;
use App\Models\OfficeInventory;
use App\Models\TaskRecordDairy;
use App\Models\BrancheportingTo;
use App\Models\AdminNotification;
use App\Models\DialyBranchReport;
use App\Models\InsurranceCompany;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\SocialMediaAnalytics;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\rental_amounts;
use App\Models\Cro;
use App\Models\InternalDispatch;
use App\Models\UniformRecord;
use App\Models\WeaponRecord;
use App\Models\ContractDetail;

use Illuminate\Database\Eloquent\ModelNotFoundException;


class AdminController extends Controller
{


    public function admin_moveable_assets(Request $request)
    {
        // $query  = Admin::with('moveables');
        $query  = Admin::with('moveables');

        if ($request->filled('branch_office_name') && $request->branch_office_name !== 'all') {
            $query->where('branch_office_name', $request->branch_office_name);
        }

        $milllagerecords = $query->get();
        return view('searchresults.millagerecord', [
            'milllagerecords' => $milllagerecords,
            'filters' => $request->all(),
        ]);
    }





    public function task_record_dairy(Request $request)
    {
        $validated = $request->validate([
            'description_task' => 'required|string',
            'dependence_department_organization' => 'required|string',
            'task_assigned_by' => 'required|string',
            'review_date' => 'required|date',
            'completion_date' => 'required|date',
            'signature' => 'required|string',
        ]);

        $validated['sr_no'] = (TaskRecordDairy::max('sr_no') ?? 0) + 1;

        $task = TaskRecordDairy::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Task record created successfully',
            'data' => $task,
        ]);
    }

    public function notices_store(Request $request)
    {
        Log::info('Incoming Notice:', $request->all());

        $notices = new Notice();

        $notices->regulator_name = $request->regulator_name;
        $notices->notice_date = $request->notice_date;
        $notices->notice_received_on = $request->notice_received_on;
        $notices->reporting_date = $request->reporting_date;
        $notices->concern_department = $request->concern_department;
        $notices->notice_entered = (int) $request->notice_entered;
        $notices->reported_to_cro = $request->reported_to_cro;
        $notices->notice_description = $request->notice_description;

        // Handle file upload
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('notices', $filename, 'public');
            $notices->attachment = $path;
        }

        $notices->save();

        return response()->json(['message' => 'Notice uploaded successfully!']);
    }

    public function search_notice_log_sheet(Request $request)
    {
        $dateOfNotice = $request->input('notice_date');
        $noticedReceived = $request->input('notice_received_on');
        $reportHearingDate = $request->input('reporting_date');

        $search = Notice::query();

        if ($dateOfNotice) {
            $search->whereMonth('notice_date', '=', date('m', strtotime($dateOfNotice . '-01')))
                ->whereYear('notice_date', '=', date('Y', strtotime($dateOfNotice . '-01')));
        }

        if ($noticedReceived) {
            $search->whereMonth('notice_received_on', '=', date('m', strtotime($noticedReceived . '-01')))
                ->whereYear('notice_received_on', '=', date('Y', strtotime($noticedReceived . '-01')));
        }

        if ($reportHearingDate) {
            $search->whereMonth('reporting_date', '=', date('m', strtotime($reportHearingDate . '-01')))
                ->whereYear('reporting_date', '=', date('Y', strtotime($reportHearingDate . '-01')));
        }

        $searchData = $search->get();
        if ($request->ajax()) {
            return response()->json(['searchData' => $searchData]);
        }

        return view('feedbackreport.notice-log-sheet', compact('searchData'));
    }

    public function search_task_record_dairy(Request $request)
    {
        $reviewDate = $request->input('review_date');
        $completionDate = $request->input('completion_date');

        $query = TaskRecordDairy::query();

        if ($reviewDate) {
            $query->whereMonth('review_date', '=', date('m', strtotime($reviewDate . '-01')))
                ->whereYear('review_date', '=', date('Y', strtotime($reviewDate . '-01')));
        }

        if ($completionDate) {
            $query->whereMonth('completion_date', '=', date('m', strtotime($completionDate . '-01')))
                ->whereYear('completion_date', '=', date('Y', strtotime($completionDate . '-01')));
        }

        $data = $query->get();

        // Only return JSON for AJAX requests
        if ($request->ajax()) {
            return response()->json(['data' => $data]);
        }

        return view('feedbackreport.task-record-dairy', compact('data'));
    }
    //     public function wnationwide_store(Request $request)
    // {
    //   $validated = $request->validate([
    //         'branch_id' => 'required|string',
    //         'new_profiles' => 'nullable|string',
    //         'old_profiles' => 'nullable|string',
    //         'sedulous_profiles' => 'nullable|string',
    //         'handbooks' => 'nullable|string',
    //         'kay_chains' => 'nullable|string',
    //         'calenders' => 'nullable|string',
    //         'remarks' => 'nullable|string',
    //         'nationenddate' => 'nullable|string',
    //     ]);

    //     // Check if this branch_id already exists
    //     $existing = Wnationwide::where('branch_id', $validated['branch_id'])->first();

    //     if ($existing) {
    //         // Update existing record
    //         $existing->update($validated);
    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'Data updated successfully.',
    //             'data' => $existing
    //         ]);
    //     } else {
    //         // Create new record
    //         $entry = Wnationwide::create($validated);
    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'Data saved successfully.',
    //             'data' => $entry
    //         ]);
    //     }
    // }


    public function wnationwide_store(Request $request)
    {
        $validated = $request->validate([
            'branch_id' => 'nullable',
            'new_profiles' => 'nullable|string',
            'old_profiles' => 'nullable|string',
            'sedulous_profiles' => 'nullable|string',
            'handbooks' => 'nullable|string',
            'kay_chains' => 'nullable|string',
            'calenders' => 'nullable|string',
            'remarks' => 'nullable|string',

        ]);
        $entry = Wnationwide::create($validated);
        return response()->json([
            'status' => 'success',
            'message' => 'Data saved successfully.',
            'data' => $entry
        ]);
    }

    public function upload_sales_register_report(Request $request)
    {
        $request->validate([
            'cro_id' => 'required|exists:cros,id',
            'attachment' => 'required|file|max:2048'
        ]);

        $salesregisterreport = new Allreport();
        $salesregisterreport->cro_id = $request->cro_id;
        $salesregisterreport->start_date = $request->start_date;
        $salesregisterreport->end_date = $request->end_date;
        $salesregisterreport->report_name = $request->report_name;
        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment');
            $attachmentname = time() . '.' . $attachment->getClientOriginalExtension();
            $attachment->move('sales', $attachmentname);
            $salesregisterreport->attachment = 'sales/' . $attachmentname;
        }
        // Don't forget to save the record
        $salesregisterreport->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Report uploaded successfully.',
            'path' => $salesregisterreport->attachment,
            'id' => $salesregisterreport->id
        ]);
    }

    public function update_Field(Request $request)
    {
        $analytics = SocialMediaAnalytics::updateOrCreate(
            ['date' => now()->format('Y-m-d')],
            [$request->field => $request->value]
        );

        return response()->json(['success' => true]);
    }

    public function updateLikes(Request $request)
    {
        $platform = $request->platform;
        $post_type = $request->post_type;
        $value = intval($request->value ?? 0);

        DB::table('social_metrics')->updateOrInsert(
            ['platform' => $platform, 'post_type' => $post_type],
            ['likes' => $value, 'updated_at' => now()]
        );

        return response()->json(['status' => 'success', 'message' => 'Likes updated successfully']);
    }

    public function showSocials()
    {
        // Correct table used here
        $socials = DB::table('social_metrics')
            ->select(DB::raw("CONCAT(platform, '_', post_type) as key"), 'likes')
            ->pluck('likes', 'key');

        return view('admin.editadmin', compact('socials'));
    }

    public function admin()
    {
        $branches = Admin::with('reports')->get();
        // return $branches;
        return view('admin.admin', ['branches' => $branches]);
    }

    public function search_baranceshes(Request $request)
    {
        $branchOfficeName = $request->branch_office_name;
        $reportDate = $request->report_date;

        $branches = Admin::all();

        // Start query builder for Admin with reports
        $query = Admin::with(['reports' => function ($q) use ($reportDate) {
            if ($reportDate) {
                $q->where('report_date', $reportDate);
            }
        }]);

        if ($branchOfficeName && $branchOfficeName !== 'all') {
            $query->where('branch_office_name', $branchOfficeName);
        }

        $results = $query->get();

        // Optional: Remove Admins with no reports after filtering by date
        $results = $results->filter(function ($admin) {
            return $admin->reports->count() > 0;
        });

        return view('searchresults.branches', [
            'results' => $results,
            'branches' => $branches,
            'filters' => $request->all()
        ]);
    }


    public function search(Request $request)
    {
        $searchText = $request->get('search');
        $branches = Admin::where('branch_id', 'LIKE', "%$searchText%")
            ->orWhere('branch_office_name', 'LIKE', "%$searchText%")
            ->orWhere('branch_category', 'LIKE', "%$searchText%")
            ->orWhere('branch_ptcl', 'LIKE', "%$searchText%")
            ->orWhere('gm_name', 'LIKE', "%$searchText%")
            ->orWhere('gm_cell', 'LIKE', "%$searchText%")
            ->orWhere('gm_email', 'LIKE', "%$searchText%")
            ->orWhere('dgm_name', 'LIKE', "%$searchText%")
            ->orWhere('dgm_cell', 'LIKE', "%$searchText%")
            ->orWhere('cro_name', 'LIKE', "%$searchText%")
            ->orWhere('cro_cell', 'LIKE', "%$searchText%")
            ->orWhere('cro_ptcl', 'LIKE', "%$searchText%")
            ->orWhere('branch_office_no', 'LIKE', "%$searchText%")
            ->orWhere('branch_building', 'LIKE', "%$searchText%")
            ->orWhere('branch_block', 'LIKE', "%$searchText%")
            ->orWhere('branch_area', 'LIKE', "%$searchText%")
            ->orWhere('branch_city', 'LIKE', "%$searchText%")
            ->orWhere('branch_pin', 'LIKE', "%$searchText%")
            ->orWhere('branch_gps', 'LIKE', "%$searchText%")
            ->get();

        if ($branches->isEmpty()) {
            return response()->json(['html' => '<tr><td colspan="5">No results found</td></tr>']);
        }

        $rows = '';

        foreach ($branches as $branch) {
            $rows .= '<tr>';
            $rows .= '<td>' . htmlspecialchars($branch->branch_id) . '</td>';
            $rows .= '<td>' . htmlspecialchars($branch->branch_office_name) . '</td>';
            $rows .= '<td>' . htmlspecialchars($branch->branch_category) . '</td>';
            $rows .= '<td>' . htmlspecialchars($branch->branch_ptcl) . '</td>';
            $rows .= '<td style="display:flex; gap: 10px; align-items: center;">';
            $rows .= '<a class="btn btn-primary" style="width:84%; height:80%;" href="' . route('viewadmin', ['id' => $branch->id]) . '">View</a>';
            if (auth()->user()->role !== 'client') {
                $rows .= '<a class="btn btn-primary" style="width:40%; height:60%;" href="' . route('editadmin', ['id' => $branch->id]) . '">Edit</a>';
            }
            $rows .= '</td>';
            $rows .= '</tr>';
        }

        return response()->json(['html' => $rows]);
    }

    public function adminone()
    {
        return view('admin.adminone');
    }

    public function postadmin()
    {
        $adminequipments = OfficeEquipment::all();
        $reportings = BrancheportingTo::all();
        $cros = Cro::all();
        return view('admin.postadmin', compact('adminequipments', 'reportings', 'cros'));
    }

    public function submitadmin(Request $request)
    {
        DB::beginTransaction();

        try {
            Log::info('Submit admin request received.');

            $adminData = $request->except('_token');


            $adminImageFields = [
                'branch_photo',
            ];

            foreach ($adminImageFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $adminData[$field] = 'uploads/images/' . $file_name;
                }
            }

            $adminData['office_activation'] = $request->input('office_activation', 0);

            $admin = Admin::create($adminData);


            //Admin Token Details

            $adminReportData = $request->only([
                'report_date',
                'site_id',
                'branch',
                'location',
                'auth_guards',
                'army',
                'ssg',
                'civil',
                'absente',
                'leave',
                'reason',
                'r_provided',
                'last_comp_date',
                'any_inc',
                'pending_nadra',
                'unsent_dpo_rep',
                'no_of_resigns',
                'guards_wout_bank',
                'any_new_site',
                'no_of_guards',
                'any_site_closed',
                'no_of_guards_of_closed_site',
                'escort_duties',
                'event_details',
                'pending_recoveries',
                'sign_manager',
                'staff_on_leav',
                'short_leav',
                'utility_bills',
                'bio_matric',
                'bio_register',
                'office_rent',
                'ups',
                'guard_file',
                'guard_accomodation',
                'any_maintainence',
                'weapon_register',
                'cctv',
                'attendance_register',
                'kote_register'
            ]);



            $adminReportDataArray = [];
            foreach ($adminReportData['site_id'] as $index => $siteId) {
                $adminReportDataDataRow = [
                    'site_id' => $siteId,
                    'report_date' => $adminReportData['report_date'][$index],
                    'branch' => $adminReportData['branch'][$index],
                    'location' => $adminReportData['location'][$index],
                    'auth_guards' => $adminReportData['auth_guards'][$index],
                    'army' => $adminReportData['army'][$index],
                    'ssg' => $adminReportData['ssg'][$index],
                    'civil' => $adminReportData['civil'][$index],
                    'absente' => $adminReportData['absente'][$index],
                    'leave' => $adminReportData['leave'][$index],
                    'reason' => $adminReportData['reason'][$index],
                    'r_provided' => $adminReportData['r_provided'][$index],
                    'last_comp_date' => $adminReportData['last_comp_date'][$index],
                    'any_inc' => $adminReportData['any_inc'][$index],
                    'pending_nadra' => $adminReportData['pending_nadra'][$index],
                    'unsent_dpo_rep' => $adminReportData['unsent_dpo_rep'][$index],
                    'no_of_resigns' => $adminReportData['no_of_resigns'][$index],
                    'guards_wout_bank' => $adminReportData['guards_wout_bank'][$index],
                    'any_new_site' => $adminReportData['any_new_site'][$index],
                    'no_of_guards' => $adminReportData['no_of_guards'][$index],
                    'any_site_closed' => $adminReportData['any_site_closed'][$index],
                    'no_of_guards_of_closed_site' => $adminReportData['no_of_guards_of_closed_site'][$index],
                    'escort_duties' => $adminReportData['escort_duties'][$index],
                    'event_details' => $adminReportData['event_details'][$index],
                    'pending_recoveries' => $adminReportData['pending_recoveries'][$index],
                    'sign_manager' => $adminReportData['sign_manager'][$index],
                    'staff_on_leav' => $adminReportData['staff_on_leav'][$index],
                    'short_leav' => $adminReportData['short_leav'][$index],
                    'utility_bills' => $adminReportData['utility_bills'][$index],
                    'bio_matric' => $adminReportData['bio_matric'][$index],
                    'bio_register' => $adminReportData['bio_register'][$index],
                    'office_rent' => $adminReportData['office_rent'][$index],
                    'ups' => $adminReportData['ups'][$index],
                    'guard_file' => $adminReportData['guard_file'][$index],
                    'guard_accomodation' => $adminReportData['guard_accomodation'][$index],
                    'any_maintainence' => $adminReportData['any_maintainence'][$index],
                    'weapon_register' => $adminReportData['weapon_register'][$index],
                    'cctv' => $adminReportData['cctv'][$index],
                    'attendance_register' => $adminReportData['attendance_register'][$index],
                    'kote_register' => $adminReportData['kote_register'][$index],
                ];


                $adminReportFields = [
                    'sal_attach',
                ];

                foreach ($adminReportFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $adminReportDataDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $adminReportDataArray[] = $adminReportDataDataRow;
            }

            $admin->reports()->createMany($adminReportDataArray);

            //Admin Office Inventory
            $adminOfficeData = $request->only([
                'category',
                'quantity',
                'notes'
            ]);

            $adminOfficeDataArray = [];
            foreach ($adminOfficeData['category'] as $index => $category) {
                $adminOfficeDataDataRow = [
                    'category' => $category,
                    'quantity' => $adminOfficeData['quantity'][$index],
                    'notes' => $adminOfficeData['notes'][$index],
                ];

                $adminOfficeFields = [
                    'attachments',
                ];

                foreach ($adminOfficeFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $adminOfficeDataDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $adminOfficeDataArray[] = $adminOfficeDataDataRow;
            }

            $admin->inventories()->createMany($adminOfficeDataArray);

            //Admin Branding

            $adminBrandData = $request->only([
                'b_type',
                'site_of_b',
                'cost_of_b',
                'periodical_m',
                'vendor_id',
                'v_name',
                'v_cell',
                'v_office',
                'v_floor',
                'v_building',
                'v_block',
                'v_area',
                'v_city',
                'v_pin',
                'v_notes'
            ]);

            $adminBrandDataArray = [];
            foreach ($adminBrandData['b_type'] as $index => $bType) {
                $adminBrandDataDataRow = [
                    'b_type' => $bType,
                    'site_of_b' => $adminBrandData['site_of_b'][$index],
                    'cost_of_b' => $adminBrandData['cost_of_b'][$index],
                    'periodical_m' => $adminBrandData['periodical_m'][$index],
                    'vendor_id' => $adminBrandData['vendor_id'][$index],
                    'v_name' => $adminBrandData['v_name'][$index],
                    'v_cell' => $adminBrandData['v_cell'][$index],
                    'v_office' => $adminBrandData['v_office'][$index],
                    'v_floor' => $adminBrandData['v_floor'][$index],
                    'v_building' => $adminBrandData['v_building'][$index],
                    'v_block' => $adminBrandData['v_block'][$index],
                    'v_area' => $adminBrandData['v_area'][$index],
                    'v_city' => $adminBrandData['v_city'][$index],
                    'v_pin' => $adminBrandData['v_pin'][$index],
                    'v_notes' => $adminBrandData['v_notes'][$index],
                ];

                $adminBrandFields = [
                    'picture_of_b',
                    'v_photo_b',
                    'v_attach'
                ];

                foreach ($adminBrandFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $adminBrandDataDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $adminBrandDataArray[] = $adminBrandDataDataRow;
            }

            $admin->brandings()->createMany($adminBrandDataArray);

            //MoveAble Assets

            $adminMoveData = $request->only([
                'type_of_vehicle',
                'vehicle_no',
                'vehicle_model',
                'payment_type',
                'vehicle_name',
                'engine_no',
                'chasis_no',
                'vehicle_color',
                'vehicle_model'
            ]);

            $adminMoveDataArray = [];
            foreach ($adminMoveData['type_of_vehicle'] as $index => $type_of_vehicle) {
                $adminMoveDataRow = [
                    'type_of_vehicle' => $type_of_vehicle,
                    'vehicle_no' => $adminMoveData['vehicle_no'][$index],
                    'vehicle_model' => $adminMoveData['vehicle_model'][$index],
                    'payment_type' => $adminMoveData['payment_type'][$index],
                    'vehicle_name' => $adminMoveData['vehicle_name'][$index],
                    'engine_no' => $adminMoveData['engine_no'][$index],
                    'chasis_no' => $adminMoveData['chasis_no'][$index],
                    'vehicle_color' => $adminMoveData['vehicle_color'][$index],
                ];

                $adminMoveFields = [
                    'vehicle_pic',
                    'vehicle_book_pic'
                ];

                foreach ($adminMoveFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $adminMoveDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $adminMoveDataArray[] = $adminMoveDataRow;
            }

            $admin->moveables()->createMany($adminMoveDataArray);

            //Admin Token

            $adminTokenData = $request->only([
                'amount_paid',
                'type_of_payment',
                'payment_date',
                'ins_no',
                'voucher_no',
                'token_note'
            ]);

            $adminTokenDataArray = [];
            foreach ($adminTokenData['amount_paid'] as $index => $amountPaid) {
                $adminTokenDataRow = [
                    'amount_paid' => $amountPaid,
                    'type_of_payment' => $adminTokenData['type_of_payment'][$index],
                    'ins_no' => $adminTokenData['ins_no'][$index],
                    'voucher_no' => $adminTokenData['voucher_no'][$index],
                    'payment_date' => $adminTokenData['payment_date'][$index],
                    'token_note' => $adminTokenData['token_note'][$index],
                ];

                $adminTokenFields = [
                    'token_attach'
                ];

                foreach ($adminTokenFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $adminTokenDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $adminTokenDataArray[] = $adminTokenDataRow;
            }

            $admin->tokens()->createMany($adminTokenDataArray);

            //Insurrance Company Details

            $adminInsurranceData = $request->only([
                'company_name',
                'i_poc_name',
                'i_poc_web',
                'i_poc_email',
                'i_poc_cell',
                'value_of_sum',
                'i_poc_office',
                'i_poc_floor',
                'i_poc_building',
                'i_poc_block',
                'i_poc_area',
                'i_poc_city',
                'i_poc_pin',
                'ins_note',
            ]);

            $adminInsurranceDataArray = [];
            foreach ($adminInsurranceData['company_name'] as $index => $companyName) {
                $adminInsurranceDataRow = [
                    'company_name' => $companyName,
                    'i_poc_name' => $adminInsurranceData['i_poc_name'][$index],
                    'i_poc_web' => $adminInsurranceData['i_poc_web'][$index],
                    'i_poc_email' => $adminInsurranceData['i_poc_email'][$index],
                    'i_poc_cell' => $adminInsurranceData['i_poc_cell'][$index],
                    'value_of_sum' => $adminInsurranceData['value_of_sum'][$index],
                    'i_poc_office' => $adminInsurranceData['i_poc_office'][$index],
                    'i_poc_floor' => $adminInsurranceData['i_poc_floor'][$index],
                    'i_poc_building' => $adminInsurranceData['i_poc_building'][$index],
                    'i_poc_block' => $adminInsurranceData['i_poc_block'][$index],
                    'i_poc_area' => $adminInsurranceData['i_poc_area'][$index],
                    'i_poc_city' => $adminInsurranceData['i_poc_city'][$index],
                    'i_poc_pin' => $adminInsurranceData['i_poc_pin'][$index],
                    'ins_note' => $adminInsurranceData['ins_note'][$index],
                ];

                $adminInsurranceFields = [
                    'ins_p_pic',
                    'c_of_ins',
                    'ins_attach',
                    'i_poc_loc'
                ];

                foreach ($adminInsurranceFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $adminInsurranceDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $adminInsurranceDataArray[] = $adminInsurranceDataRow;
            }

            $admin->insurrances()->createMany($adminInsurranceDataArray);

            //Tracker Company Details

            $adminTrackerData = $request->only([
                'tracker_company_name',
                't_poc_name',
                't_poc_web',
                't_poc_email',
                't_poc_cell',
                't_poc_office',
                't_poc_floor',
                't_poc_building',
                't_poc_block',
                't_poc_area',
                't_poc_city',
                't_poc_pin',
                'tracker_note',
            ]);

            $adminTrackerDataArray = [];
            foreach ($adminTrackerData['tracker_company_name'] as $index => $trackerCompanyName) {
                $adminTrackerDataRow = [
                    'tracker_company_name' => $trackerCompanyName,
                    't_poc_name' => $adminTrackerData['t_poc_name'][$index],
                    't_poc_web' => $adminTrackerData['t_poc_web'][$index],
                    't_poc_email' => $adminTrackerData['t_poc_email'][$index],
                    't_poc_cell' => $adminTrackerData['t_poc_cell'][$index],
                    't_poc_office' => $adminTrackerData['t_poc_office'][$index],
                    't_poc_floor' => $adminTrackerData['t_poc_floor'][$index],
                    't_poc_building' => $adminTrackerData['t_poc_building'][$index],
                    't_poc_block' => $adminTrackerData['t_poc_block'][$index],
                    't_poc_area' => $adminTrackerData['t_poc_area'][$index],
                    't_poc_city' => $adminTrackerData['t_poc_city'][$index],
                    't_poc_pin' => $adminTrackerData['t_poc_pin'][$index],
                    'tracker_note' => $adminTrackerData['tracker_note'][$index],
                ];

                $adminTrackerFields = [
                    't_poc_loc',
                    'tracker_attach'
                ];

                foreach ($adminTrackerFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $adminTrackerDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $adminTrackerDataArray[] = $adminTrackerDataRow;
            }

            $admin->trackers()->createMany($adminTrackerDataArray);

            //Repair and Maintainance

            $adminRepairData = $request->only([
                'serial_no',
                'r_desc',
                'r_amount',
                'r_pay_by',
                'r_date',
                'repair_company_name',
                'r_poc_name',
                'r_poc_web',
                'r_poc_email',
                'r_poc_cell',
                'r_poc_office',
                'r_poc_floor',
                'r_poc_building',
                'r_poc_block',
                'r_poc_area',
                'r_poc_city',
                'r_poc_pin',
                'warranty_note',
                'repair_note',
            ]);

            $adminRepairDataArray = [];
            foreach ($adminRepairData['serial_no'] as $index => $serialNo) {
                $adminRepairDataRow = [
                    'serial_no' => $serialNo,
                    'r_desc' => $adminRepairData['r_desc'][$index],
                    'r_amount' => $adminRepairData['r_amount'][$index],
                    'r_pay_by' => $adminRepairData['r_pay_by'][$index],
                    'r_date' => $adminRepairData['r_date'][$index],
                    'repair_company_name' => $adminRepairData['repair_company_name'][$index],
                    'r_poc_name' => $adminRepairData['r_poc_name'][$index],
                    'r_poc_web' => $adminRepairData['r_poc_web'][$index],
                    'r_poc_email' => $adminRepairData['r_poc_email'][$index],
                    'r_poc_cell' => $adminRepairData['r_poc_cell'][$index],
                    'r_poc_office' => $adminRepairData['r_poc_office'][$index],
                    'r_poc_floor' => $adminRepairData['r_poc_floor'][$index],
                    'r_poc_building' => $adminRepairData['r_poc_building'][$index],
                    'r_poc_block' => $adminRepairData['r_poc_block'][$index],
                    'r_poc_area' => $adminRepairData['r_poc_area'][$index],
                    'r_poc_city' => $adminRepairData['r_poc_city'][$index],
                    'r_poc_pin' => $adminRepairData['r_poc_pin'][$index],
                    'warranty_note' => $adminRepairData['warranty_note'][$index],
                    'repair_note' => $adminRepairData['repair_note'][$index],
                ];

                $adminRepairFields = [
                    'r_poc_loc',
                    'r_warranty'
                ];

                foreach ($adminRepairFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $adminRepairDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $adminRepairDataArray[] = $adminRepairDataRow;
            }

            $admin->repairs()->createMany($adminRepairDataArray);

            //Usage Movement

            $adminUsageData = $request->only([
                'usage_vehicle_no',
                'avg_per_liter',
                'date_of_m',
                'time_from',
                'time_to',
                'details_of_j',
                'purpose_of_j',
                'name_of_officer',
                'meter_reading_to',
                'meter_reading_from',
                'distance_covered',
                'signature',
                'p_o_l',
                'remarks',
            ]);

            $adminUsageDataArray = [];
            foreach ($adminUsageData['usage_vehicle_no'] as $index => $usageVehicleNo) {
                $adminUsageDataRow = [
                    'usage_vehicle_no' => $usageVehicleNo,
                    'avg_per_liter' => $adminUsageData['avg_per_liter'][$index],
                    'date_of_m' => $adminUsageData['date_of_m'][$index],
                    'time_from' => $adminUsageData['time_from'][$index],
                    'time_to' => $adminUsageData['time_to'][$index],
                    'details_of_j' => $adminUsageData['details_of_j'][$index],
                    'purpose_of_j' => $adminUsageData['purpose_of_j'][$index],
                    'name_of_officer' => $adminUsageData['name_of_officer'][$index],
                    'meter_reading_to' => $adminUsageData['meter_reading_to'][$index],
                    'meter_reading_from' => $adminUsageData['meter_reading_from'][$index],
                    'distance_covered' => $adminUsageData['distance_covered'][$index],
                    'signature' => $adminUsageData['signature'][$index],
                    'p_o_l' => $adminUsageData['p_o_l'][$index],
                    'remarks' => $adminUsageData['remarks'][$index],
                ];

                $adminUsageDataArray[] = $adminUsageDataRow;
            }

            $admin->usages()->createMany($adminUsageDataArray);

            //Notifications

            $adminNotificationData = $request->only([
                'notification_no',
                'notification_related',
                'notification_notes',
                'notification_to'
            ]);


            $adminNotificationDataArray = [];
            foreach ($adminNotificationData['notification_no'] as $index => $notificationNo) {
                $adminNotificationDataRow = [
                    'notification_no' => $notificationNo,
                    'notification_related' => $adminNotificationData['notification_related'][$index],
                    'notification_notes' => $adminNotificationData['notification_notes'][$index],
                    'notification_to' => $adminNotificationData['notification_to'][$index],
                ];

                $adminNotificationFields = [
                    'notification_attach'
                ];

                foreach ($adminNotificationFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $adminNotificationDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $adminNotificationDataArray[] = $adminNotificationDataRow;
            }

            $admin->notifications()->createMany($adminNotificationDataArray);

            DB::commit();
            $adminId = $admin->id;

            Log::info('Admin data successfully stored. Admin ID: ' . $adminId);
            if ($request->has('save_and_email')) {
                $url = route('viewadmin', ['id' => $adminId]);
                return redirect()->to($url)->with('success', 'Admin data successfully stored.');
            } elseif ($request->has('save_and_share')) {
                return redirect()->route('postadmin')->with('success', 'Admin data successfully stored.')->with('adminId', $adminId);
            } elseif ($request->has('save_and_new')) {
                return redirect()->route('postadmin')->with('success', 'Admin data successfully stored.');
            } else {
                return redirect()->route('admin')->with('success', 'Admin data successfully stored.');
            }
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('An error occurred while saving Admin data: ' . $e->getMessage());
            Log::error('Stack Trace: ' . $e->getTraceAsString());
            echo 'An error occurred: ' . $e->getMessage();
            return redirect()->back()->with('error', 'An error occurred while saving data.');
        }
    }

    public function editadmin(Request $request, $id)
    {

        $admins = Admin::find($id);
        $records = WeaponRecord::with('Wbranch')->get();

        // return $admins;
        $compaigns = Campaign::all();
        if (!$admins) {
            return false;
        }
        $analytics = SocialMediaAnalytics::firstOrCreate(['date' => now()->format('Y-m-d')]);
        $salesreports = Allreport::with('branch')
            ->where('cro_id', $id)
            ->where('report_name', 'sales_register_report')
            ->get();
        $quotationReports = Allreport::with('branch')
            ->where('cro_id', $id)
            ->where('report_name', 'quotation_register_report')
            ->get();
        $feedbackReports = Allreport::with('branch')
            ->where('cro_id', $id)
            ->where('report_name', 'feedback_register_report')
            ->get();
        $notices = Notice::all();
        // return $quotationReports;
        $taskdeiry= TaskRecordDairy::all();
        $wnationswide = Wnationwide::all();
        $contractDetail = ContractDetail::all();
         
        $totals = [
            'repeater' => $records->sum('repeater'),
            'body_guard' => $records->sum('body_guard'),
            'wooden_body' => $records->sum('wooden_body'),
            'g3_style' => $records->sum('g3_style'),
            'bore12_total_bullets' => $records->sum('bore12_total_bullets'),
            'bore12_total' => $records->sum('bore12_total'),
            'seven_shots' => $records->sum('seven_shots'),
            'fourteen_shots' => $records->sum('fourteen_shots'),
            'mp5' => $records->sum('mp5'),
            'kalakov' => $records->sum('kalakov'),
            'bore30_total_bullets' => $records->sum('bore30_total_bullets'),
            'bore30_total' => $records->sum('bore30_total'),
            'mp_5' => $records->sum('mp_5'),
            'zagana' => $records->sum('zagana'),
            'breta' => $records->sum('breta'),
            'glock' => $records->sum('glock'),
            'mm9_total_bullets' => $records->sum('mm9_total_bullets'),
            'mm9_total' => $records->sum('mm9_total'),
            'mm7_standard' => $records->sum('mm7_standard'),
            'mm7_total_bullets' => $records->sum('mm7_total_bullets'),
            'rifle_222' => $records->sum('rifle_222'),
            'rifle_222_bullets' => $records->sum('rifle_222_bullets'),
            'rifle_44' => $records->sum('rifle_44'),
            'rifle_44_bullets' => $records->sum('rifle_44_bullets'),
            'rifle_223' => $records->sum('rifle_223'),
            'rifle_223_bullets' => $records->sum('rifle_223_bullets'),
            'rifle_223_m4' => $records->sum('rifle_223_m4'),
            'rifle_223_m4_bullets' => $records->sum('rifle_223_m4_bullets'),
        ];
        $uniformbranches = UniformRecord::with('Ubranch')->get();
        return view('admin.editadmin', compact('admins', 'feedbackReports', 'compaigns', 'analytics', 'salesreports', 'quotationReports','wnationswide','taskdeiry', 'notices','records','contractDetail', 'totals','uniformbranches'));
    }

    public function autoSave(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:campaigns,id',
            'field' => 'required|in:customer_files,sedulous_files,training_files,guard_files,score_card',
            'value' => 'nullable|string',
        ]);

        $campaign = Campaign::find($request->id);
        $campaign->{$request->field} = $request->value;
        $campaign->save();

        return response()->json(['status' => 'success']);
    }

    // public function update_admin(Request $request, $id)
    // {
    //     DB::beginTransaction();

    //     try {
    //         $adminData = $request->except('_token');

    //         $adminImageFields = [
    //             'branch_photo',
    //         ];

    //         foreach ($adminImageFields as $field) {
    //             if ($request->hasFile($field)) {
    //                 $file = $request->file($field);
    //                 $extension = $file->getClientOriginalExtension();
    //                 $file_name = time() . '_' . $file->getClientOriginalName();
    //                 $file->move(public_path('uploads/images'), $file_name);
    //                 $adminData[$field] = 'uploads/images/' . $file_name;
    //             }
    //         }

    //         if ($request->has('office_activation')) {
    //             $adminData['office_activation'] = $request->input('office_activation');
    //         }

    //         $admin = Admin::findOrFail($id);
    //         $admin->update($adminData);

    //         // Dialy Branch Report
    //         $adminReportData = $request->input('reports');

    //         foreach ($adminReportData as $adminReportDatum) {
    //             $adminReportId = $adminReportDatum['r_id'];

    //             if (empty($adminReportId)) {
    //                 $admin->reports()->create($adminReportDatum);
    //             } else {
    //                 $adminReport = DialyBranchReport::find($adminReportId);
    //                 if ($adminReport) {
    //                     $adminReport->update($adminReportDatum);
    //                 }
    //             }
    //         }

    //         // Office Inventory
    //         $adminOfficeData = $request->input('inventories');

    //         foreach ($adminOfficeData as $adminOfficeData) {
    //             $adminOfficeId = $adminOfficeData['i_id'];

    //             $adminOfficeFields = ['attachments'];

    //             foreach ($adminOfficeFields as $field) {
    //                 if ($request->hasFile($field) && isset($adminOfficeFields[$field])) {
    //                     $file = $request->$field;
    //                     $extension = $file->getClientOriginalExtension();
    //                     $file_name = time() . '_' . $file->getClientOriginalName();
    //                     $file->move(public_path('uploads/images'), $file_name);
    //                     $adminOfficeData[$field] = 'uploads/images/' . $file_name;
    //                 }
    //             }

    //             if (empty($adminOfficeId)) {
    //                 $admin->inventories()->create($adminOfficeData);
    //             } else {
    //                 $adminOffice = OfficeInventory::find($adminOfficeId);
    //                 if ($adminOffice) {
    //                     $adminOffice->update($adminOfficeData);
    //                 }
    //             }
    //         }

    //         // Office Branding
    //         $adminBrandData = $request->input('brandings');

    //         foreach ($adminBrandData as $adminBrandData) {
    //             $adminBrandId = $adminBrandData['b_id'];

    //             $adminBrandFields = ['picture_of_b', 'v_photo_b' , 'v_attach'];

    //             foreach ($adminBrandFields as $field) {
    //                 if ($request->hasFile($field) && isset($adminBrandFields[$field])) {
    //                     $file = $request->$field;
    //                     $extension = $file->getClientOriginalExtension();
    //                     $file_name = time() . '_' . $file->getClientOriginalName();
    //                     $file->move(public_path('uploads/images'), $file_name);
    //                     $adminBrandData[$field] = 'uploads/images/' . $file_name;
    //                 }
    //             }

    //             if (empty($adminBrandId)) {
    //                 $admin->brandings()->create($adminBrandData);
    //             } else {
    //                 $adminBrand = OfficeBranding::find($adminBrandId);
    //                 if ($adminBrand) {
    //                     $adminBrand->update($adminBrandData);
    //                 }
    //             }
    //         }

    //         // Moveable Assets Vehicle ==>>
    //         $adminMoveData = $request->input('moveables');

    //         foreach ($adminMoveData as $adminMoveData) {
    //             $adminMoveId = $adminMoveData['m_id'];

    //             $adminMoveFields = ['vehicle_pic' , 'vehicle_book_pic'];

    //             foreach ($adminMoveFields as $field) {
    //                 if ($request->hasFile($field) && isset($adminMoveFields[$field])) {
    //                     $file = $request->$field;
    //                     $extension = $file->getClientOriginalExtension();
    //                     $file_name = time() . '_' . $file->getClientOriginalName();
    //                     $file->move(public_path('uploads/images'), $file_name);
    //                     $adminMoveData[$field] = 'uploads/images/' . $file_name;
    //                 }
    //             }

    //             if (empty($adminMoveId)) {
    //                 $admin->moveables()->create($adminMoveData);
    //             } else {
    //                 $adminMove = Moveable::find($adminMoveId);
    //                 if ($adminMove) {
    //                     $adminMove->update($adminMoveData);
    //                 }
    //             }
    //         }

    //         //Token Details ==>

    //         $adminTokenData = $request->input('tokens');

    //         foreach ($adminTokenData as $adminTokenData) {
    //             $adminTokenId = $adminTokenData['t_id'];

    //             $adminTokenFields = ['token_attach'];

    //             foreach ($adminTokenFields as $field) {
    //                 if ($request->hasFile($field) && isset($adminTokenFields[$field])) {
    //                     $file = $request->$field;
    //                     $extension = $file->getClientOriginalExtension();
    //                     $file_name = time() . '_' . $file->getClientOriginalName();
    //                     $file->move(public_path('uploads/images'), $file_name);
    //                     $adminTokenData[$field] = 'uploads/images/' . $file_name;
    //                 }
    //             }

    //             if (empty($adminTokenId)) {
    //                 $admin->tokens()->create($adminTokenData);
    //             } else {
    //                 $adminToken = Token::find($adminTokenId);
    //                 if ($adminToken) {
    //                     $adminToken->update($adminTokenData);
    //                 }
    //             }
    //         }

    //         //Insurance Details ==>

    //         $adminInsurranceData = $request->input('insurrances');

    //         foreach ($adminInsurranceData as $adminInsurranceData) {
    //             $adminInsurranceId = $adminInsurranceData['ins_id'];

    //             $adminInsurranceFields = ['ins_p_pic' , 'c_of_ins','ins_attach', 'i_poc_loc'];

    //             foreach ($adminInsurranceFields as $field) {
    //                 if ($request->hasFile($field) && isset($adminInsurranceFields[$field])) {
    //                     $file = $request->$field;
    //                     $extension = $file->getClientOriginalExtension();
    //                     $file_name = time() . '_' . $file->getClientOriginalName();
    //                     $file->move(public_path('uploads/images'), $file_name);
    //                     $adminInsurranceData[$field] = 'uploads/images/' . $file_name;
    //                 }
    //             }

    //             if (empty($adminInsurranceId)) {
    //                 $admin->insurrances()->create($adminInsurranceData);
    //             } else {
    //                 $adminInsurrance = InsurranceCompany::find($adminInsurranceId);
    //                 if ($adminInsurrance) {
    //                     $adminInsurrance->update($adminInsurranceData);
    //                 }
    //             }
    //         }

    //         //Tracker Details ==>

    //         $adminTrackerData = $request->input('trackers');

    //         foreach ($adminTrackerData as $adminTrackerData) {
    //             $adminTrackerId = $adminTrackerData['tr_id'];

    //             $adminTrackerFields = ['tracker_attach'];

    //             foreach ($adminTrackerFields as $field) {
    //                 if ($request->hasFile($field) && isset($adminTrackerFields[$field])) {
    //                     $file = $request->$field;
    //                     $extension = $file->getClientOriginalExtension();
    //                     $file_name = time() . '_' . $file->getClientOriginalName();
    //                     $file->move(public_path('uploads/images'), $file_name);
    //                     $adminTrackerData[$field] = 'uploads/images/' . $file_name;
    //                 }
    //             }

    //             if (empty($adminTrackerId)) {
    //                 $admin->trackers()->create($adminTrackerData);
    //             } else {
    //                 $adminTracker = TrackerCompany::find($adminTrackerId);
    //                 if ($adminTracker) {
    //                     $adminTracker->update($adminTrackerData);
    //                 }
    //             }
    //         }

    //         //Reapirs & Maintenance Details ==>

    //         $adminRepairData = $request->input('repairs');

    //         foreach ($adminRepairData as $adminRepairData) {
    //             $adminRepairId = $adminRepairData['r_id'];

    //             $adminRepairFields = ['r_poc_loc' , 'r_warranty'];

    //             foreach ($adminRepairFields as $field) {
    //                 if ($request->hasFile($field) && isset($adminRepairFields[$field])) {
    //                     $file = $request->$field;
    //                     $extension = $file->getClientOriginalExtension();
    //                     $file_name = time() . '_' . $file->getClientOriginalName();
    //                     $file->move(public_path('uploads/images'), $file_name);
    //                     $adminRepairData[$field] = 'uploads/images/' . $file_name;
    //                 }
    //             }

    //             if (empty($adminRepairId)) {
    //                 $admin->repairs()->create($adminRepairData);
    //             } else {
    //                 $adminRepair = Repair::find($adminRepairId);
    //                 if ($adminRepair) {
    //                     $adminRepair->update($adminRepairData);
    //                 }
    //             }
    //         }

    //         //Usages & Movements Details ==>

    //         $adminUsageData = $request->input('usages');

    //         foreach ($adminUsageData as $adminUsageDatum) {
    //             $adminUsageId = $adminUsageDatum['u_id'];

    //             if (empty($adminUsageId)) {
    //                 $admin->usages()->create($adminUsageDatum);
    //             } else {
    //                 $adminUsage = UsageMovement::find($adminUsageId);
    //                 if ($adminUsage) {
    //                     $adminUsage->update($adminUsageDatum);
    //                 }
    //             }
    //         }

    //         //Notifications Details ==>

    //         $adminNotificationData = $request->input('notifications');

    //         foreach ($adminNotificationData as $adminNotificationData) {
    //             $adminNotificationId = $adminNotificationData['n_id'];

    //             $adminNotificationFields = ['notification_attach'];

    //             foreach ($adminNotificationFields as $field) {
    //                 if ($request->hasFile($field) && isset($adminNotificationFields[$field])) {
    //                     $file = $request->$field;
    //                     $extension = $file->getClientOriginalExtension();
    //                     $file_name = time() . '_' . $file->getClientOriginalName();
    //                     $file->move(public_path('uploads/images'), $file_name);
    //                     $adminNotificationData[$field] = 'uploads/images/' . $file_name;
    //                 }
    //             }

    //             if (empty($adminNotificationId)) {
    //                 $admin->notifications()->create($adminNotificationData);
    //             } else {
    //                 $adminNotification = AdminNotification::find($adminNotificationId);
    //                 if ($adminNotification) {
    //                     $adminNotification->update($adminNotificationData);
    //                 }
    //             }
    //         }

    //         DB::commit();

    //         Log::info('Admin data successfully updated.');

    //         return redirect()->back()->with('success', 'Admin data successfully updated.');

    //     } catch (\Exception $e) {
    //         DB::rollback();

    //         Log::error('An error occurred while updating Admin data: ' . $e->getMessage());

    //         return redirect()->back()->with('error', 'An error occurred while updating data.');
    //     }
    // }

    public function update_admin(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $adminData = $request->except('_token');

            $adminImageFields = ['branch_photo'];

            foreach ($adminImageFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $adminData[$field] = 'uploads/images/' . $file_name;
                }
            }

            if ($request->has('office_activation')) {
                $adminData['office_activation'] = $request->input('office_activation');
            }

            $admin = Admin::findOrFail($id);
            $admin->update($adminData);

            // Dialy Branch Report
            Log::info('Incoming request data:', $request->all());

            $adminReportData = $request->input('reports');

            // Check if reports data is being received
            if (empty($adminReportData)) {
                Log::warning('No reports data received.');
            }

            foreach ($adminReportData as $adminReportDatum) {
                $adminReportId = $adminReportDatum['r_id'];

                // Log each report entry for debugging
                Log::info('Processing report entry:', $adminReportDatum);

                if (empty($adminReportId)) {
                    $admin->reports()->create($adminReportDatum);
                    Log::info('Created new report entry:', $adminReportDatum);
                } else {
                    $adminReport = DialyBranchReport::find($adminReportId);
                    if ($adminReport) {
                        $adminReport->update($adminReportDatum);
                        Log::info('Updated existing report entry:', $adminReportDatum);
                    } else {
                        Log::warning('Report entry not found for ID: ' . $adminReportId);
                    }
                }
            }

            // Office Inventory
            $adminOfficeData = $request->input('inventories', []); // Default to an empty array
            if (!is_array($adminOfficeData)) {
                $adminOfficeData = [];
            }

            foreach ($adminOfficeData as $index => $officeData) {
                $adminOfficeId = $officeData['i_id'];

                $adminOfficeFields = ['attachments'];

                foreach ($adminOfficeFields as $field) {
                    if ($request->hasFile("inventories.$index.$field")) {
                        $file = $request->file("inventories.$index.$field");
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $fileName);
                        $officeData[$field] = 'uploads/images/' . $fileName;
                    }
                }

                if (empty($adminOfficeId)) {
                    $admin->inventories()->create($officeData);
                } else {
                    $adminOffice = OfficeInventory::find($adminOfficeId);
                    if ($adminOffice) {
                        $adminOffice->update($officeData);
                    }
                }
            }

            // Office Branding
            $adminBrandData = $request->input('brandings', []); // Default to an empty array
            if (!is_array($adminBrandData)) {
                $adminBrandData = [];
            }

            foreach ($adminBrandData as $index => $brandData) {
                $adminBrandId = $brandData['b_id'];

                $adminBrandFields = ['picture_of_b', 'v_photo_b', 'v_attach'];

                foreach ($adminBrandFields as $field) {
                    if ($request->hasFile("brandings.$index.$field")) {
                        $file = $request->file("brandings.$index.$field");
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $fileName);
                        $brandData[$field] = 'uploads/images/' . $fileName;
                    }
                }

                if (empty($adminBrandId)) {
                    $admin->brandings()->create($brandData);
                } else {
                    $adminBrand = OfficeBranding::find($adminBrandId);
                    if ($adminBrand) {
                        $adminBrand->update($brandData);
                    }
                }
            }

            // Moveable Assets Vehicle
            $adminMoveData = $request->input('moveables', []); // Default to an empty array
            if (!is_array($adminMoveData)) {
                $adminMoveData = [];
            }

            foreach ($adminMoveData as $index => $moveData) {
                $adminMoveId = $moveData['m_id'];

                $adminMoveFields = ['vehicle_pic', 'vehicle_book_pic'];

                foreach ($adminMoveFields as $field) {
                    if ($request->hasFile("moveables.$index.$field")) {
                        $file = $request->file("moveables.$index.$field");
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $fileName);
                        $moveData[$field] = 'uploads/images/' . $fileName;
                    }
                }

                if (empty($adminMoveId)) {
                    $admin->moveables()->create($moveData);
                } else {
                    $adminMove = Moveable::find($adminMoveId);
                    if ($adminMove) {
                        $adminMove->update($moveData);
                    }
                }
            }

            // Token Details
            $adminTokenData = $request->input('tokens', []); // Default to an empty array
            if (!is_array($adminTokenData)) {
                $adminTokenData = [];
            }

            foreach ($adminTokenData as $index => $tokenData) {
                $adminTokenId = $tokenData['t_id'];

                $adminTokenFields = ['token_attach'];

                foreach ($adminTokenFields as $field) {
                    if ($request->hasFile("tokens.$index.$field")) {
                        $file = $request->file("tokens.$index.$field");
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $fileName);
                        $tokenData[$field] = 'uploads/images/' . $fileName;
                    }
                }

                if (empty($adminTokenId)) {
                    $admin->tokens()->create($tokenData);
                } else {
                    $adminToken = Token::find($adminTokenId);
                    if ($adminToken) {
                        $adminToken->update($tokenData);
                    }
                }
            }

            // Insurance Details
            $adminInsurranceData = $request->input('insurrances', []); // Default to an empty array
            if (!is_array($adminInsurranceData)) {
                $adminInsurranceData = [];
            }

            foreach ($adminInsurranceData as $index => $insurranceData) {
                $adminInsurranceId = $insurranceData['ins_id'];

                $adminInsurranceFields = ['ins_p_pic', 'c_of_ins', 'ins_attach', 'i_poc_loc'];

                foreach ($adminInsurranceFields as $field) {
                    if ($request->hasFile("insurrances.$index.$field")) {
                        $file = $request->file("insurrances.$index.$field");
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $fileName);
                        $insurranceData[$field] = 'uploads/images/' . $fileName;
                    }
                }

                if (empty($adminInsurranceId)) {
                    $admin->insurrances()->create($insurranceData);
                } else {
                    $adminInsurrance = InsurranceCompany::find($adminInsurranceId);
                    if ($adminInsurrance) {
                        $adminInsurrance->update($insurranceData);
                    }
                }
            }

            // Tracker Details
            $adminTrackerData = $request->input('trackers', []); // Default to an empty array
            if (!is_array($adminTrackerData)) {
                $adminTrackerData = [];
            }

            foreach ($adminTrackerData as $index => $trackerData) {
                $adminTrackerId = $trackerData['tr_id'];

                $adminTrackerFields = ['tracker_attach'];

                foreach ($adminTrackerFields as $field) {
                    if ($request->hasFile("trackers.$index.$field")) {
                        $file = $request->file("trackers.$index.$field");
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $fileName);
                        $trackerData[$field] = 'uploads/images/' . $fileName;
                    }
                }

                if (empty($adminTrackerId)) {
                    $admin->trackers()->create($trackerData);
                } else {
                    $adminTracker = TrackerCompany::find($adminTrackerId);
                    if ($adminTracker) {
                        $adminTracker->update($trackerData);
                    }
                }
            }

            // Repairs & Maintenance Details
            $adminRepairData = $request->input('repairs', []); // Default to an empty array
            if (!is_array($adminRepairData)) {
                $adminRepairData = [];
            }

            foreach ($adminRepairData as $index => $repairData) {
                $adminRepairId = $repairData['r_id'];

                $adminRepairFields = ['r_poc_loc', 'r_warranty'];

                foreach ($adminRepairFields as $field) {
                    if ($request->hasFile("repairs.$index.$field")) {
                        $file = $request->file("repairs.$index.$field");
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $fileName);
                        $repairData[$field] = 'uploads/images/' . $fileName;
                    }
                }

                if (empty($adminRepairId)) {
                    $admin->repairs()->create($repairData);
                } else {
                    $adminRepair = Repair::find($adminRepairId);
                    if ($adminRepair) {
                        $adminRepair->update($repairData);
                    }
                }
            }

            DB::commit();

            Log::info('Admin data successfully updated.');


            return redirect()->back()->with('success', 'Admin data successfully updated.');
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('An error occurred while updating Admin data: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while updating data.');
        }
    }



    public function viewAdmin($id)
    {
        $admin = Admin::with(['hrms', 'rentals', 'customers'])->findOrFail($id);

        $hrmRecords = Hrm::where('hired_at', $id)->get();

        $rentals = Rental::where('office_name', $id)->get();

        $customers = Customer::where('branch_name', $id)->get();

        return view('admin.viewadmin', compact('admin', 'hrmRecords', 'rentals', 'customers'));
    }
    public function crotask($id)
    {
        $admin = Admin::findOrFail($id);
        $groups = TaskGroup::with(['tasks.assignments' => function ($query) {
            $query->whereBetween('assigned_date', [
                now()->startOfMonth()->toDateString(),
                now()->endOfMonth()->toDateString()
            ]);
        }])->get();

        $daysInMonth = now()->daysInMonth;

        return view('crotask.index', compact('admin', 'groups', 'daysInMonth'));
    }
    public function storeTaskAssignments(Request $request, $adminId)
    {
        $admin = Admin::findOrFail($adminId);

        foreach ($request->input('tasks', []) as $taskId => $dates) {
            foreach ($dates as $date => $isChecked) {
                TaskAssignment::updateOrCreate(
                    [
                        'cro_task_id' => $taskId,
                        'assigned_date' => $date,
                        'branch_id' => $admin->branch_id, // saving admin's branch
                    ],
                    [
                        'is_assigned' => true,
                    ]
                );
            }
        }

        return redirect()->back()->with('success', 'Task assignments saved successfully.');
    }


    public function task_group()
    {
        $taskgroups = TaskGroup::all();
        return view('crotask.group', compact('taskgroups'));
    }

    public function posttask_group(Request $request)
    {
        $task = new TaskGroup();
        $task->title = $request->input('title');
        $task->section_number = $request->input('section_number');
        $task->save();
        return redirect()->back()->with('success', 'Tasks Group added successfully');
    }



        public function deletetask_group($id)
        {
            $task = TaskGroup::find($id);
            $task->delete();
            return redirect()->back()->with('success', 'Task Group deleted successfully');
        }

        public function update_taskgroup(Request $request, $id)
        {
            $task =TaskGroup::find($id);
            $task->title = $request->input('title');
            $task->save();
            return redirect()->back()->with('success', 'Tasks Group updated successfully');
        }



    public function all_cros_tasks()
    {
        $taskgroups = TaskGroup::all();
        $crotasks = CroTask::all();
        return view('crotask.tasks', compact('crotasks', 'taskgroups'));
    }
    public function postcro_tasks(Request $request)
    {
        $task = new CroTask();
        $task->task_group_id = $request->input('task_group_id');
        $task->task_number = $request->input('task_number');
        $task->task_description = $request->input('task_description');
        $task->save();
        return redirect()->back()->with('success', 'Cro Tasks added successfully');
    }


    public function update_crotask(Request $request, $id)
    {
        $task = CroTask::find($id);
        $task->task_description = $request->input('task_description');
        $task->save();
        return redirect()->back()->with('success', 'Cro Tasks updated successfully');
    }

    public function getNextTaskNumber($sectionNumber)
    {
        // Find all tasks for the selected section
        $tasks = CroTask::where('task_number', 'like', $sectionNumber . '.%')->pluck('task_number');

        // Extract sub-numbers, like 1.1 => 1, 1.2 => 2, etc.
        $maxSubNumber = 0;
        foreach ($tasks as $taskNumber) {
            $parts = explode('.', $taskNumber);
            if (isset($parts[1]) && is_numeric($parts[1])) {
                $subNumber = (int)$parts[1];
                if ($subNumber > $maxSubNumber) {
                    $maxSubNumber = $subNumber;
                }
            }
        }

        $nextSubNumber = $maxSubNumber + 1;
        $nextTaskNumber = $sectionNumber . '.' . $nextSubNumber;

        return response()->json(['nextTaskNumber' => $nextTaskNumber]);
    }


    public function deletecro_task($id)
    {
        $task = CroTask::find($id);
        $task->delete();
        return redirect()->back()->with('success', 'Task Group deleted successfully');
    }
    //Office Equipments Add
//  public function search_crotask(Request $request)
//     {
//         $monthInput = $request->input('month');
//         $dateRangeInput = $request->input('date_range');
        
//         if ($dateRangeInput) {
//             [$start, $end] = explode(' to ', $dateRangeInput);
//             $startDate = Carbon::parse($start);
//             $endDate = Carbon::parse($end);
//         } elseif ($monthInput) {
//             [$year, $month] = explode('-', $monthInput);
//             $startDate = Carbon::create($year, $month, 1);
//             $endDate = $startDate->copy()->endOfMonth();
//         } else {
//             // Default current month
//             $startDate = Carbon::now()->startOfMonth();
//             $endDate = Carbon::now()->endOfMonth();
//         }

//         $totalDays = $startDate->diffInDays($endDate) + 1;

//         // Fetch TaskGroups with assignments in the selected range
//         $groups = TaskGroup::whereHas('tasks.assignments', function($query) use ($startDate, $endDate) {
//             $query->whereBetween('assigned_date', [$startDate->toDateString(), $endDate->toDateString()]);
//         })
//         ->with(['tasks.assignments' => function ($query) use ($startDate, $endDate) {
//             $query->whereBetween('assigned_date', [$startDate->toDateString(), $endDate->toDateString()]);
//         }])
//         ->get();

//         // Debug
//         Log::info("Selected Date Range: {$startDate->toDateString()} to {$endDate->toDateString()}");
//         foreach ($groups as $group) {
//             foreach ($group->tasks as $task) {
//                 Log::info("Task: {$task->task_description}", ['assignments' => $task->assignments->toArray()]);
//             }
//         }

//         return view('crotask.search', compact('groups', 'startDate', 'totalDays', 'endDate'));
//     }
public function search_crotask(Request $request)
{
    $monthInput = $request->month;
    $dateRange = $request->date_range;
    $region = $request->region;
    $branch = $request->branch;

    // Date Logic
    if ($dateRange) {
        [$start, $end] = explode(' to ', $dateRange);
        $startDate = Carbon::parse($start);
        $endDate = Carbon::parse($end);
    } elseif ($monthInput) {
        [$year, $month] = explode('-', $monthInput);
        $startDate = Carbon::create($year, $month, 1);
        $endDate = $startDate->copy()->endOfMonth();
    } else {
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();
    }

    $totalDays = $startDate->diffInDays($endDate) + 1;

    // Base assignment query with date filter
    $assignmentQuery = TaskAssignment::query()
        ->whereBetween('assigned_date', [$startDate->toDateString(), $endDate->toDateString()]);

    // Branch filter
    if ($branch && $branch != 'all') {
        $assignmentQuery->where('branch_id', $branch);
    }

    // Region filter via Admin branch_city/branch_area
    if ($region && $region != 'all') {
        $assignmentQuery->whereHas('branch', function ($q) use ($region) {
            $q->where('branch_city', 'LIKE', "%{$region}%")
              ->orWhere('branch_area', 'LIKE', "%{$region}%");
        });
    }

    $groups = TaskGroup::with([
        'tasks.assignments' => function ($q) use ($startDate, $endDate, $branch, $region) {
            $q->whereBetween('assigned_date', [$startDate->toDateString(), $endDate->toDateString()]);
            
            if ($branch && $branch != 'all') {
                $q->where('branch_id', $branch);
            }
            if ($region && $region != 'all') {
                $q->whereHas('branch', function ($bq) use ($region) {
                    $bq->where('branch_city', 'LIKE', "%{$region}%")
                       ->orWhere('branch_area', 'LIKE', "%{$region}%");
                });
            }
        }
    ])
    ->with('tasks.assignments.branch')
    ->get();

    return view('crotask.search', compact(
        'groups', 'startDate', 'endDate', 'totalDays', 'region', 'branch'
    ));
}
    public function adminequipments()
    {
        $adminequipments = OfficeEquipment::all();
        return view('admin.adminequipments', compact('adminequipments'));
    }

    public function postadminequipment(Request $request)
    {
        $adminequipments = new OfficeEquipment;
        $adminequipments->adminequipment_name = $request->input('adminequipment_name');
        $adminequipments->save();
        return redirect()->back();
    }

    public function deleteadminequipment($id)
    {
        $adminequipments = OfficeEquipment::find($id);
        $adminequipments->delete();

        return redirect()->back()->with('success', 'Equipment deleted successfully');
    }

    //Reporting Branches

    public function reporting()
    {
        $reportings = BrancheportingTo::all();
        return view('admin.reporting', compact('reportings'));
    }


    public function postreporting(Request $request)
    {
        $reportings = new BrancheportingTo;
        $reportings->reporting_branch_name = $request->input('reporting_branch_name');
        $reportings->save();
        return redirect()->back();
    }

    public function deletereporting($id)
    {
        $reportings = BrancheportingTo::find($id);
        $reportings->delete();

        return redirect()->back()->with('success', 'Reporting Branch deleted successfully');
    }


    public function all_cros()
    {
        $cros = Cro::all();
        return view('admin.cro', compact('cros'));
    }

    public function postcro(Request $request)
    {
        $cro = new Cro();
        $cro->name = $request->input('name');
        $cro->phone = $request->input('phone');
        $cro->region = $request->input('region');
        $cro->save();
        return redirect()->back()->with('Cro Added Successfully');
    }

    public function delete_cro($id)
    {
        $cro = Cro::find($id);
        $cro->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }

    public function cro_reports($id)
    {
        $cro = Cro::find($id);
        $salesreports = Allreport::with('cro')
            ->where('cro_id', $id)
            ->where('report_name', 'sales_register_report')
            ->get();
        $quotationReports = Allreport::with('cro')
            ->where('cro_id', $id)
            ->where('report_name', 'quotation_register_report')
            ->get();
        $feedbackReports = Allreport::with('cro')
            ->where('cro_id', $id)
            ->where('report_name', 'feedback_register_report')
            ->get();
        return view('admin.cro.reports', compact('cro', 'salesreports', 'quotationReports', 'feedbackReports'));
    }

    public function cro_dispatches($id)
    {
        $cro = Cro::find($id);

        if (!$cro) {
            return back()->with('error', 'Cro not found');
        }
        $dispatches = InternalDispatch::with('cros')->where('cro_id', $id)->get();
        return view('admin.cro.dispatches', compact('dispatches', 'cro'));
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

                if (!empty($cc)) {
                    $message->cc($cc);
                }

                if (!empty($bcc)) {
                    $message->bcc($bcc);
                }

                $message->attach($pdf, ['as' => 'admin_information.pdf'])
                    ->text($body);
            });

            return response()->json(['message' => 'Email sent successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to send email.'], 500);
        }
    }

    public function deleteAdmin(Request $request, $id)
    {
        DB::table('admins')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }

    public function rental()
    {
        $rentals = Rental::all();
        //  return $rentals;
        $regions = Rental::whereNotNull('rp_no')->distinct()->pluck('rp_no');
        return view('admin.rental', compact('rentals', 'regions'));
    }

    public function rental_details_search(Request $request)
    {
        $query = Rental::query();

        if ($request->filled('region') && $request->region !== 'all') {
            $query->where('rp_no', $request->region);
        }
        $rentals = $query->get(); // paginate if data is big
        // Always pass regions for dropdown
        $regions = Rental::whereNotNull('rp_no')->distinct()->pluck('rp_no');
        // return  $regions;
        return view('admin.filter.rental_details_search', [
            'rentals' => $rentals,
            'regions' => $regions,
            'filters' => $request->all(),
        ]);
    }
    public function rental_property_record_search(Request $request)
    {
        $query = Rental::query();
        if ($request->filled('region') && $request->region !== 'all') {
            $query->where('rp_no', $request->region);
        }
        $rentals = $query->get(); // paginate if data is big
        //  return $rentals;
        return view('admin.filter.rental_property_record_search', [
            'rentals' => $rentals,
            'filters' => $request->all(),
        ]);
    }

    public function showrental($id)
    {
        // $rental = db::table('rentals')->where('id',$id)->get();
        //  return view('admin.view_rental_2',['rentals'=>$rental]);

        $rentals = Rental::find($id);
        return view('admin.view_rental', compact('rentals'));
    }

    public function postrental()
    {
        $offices = DB::table('admins')->get();
        return view('admin.postrental', ['offices' => $offices]);
    }

    public function store_rental(Request $request)
    {
        DB::beginTransaction();

        try {
            $rentalData = $request->except('_token');

            $rentalData['admin_id'] = $request->input('office_id');

            $rentalImageFields = [
                'pic',
                'care_attach',
                'care_cnic',
                'care_back',
                'plaza_cnic',
                'plaza_back',
                'plaza_attach',
                'inc_attach',
                'photo_b',
                'owner_front',
                'owner_back',
                'elec_attach',
                'gas_attach',
                'last_bill',
                'rental_pic',
            ];

            foreach ($rentalImageFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $rentalData[$field] = 'uploads/images/' . $file_name;
                }
            }

            $rental = Rental::create($rentalData);

            $rentalAmountData = $request->only([
                'rental_amount',
                'agreement_execution_date',
                'agreement_end_date',
            ]);

            $rentalAmountDataArray = [];
            foreach ($rentalAmountData['rental_amount'] as $index => $amount) {
                $rentalAmountDataRow = [
                    'rental_amount' => $amount,
                    'agreement_execution_date' => $rentalAmountData['agreement_execution_date'][$index],
                    'agreement_end_date' => $rentalAmountData['agreement_end_date'][$index],
                ];

                $rentalAmountAttachmentFields = ['agreement_attachment'];

                foreach ($rentalAmountAttachmentFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $rentalAmountDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $rentalAmountDataArray[] = $rentalAmountDataRow;
            }

            $rental->rentalAmounts()->createMany($rentalAmountDataArray);

            DB::commit();

            if ($request->has('save_and_new')) {
                return redirect()->route('rental')->with('success', 'Admin data successfully stored.');
            } else {
                return redirect()->route('rental')->with('success', 'Admin data successfully stored.');
            }

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }

    public function editrental($id)
    {
        $rentals = DB::table('rentals')->find($id);

        if (!$rentals) {
            return view('admin.rental');
        }

        return view('admin.editrental', compact('rentals'));
    }

    public function updaterental(Request $request, $id)
    {
        $rental = $request->except('_token');

        $imageFields = [
            'pic',
            'care_attach',
            'plaza_attach',
            'inc_attach',
            'photo_b',
            'owner_front',
            'owner_back',
            'elec_attach',
            'gas_attach',
            'last_bill',
        ];

        $images = array();

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $extension = $file->getClientOriginalExtension();
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/images'), $file_name); // Move the file to the public/uploads/images directory
                $images[$field] = 'uploads/images/' . $file_name; // Store the file path in the $images array
            }
        }

        $data = array_merge($rental, $images);

        $result = DB::table('rentals')->where('id', $id)->update($data);

        return redirect()->back();
    }

    public function deleteRental(Request $request, $id)
    {
        DB::table('rentals')->where('id', $id)->delete();
        return redirect()->back();
    }
}
