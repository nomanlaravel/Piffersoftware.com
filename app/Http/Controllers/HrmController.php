<?php
// HRM WhatsApp Integration Updated: 2026-04-10


namespace App\Http\Controllers;

use App\Imports\HrmsImport;
use App\Mail\RegisterGuardEmail;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Designation;
use App\Models\Disease;
use App\Models\Education;
use App\Models\Eobi;
use App\Models\Guarantor;
use App\Models\HiredAt;
use App\Models\Hrm;
use App\Models\hrmCategory;
use App\Models\InternalDispatch;
use App\Models\Item;
use App\Models\Observation;
use App\Models\Payroll;
use App\Models\ReminderNotification;
use App\Models\Social;
use App\Models\Training;
use App\Models\TrainingGuard;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Validator;
use App\Services\WhatsApp\WhatsAppNotificationManager;
use App\Services\WhatsApp\NeuapixWhatsAppService;

class HrmController extends Controller
{
    public function hrm_notifications($id)
    {
        $hrm = Hrm::findOrFail($id);

        $notifications = ReminderNotification::where('user_id', $hrm->id)
            ->where('entity_type', 'hrm')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('hrms.reminders.notifications', compact('hrm', 'notifications'));
    }

    public function payroll()
    {
        $payrolls = Payroll::with('hrm')->paginate(10);
        $hrm = Hrm::all();
        //   return $payrolls;
        return view('training.payroll', compact('payrolls', 'hrm'));
    }

    public function delete_payroll(Request $request, $id)
    {
        DB::table('payrolls')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }

    public function saveItems(Request $request)
    {
        Log::info('Full Request Data:', ['data' => $request->all()]);
        $item = new Item();
        $item->payroll_id = $request->payroll_id;
        $item->name = $request->name;
        $item->item_dis = $request->item_dis;
        $item->save();
        return back()->with('success', 'Items saved successfully.');
    }

    public function payrollsearch(Request $request)
    {
        // Retrieve HRM data to pass to the view
        $hrm = Hrm::all();

        // Start a query on the Payroll model, including the 'hrm' relationship
        $query = Payroll::with('hrm');

        // Filter by month and year if provided
        if ($request->has('month') && $request->has('year')) {
            $query->where(function ($q) use ($request) {
                $q
                    ->whereMonth('created_at', $request->month)
                    ->whereYear('created_at', $request->year)
                    ->orWhere(function ($q) use ($request) {
                        $q
                            ->whereMonth('updated_at', $request->month)
                            ->whereYear('updated_at', $request->year);
                    });
            });
        }

        // Filter by HRM name if provided
        if ($request->has('name') && !empty($request->name)) {
            $query->whereHas('hrm', function ($q) use ($request) {
                $q->where('name', $request->name);
            });
        }

        $payrolls = $query->paginate(10);

        // Return the view with the search results and HRM data
        return view('training.payroll', compact('payrolls', 'hrm'));
    }

    public function print_payroll($id)
    {
        $payroll = Payroll::with(['hrm', 'items'])->find($id);
        //   return  $payroll;
        if (!$payroll) {
            return response()->json(['error' => 'Payroll not found'], 404);
        }
        return view('training.payroll_print', compact('payroll'));
    }

    public function getcustomerGuards(Request $request, $id)
    {
        $user = Auth::user();
        $customerName = $user->customer_name;
        $role = $user->role;

        if ($customerName) {
            $hrmData = Hrm::with(['guarantors', 'trainings.guards'])
                ->where('client_name', $customerName)
                ->paginate(10);
        } else {
            $hrmData = Hrm::with(['guarantors', 'trainings.guards'])->paginate(10);
        }
        return view('Hrm.guards', compact('hrmData'));
    }

    public function hrm()
    {
        $userEmail = Auth::user()->email;
        $user = Auth::user();
        $customerName = $user->customer_name;

        if ($customerName) {
            $hrmData = Hrm::whereNull('sub_guard_id')
                ->with('guarantors')
                ->where('client_name', $customerName)
                ->get();
        } else {
            $hrmData = Hrm::with('guarantors')->get();
        }
        $regions = Hrm::whereNotNull('hrm_region')->distinct()->pluck('hrm_region');

        return view('Hrm.hrm', compact('hrmData', 'regions'));
    }

    public function staff_details_search(Request $request)
    {
        $query = Hrm::query();

        if ($request->filled('region')) {
            $query->where('hrm_region', $request->region);
        }
        $hrms = $query->get();  // paginate if data is big
        // Always pass regions for dropdown
        $regions = Hrm::whereNotNull('hrm_region')->distinct()->pluck('hrm_region');
        return view('Hrm.staff_details_search', [
            'hrms' => $hrms,
            'regions' => $regions,
            'filters' => $request->all(),
        ]);
    }

    public function search(Request $request)
    {
        $searchText = $request->get('search');
        Log::info('Search Text: ' . $searchText);

        $hrms = Hrm::where('name', 'LIKE', "%$searchText%")
            ->orWhere('fname', 'LIKE', "%$searchText%")
            ->orWhere('cnic', 'LIKE', "%$searchText%")
            ->orWhere('employee_no', 'LIKE', "%$searchText%")
            ->orWhere('bank', 'LIKE', "%$searchText%")
            ->orWhere('bank_account', 'LIKE', "%$searchText%")
            ->orWhere('cell', 'LIKE', "%$searchText%")
            ->orWhere('category', 'LIKE', "%$searchText%")
            ->orWhere('rank', 'LIKE', "%$searchText%")
            ->orWhere('designation', 'LIKE', "%$searchText%")
            ->orWhere('unit', 'LIKE', "%$searchText%")
            ->orWhere('hired_at', 'LIKE', "%$searchText%")
            ->orWhere('hrm_region', 'LIKE', "%$searchText%")
            ->orWhere('hrm_location', 'LIKE', "%$searchText%")
            ->orWhere('client_id', 'LIKE', "%$searchText%")
            ->orWhere('client_name', 'LIKE', "%$searchText%")
            ->orWhere('dob', 'LIKE', "%$searchText%")
            ->orWhere('religion', 'LIKE', "%$searchText%")
            ->orWhere('caste', 'LIKE', "%$searchText%")
            ->orWhere('gender', 'LIKE', "%$searchText%")
            ->orWhere('p_cell', 'LIKE', "%$searchText%")
            ->orWhere('e_cell', 'LIKE', "%$searchText%")
            ->orWhere('blood', 'LIKE', "%$searchText%")
            ->orWhere('email', 'LIKE', "%$searchText%")
            ->orWhere('m_status', 'LIKE', "%$searchText%")
            ->orWhere('no_of_kids', 'LIKE', "%$searchText%")
            ->orWhere('m_kids', 'LIKE', "%$searchText%")
            ->orWhere('f_kids', 'LIKE', "%$searchText%")
            ->orWhere('cnic_issue', 'LIKE', "%$searchText%")
            ->orWhere('cnic_expire', 'LIKE', "%$searchText%")
            ->orWhere('notes', 'LIKE', "%$searchText%")
            ->orWhere('t_address', 'LIKE', "%$searchText%")
            ->orWhere('t_area', 'LIKE', "%$searchText%")
            ->orWhere('t_city', 'LIKE', "%$searchText%")
            ->orWhere('t_police', 'LIKE', "%$searchText%")
            ->orWhere('t_district', 'LIKE', "%$searchText%")
            ->orWhere('t_post', 'LIKE', "%$searchText%")
            ->orWhere('t_tehsil', 'LIKE', "%$searchText%")
            ->orWhere('t_province', 'LIKE', "%$searchText%")
            ->orWhere('t_postal', 'LIKE', "%$searchText%")
            ->orWhere('t_residing', 'LIKE', "%$searchText%")
            ->orWhere('t_gps', 'LIKE', "%$searchText%")
            ->orWhere('h_age', 'LIKE', "%$searchText%")
            ->orWhere('weight', 'LIKE', "%$searchText%")
            ->orWhere('height', 'LIKE', "%$searchText%")
            ->orWhere('complection', 'LIKE', "%$searchText%")
            ->orWhere('medical_category', 'LIKE', "%$searchText%")
            ->orWhere('observ_type', 'LIKE', "%$searchText%")
            ->orWhere('insp_no', 'LIKE', "%$searchText%")
            ->orWhere('insp_name', 'LIKE', "%$searchText%")
            ->orWhere('insp_cell', 'LIKE', "%$searchText%")
            ->orWhere('insp_date', 'LIKE', "%$searchText%")
            ->get();
        Log::info('Search Results: ' . $hrms->count());

        if ($hrms->isEmpty()) {
            return response()->json(['html' => '<tr><td colspan="6">No results found</td></tr>']);
        }

        $rows = '';
        foreach ($hrms as $hrm) {
            $rows .= '<tr>';
            $rows .= '<td>' . htmlspecialchars($hrm->name) . '</td>';
            $rows .= '<td>' . htmlspecialchars($hrm->fname) . '</td>';
            $rows .= '<td>' . htmlspecialchars($hrm->category) . '</td>';
            $rows .= '<td>' . htmlspecialchars($hrm->designation) . '</td>';
            $rows .= '<td>' . htmlspecialchars($hrm->hired_at) . '</td>';
            $rows .= '<td style="display:flex; gap: 10px; align-items: center;">';
            $rows .= '<form action="' . route('viewhrm', ['id' => $hrm->id]) . '">';
            $rows .= csrf_field();
            $rows .= '<button type="submit" class="btn" style="border-radius:20%;"><i class="material-icons" style="color: rgb(92, 92, 255);">visibility</i></button>';
            $rows .= '</form>';
            if (Auth::user()->role != 'client') {
                $rows .= '<form action="' . route('edithrm', ['id' => $hrm->id]) . '">';
                $rows .= csrf_field();
                $rows .= '<button type="submit" class="btn" style="border-radius:20%;"><i class="material-icons" style="color: rgb(57, 221, 57);">edit</i></button>';
                $rows .= '</form>';
            }
            $rows .= '</td>';
            $rows .= '</tr>';
        }

        return response()->json(['html' => $rows]);
    }

    public function showhrm($id)
    {
        $hrms = Hrm::find($id);

        return view('Hrm.viewhrm', compact('hrms'));
    }

    public function showguarantors($id)
    {
        $hrm = Hrm::find($id);
        // return view('Hrm.viewguarantors', ['guarantor'=> $guarantor]);
        return view('Hrm.viewguarantors', compact('hrm'));
    }

    public function posthrm()
    {
        // return 2345;
        $branches = Admin::all();
        $categories = hrmCategory::all();
        $diseases = Disease::all();
        $eobis = Eobi::all();
        $socials = Social::all();
        $designations = Designation::all();
        $hiredats = HiredAt::all();
        $customers = Customer::all();
        $training = Training::whereNotNull('hrms_id')->get();
        $hrms = Hrm::all();
        $guards = Hrm::whereNull('sub_guard_id')->get();
        //  return $guards;
        $dispatches = InternalDispatch::all();
        //   return $dispatches;
        return view('Hrm.posthrm', compact('categories', 'diseases', 'eobis', 'socials', 'branches', 'designations', 'hiredats', 'customers', 'training', 'hrms', 'dispatches', 'guards'));
    }

    public function getNextSubGuard($id)
    {
        // Fetch the customer information based on the provided ID
        $hrm = Hrm::find($id);

        // Check if the hrm exists
        if (!$hrm) {
            return response()->json(['error' => 'guard not found'], 404);
        }

        // Return the hrm information in JSON format
        return response()->json($hrm);
    }

    public function sub_hrms($id)
    {
        $subGuards = Hrm::where('sub_guard_id', $id)->get();
        return view('Hrm.sub_guards', compact('subGuards'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new HrmsImport, $request->file('file'));

        return redirect()->back()->with('success', 'HRM data imported successfully!');
    }

    public function submit_hrm(Request $request)
    {
        // return $request->all();

        DB::beginTransaction();

        try {
            $hrmData = $request->except('_token');

            $hrmImageFields = [
                'photo',
                'cnic_front',
                'cnic_back',
                'f_attach',
                't_attach',
                'p_attach',
                'h_verify',
                'b_verify',
                'p_verify',
                'd_book',
                'v_verify',
                'copy_bill',
                'n_verify',
                'insurrance',
                'guard_bank',
                'bio_verify',
                'c_verify',
                'dpo_verify',
                'form_attach',
                'rec_attach',
                'eight_verify',
                'sahulat_v',
                'l_finger',
                'f_finger',
                'm_finger',
                'i_finger',
                't_finger',
                'additionals',
                'f_attachment',
                'vaccine_card',
                'medical_fit_card',
                'medical_fit_attach',
                'phy_attach',
                'vac_pr',
                'front_eobi',
                'back_eobi',
                'front_ss',
                'back_ss',
                'snc_pol',
                'next_frc',
                'next_legal',
                'next_photo',
                'next_claim',
                'next_copy',
                'next_attach',
                'ex_next_attach',
                's_front',
                's_back',
                's_attach',
                'insp_pic',
                'insp_attach',
                'ex_observ_attach',
                'appraisal_attach',
            ];

            foreach ($hrmImageFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $hrmData[$field] = 'uploads/images/' . $file_name;
                }
            }

            $hrmData['activation'] = $request->input('activation', 0);

            $hrm = Hrm::create($hrmData);

            $guarantorData = $request->only([
                'g_name',
                'g_fname',
                'g_relation',
                'g_tenure_rel',
                'pos_verify',
                'head_office_no',
                'head_floor_no',
                'head_building',
                'head_block',
                'head_area',
                'head_city',
            ]);

            $guarantorDataArray = [];
            foreach ($guarantorData['g_name'] as $index => $gName) {
                $guarantorDataRow = [
                    'g_name' => $gName,
                    'g_fname' => $guarantorData['g_fname'][$index],
                    'g_relation' => $guarantorData['g_relation'][$index],
                    'g_tenure_rel' => $guarantorData['g_tenure_rel'][$index],
                    'pos_verify' => $guarantorData['pos_verify'][$index],
                    'head_office_no' => $guarantorData['head_office_no'][$index],
                    'head_floor_no' => $guarantorData['head_floor_no'][$index],
                    'head_building' => $guarantorData['head_building'][$index],
                    'head_block' => $guarantorData['head_block'][$index],
                    'head_area' => $guarantorData['head_area'][$index],
                    'head_city' => $guarantorData['head_city'][$index],
                ];

                // Define the Guarantor image fields
                $guarantorImageFields = [
                    'g_cnic_f',
                    'g_cnic_b',
                    'head_attach',
                ];

                foreach ($guarantorImageFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $guarantorDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $guarantorDataArray[] = $guarantorDataRow;
            }

            $hrm->guarantors()->createMany($guarantorDataArray);

            $payrolldata = $request->only([
                'p_department',
                'p_salary_details',
                'p_attendance_records',
                'p_leave_records',
                'p_total_overtime_hours',
                'p_overtime_rate',
                'p_tax_deductions',
                'p_insurance_deductions',
                'p_performance_bonus',
                'p_year_end_bonus',
                'p_other_allowances',
                'p_gross_salary',
                'p_total_deductions',
                'p_net_salary',
                'p_other_deductions'
            ]);

            $payrollDataArray = [];

            foreach ($payrolldata['p_department'] as $index => $pdepartment) {
                $payrollRow = [
                    'p_department' => $pdepartment ?? null,
                    'p_salary_details' => $payrolldata['p_salary_details'][$index] ?? null,
                    'p_attendance_records' => $payrolldata['p_attendance_records'][$index] ?? null,
                    'p_leave_records' => $payrolldata['p_leave_records'][$index] ?? null,
                    'p_total_overtime_hours' => $payrolldata['p_total_overtime_hours'][$index] ?? null,
                    'p_overtime_rate' => $payrolldata['p_overtime_rate'][$index] ?? null,
                    'p_tax_deductions' => $payrolldata['p_tax_deductions'][$index] ?? null,
                    'p_insurance_deductions' => $payrolldata['p_insurance_deductions'][$index] ?? null,
                    'p_performance_bonus' => $payrolldata['p_performance_bonus'][$index] ?? null,
                    'p_year_end_bonus' => $payrolldata['p_year_end_bonus'][$index] ?? null,
                    'p_other_allowances' => $payrolldata['p_other_allowances'][$index] ?? null,
                    'p_gross_salary' => $payrolldata['p_gross_salary'][$index] ?? null,
                    'p_total_deductions' => $payrolldata['p_total_deductions'][$index] ?? null,
                    'p_net_salary' => $payrolldata['p_net_salary'][$index] ?? null,
                    'p_other_deductions' => $payrolldata['p_other_deductions'][$index] ?? null,
                ];

                // Define the Payroll file attachment fields
                $payrollFileFields = [
                    'p_employee_pay_slips',
                    'p_payroll_reports',
                ];

                foreach ($payrollFileFields as $field) {
                    if ($request->hasFile($field) && isset($request->file($field)[$index])) {
                        $file = $request->file($field)[$index];
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/payrolls'), $file_name);
                        $payrollRow[$field] = 'uploads/payrolls/' . $file_name;
                    }
                }

                $payrollDataArray[] = $payrollRow;
            }

            // Save payroll data
            $hrm->payrolls()->createMany($payrollDataArray);

            $trainingdata = $request->only([
                'general_trainer_name',
                'training_no',
                'training_s_date',
                'training_region',
                'name_of_range',
                'type_of_training',
                'training_notes',
            ]);
            $trainingdataArray = [];
            foreach ($trainingdata['general_trainer_name'] as $index => $tName) {
                $trainerDataRow = [
                    'general_trainer_name' => $tName,
                    'training_no' => $trainingdata['training_no'][$index],
                    'training_s_date' => $trainingdata['training_s_date'][$index],
                    'training_region' => $trainingdata['training_region'][$index],
                    'name_of_range' => $trainingdata['name_of_range'][$index],
                    'type_of_training' => $trainingdata['type_of_training'][$index],
                    'training_notes' => $trainingdata['training_notes'][$index],
                ];

                // Define the Guarantor image fields
                $trainerImageFields = [
                    'training_course_file',
                    'expenses_proof_attach',
                    'training_certificate',
                    'attachment_anyone',
                ];

                foreach ($trainerImageFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $trainerDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $trainingdataArray[] = $trainerDataRow;
            }

            $hrm->trainingssecontion()->createMany($trainingdataArray);

            $workExperienceData = $request->only([
                'org_name',
                'email_oc',
                'poc',
                'w_desig',
                'w_salary',
                'ser_tenure',
                'achivement',
                'join_date',
                'end_date',
                't_exp',
            ]);

            $workExperienceDataArray = [];
            foreach ($workExperienceData['org_name'] as $index => $orgName) {
                $workExperienceDataRow = [
                    'org_name' => $orgName,
                    'email_oc' => $workExperienceData['email_oc'][$index],
                    'poc' => $workExperienceData['poc'][$index],
                    'w_desig' => $workExperienceData['w_desig'][$index],
                    'w_salary' => $workExperienceData['w_salary'][$index],
                    'ser_tenure' => $workExperienceData['ser_tenure'][$index],
                    'achivement' => $workExperienceData['achivement'][$index],
                    'join_date' => $workExperienceData['join_date'][$index],
                    'end_date' => $workExperienceData['end_date'][$index],
                    't_exp' => $workExperienceData['t_exp'][$index],
                ];

                $workExperienceImageFields = [
                    'jec',
                    'jec_attach',
                    'ser_other',
                ];

                foreach ($workExperienceImageFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $workExperienceDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $workExperienceDataArray[] = $workExperienceDataRow;
            }

            $hrm->workExperiences()->createMany($workExperienceDataArray);

            $educationData = $request->only([
                'degree',
                'degree_date',
                'institute_name',
                'a_body',
                'ex_notes',
                'degree_no',
                'degree_level',
                'ob_marks',
                't_marks',
                'grade',
                'date_start',
                'date_end',
                'adress_inst',
            ]);

            $educationDataArray = [];
            foreach ($educationData['degree'] as $index => $degree) {
                $educationDataRow = [
                    'degree' => $degree,
                    'degree_date' => $educationData['degree_date'][$index],
                    'institute_name' => $educationData['institute_name'][$index],
                    'a_body' => $educationData['a_body'][$index],
                    'ex_notes' => $educationData['ex_notes'][$index],
                    'degree_no' => $educationData['degree_no'][$index],
                    'degree_level' => $educationData['degree_level'][$index],
                    'ob_marks' => $educationData['ob_marks'][$index],
                    't_marks' => $educationData['t_marks'][$index],
                    'grade' => $educationData['grade'][$index],
                    'date_start' => $educationData['date_start'][$index],
                    'date_end' => $educationData['date_end'][$index],
                    'adress_inst' => $educationData['adress_inst'][$index],
                ];

                if ($request->hasFile('degree_pic') && isset($request->degree_pic[$index])) {
                    $file = $request->degree_pic[$index];
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $educationDataRow['degree_pic'] = 'uploads/images/' . $file_name;
                }

                if ($request->hasFile('deg_attach') && isset($request->deg_attach[$index])) {
                    $file = $request->deg_attach[$index];
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $educationDataRow['deg_attach'] = 'uploads/images/' . $file_name;
                }

                $educationDataArray[] = $educationDataRow;
            }

            $hrm->education()->createMany($educationDataArray);

            DB::commit();

            $hrmId = $hrm->id;

            Log::info('HRM data successfully stored. hrm ID: ' . $hrmId);

            // dd($hrm->cell);

            // Send WhatsApp Welcome Message
            if ($hrm->cell) {
                app(WhatsAppNotificationManager::class)->sendHrmWelcome(
                    $hrm->cell,
                    $hrm->name,
                    $hrm->category ?? 'Team Member', // fallback to Team Member if role is not set
                    $hrm->email ?? $hrm->employee_no ?? 'N/A',
                    $hrm // Passing HRM model for tracking
                );
            }

            // ✅ Notify Customer if assigned
            $hrm->load('customer'); // Ensure customer is loaded

            if ($hrm->customer) {
                $customer = $hrm->customer;
                $customerPhone = $customer->poc_cell ?? $customer->phone;
                if ($customerPhone) {
                    app(WhatsAppNotificationManager::class)->sendHrmAssignmentToCustomer(
                        $customerPhone,
                        $customer->customers_name,
                        $hrm->name,
                        $hrm->category ?? $hrm->designation ?? 'Staff Member',
                        $hrm
                    );
                }
            }

            if (isset($hrm->email)) {
                Mail::to($hrm->email)->send(
                    new RegisterGuardEmail(
                        $hrm->name,  // guard's name
                        $hrm->category,  // position
                        $hrm->start_date ?? '',  // start date
                        route('login')  // login URL
                    )
                );
                $message = 'HRM record was saved successfully.';
            } else {
                $message = 'HRM record was saved successfully. Email not sent because hrm email is missing.';
            }

            if ($request->has('save_and_email')) {
                $url = route('viewhrm', ['id' => $hrmId]);
                return redirect()->to($url)->with('success', $message);
            } elseif ($request->has('save_and_share')) {
                return redirect()->route('posthrm')->with('success', $message)->with('hrmId', $hrmId);
            } elseif ($request->has('save_and_new')) {
                return redirect()->route('posthrm')->with('success', $message);
            } else {
                return redirect()->route('hrm')->with('success', $message);
            }
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('An error occurred while saving HRM data: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while saving data.');
        }
    }

    public function deleteHrm($id)
    {
        DB::beginTransaction();

        try {
            $hrm = Hrm::find($id);

            if (!$hrm) {
                return redirect()->back()->with('error', 'HRM record not found.');
            }

            $hrm->guarantors()->delete();
            $hrm->workExperiences()->delete();
            $hrm->education()->delete();
            
            // Send WhatsApp Notification before deleting the model completely (need cell number)
            if ($hrm->cell) {
                app(\App\Services\WhatsApp\WhatsAppNotificationManager::class)->send(
                    phone: $hrm->cell,
                    message: "Dear {$hrm->name},\n\nYour record has been successfully removed from the Piffers Security System. If you have any questions, please contact the admin team.",
                    eventType: 'delete',
                    user: null
                );
            }

            $hrm->delete();

            DB::commit();

            return redirect()->route('hrm.index')->with('success', 'HRM record deleted successfully.');
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('An error occurred while deleting HRM record: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while deleting the HRM record.');
        }
    }

    public function edithrm($id)
    {
        $hrms = Hrm::find($id);
        $train = Training::find($id);
        $guarantorCount = $hrms->guarantors->count();
        $training = $hrms->trainingssecontion;
        $payrolls = $hrms->payrolls;
        $customers = Customer::all();
        $dispatches = $hrms->dispatchsss;
        $guard = Hrm::with('trainingAssignment.training')->find($id);

        // Certificate API fetch
        $employee = Hrm::findOrFail($id);
        if ($employee->employee_no) {
            $params = ['userid' => $employee->employee_no];
        } elseif ($employee->employee_no) {
            $params = ['idnumber' => $employee->employee_no];
        } else {
            $params = [];
        }

        $response = Http::withoutVerifying()->get('https://guardstrainingmoodle.piffers.net/certapi.php', $params);

        // Convert JSON to array
        $certificates = $response->json();
        //  dd($response->body(), $certificates);
        //    return $certificates;
        // Pass certificates to Blade too
        return view('Hrm.edithrm', compact(
            'hrms',
            'guarantorCount',
            'training',
            'payrolls',
            'customers',
            'guard',
            'dispatches',
            'certificates'
        ));
    }

    //   public function update_hrm(Request $request, $id)
    // {
    //     DB::beginTransaction();

    //     try {
    //         $hrm = Hrm::findOrFail($id);
    //         $hrm->update($request->except('_token', '_method'));

    //         $hrmImageFields = [
    //             'photo', 'cnic_front', 'cnic_back', 'f_attach', 't_attach', 'p_attach',
    //             'h_verify', 'b_verify', 'p_verify', 'd_book', 'v_verify', 'copy_bill',
    //             'n_verify', 'insurrance', 'guard_bank', 'bio_verify', 'c_verify', 'dpo_verify',
    //             'form_attach', 'rec_attach', 'eight_verify', 'sahulat_v', 'l_finger',
    //             'f_finger', 'm_finger', 'i_finger', 't_finger', 'additionals',
    //             'f_attachment', 'vaccine_card',
    //             'medical_fit_card', 'medical_fit_attach', 'phy_attach', 'vac_pr',
    //             'front_eobi', 'back_eobi', 'front_ss',
    //             'back_ss', 'snc_pol', 'next_frc', 'next_legal',
    //             'next_photo', 'next_claim', 'next_copy', 'next_attach', 'ex_next_attach',
    //             's_front', 's_back', 's_attach', 'insp_pic', 'insp_attach', 'ex_observ_attach',
    //             'appraisal_attach',
    //         ];

    //         foreach ($hrmImageFields as $field) {
    //             if ($request->hasFile($field)) {
    //                 $file = $request->file($field);
    //                 $extension = $file->getClientOriginalExtension();
    //                 $file_name = time() . '_' . $file->getClientOriginalName();
    //                 $file->move(public_path('uploads/images'), $file_name);
    //                 $hrm->$field = 'uploads/images/' . $file_name;
    //             }
    //         }

    //         if ($request->has('activation')) {
    //             $hrm->activation = $request->input('activation');
    //         }

    //         $hrm->save();

    //         $guarantorsData = $request->input('guarantors');

    //         foreach ($guarantorsData as $guarantorData) {
    //             $guarantorId = $guarantorData['g_id'];

    //             $guarantorFields = [
    //                 'g_cnic_f', 'g_cnic_b', 'head_attach',
    //             ];

    //             foreach ($guarantorFields as $field) {
    //                 if ($request->hasFile($field) && isset($guarantorData[$field])) {
    //                     $file = $request->file($field);
    //                     $extension = $file->getClientOriginalExtension();
    //                     $file_name = time() . '_' . $file->getClientOriginalName();
    //                     $file->move(public_path('uploads/images'), $file_name);
    //                     $guarantorData[$field] = 'uploads/images/' . $file_name;
    //                 }
    //             }

    //             if (empty($guarantorId)) {
    //                 $hrm->guarantors()->create($guarantorData);
    //             } else {
    //                 $guarantor = Guarantor::find($guarantorId);
    //                 if ($guarantor) {
    //                     $guarantor->update($guarantorData);
    //                 }
    //             }
    //         }

    //         $workExperienceData = $request->input('workExperiences');

    //         foreach ($workExperienceData as $workExperience) {
    //             $workExperienceId = $workExperience['w_id'];

    //             $workExperienceFields = [
    //                 'jec', 'jec_attach', 'ser_other',
    //             ];

    //             foreach ($workExperienceFields as $field) {
    //                 if ($request->hasFile($field) && isset($workExperience[$field])) {
    //                     $file = $request->file($field);
    //                     $extension = $file->getClientOriginalExtension();
    //                     $file_name = time() . '_' . $file->getClientOriginalName();
    //                     $file->move(public_path('uploads/images'), $file_name);
    //                     $workExperience[$field] = 'uploads/images/' . $file_name;
    //                 }
    //             }

    //             if (empty($workExperienceId)) {
    //                 $hrm->workExperiences()->create($workExperience);
    //             } else {
    //                 $workExperienceModel = Work::find($workExperienceId);
    //                 if ($workExperienceModel) {
    //                     $workExperienceModel->update($workExperience);
    //                 }
    //             }
    //         }

    //         $educationData = $request->input('education');

    //         foreach ($educationData as $education) {
    //             $educationId = $education['d_id'];

    //             $educationFields = [
    //                 'degree_pic', 'degree_attach',
    //             ];

    //             foreach ($educationFields as $field) {
    //                 if ($request->hasFile($field) && isset($education[$field])) {
    //                     $file = $request->file($field);
    //                     $extension = $file->getClientOriginalExtension();
    //                     $file_name = time() . '_' . $file->getClientOriginalName();
    //                     $file->move(public_path('uploads/images'), $file_name);
    //                     $education[$field] = 'uploads/images/' . $file_name;
    //                 }
    //             }

    //             if (empty($educationId)) {
    //                 $hrm->education()->create($education);
    //             } else {
    //                 $educationModel = Education::find($educationId);
    //                 if ($educationModel) {
    //                     $educationModel->update($education);
    //                 }
    //             }
    //         }

    //         DB::commit();

    //         Log::info('HRM data successfully updated.');

    //         return redirect()->back()->with('success', 'HRM data successfully updated.');

    //     } catch (\Exception $e) {
    //         DB::rollback();

    //         Log::error('An error occurred while updating HRM data: ' . $e->getMessage());

    //         return redirect()->back()->with('error', 'An error occurred while updating data.');
    //     }
    // }

    public function update_hrm(Request $request, $id)
    {
        //  return $request->all();
        DB::beginTransaction();

        try {
            $hrm = Hrm::findOrFail($id);

            $hrm->update($request->except('_token', '_method'));

            $hrmImageFields = [
                'photo',
                'cnic_front',
                'cnic_back',
                'f_attach',
                't_attach',
                'p_attach',
                'h_verify',
                'b_verify',
                'p_verify',
                'd_book',
                'v_verify',
                'copy_bill',
                'n_verify',
                'insurrance',
                'guard_bank',
                'bio_verify',
                'c_verify',
                'dpo_verify',
                'form_attach',
                'rec_attach',
                'eight_verify',
                'sahulat_v',
                'l_finger',
                'f_finger',
                'm_finger',
                'i_finger',
                't_finger',
                'additionals',
                'f_attachment',
                'vaccine_card',
                'medical_fit_card',
                'medical_fit_attach',
                'phy_attach',
                'vac_pr',
                'front_eobi',
                'back_eobi',
                'front_ss',
                'back_ss',
                'snc_pol',
                'next_frc',
                'next_legal',
                'next_photo',
                'next_claim',
                'next_copy',
                'next_attach',
                'ex_next_attach',
                's_front',
                's_back',
                's_attach',
                'insp_pic',
                'insp_attach',
                'ex_observ_attach',
                'appraisal_attach',
            ];
            foreach ($hrmImageFields as $field) {
                if ($request->hasFile($field)) {
                    $files = $request->file($field);

                    if (!is_array($files)) {
                        $files = [$files];  // Convert single file to array
                    }

                    $filePaths = [];

                    foreach ($files as $file) {
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . uniqid() . '.' . $extension;

                        // Delete old files if they exist
                        if (!empty($hrm->$field)) {
                            $oldFiles = [];

                            if (is_string($hrm->$field)) {
                                $decoded = json_decode($hrm->$field, true);
                                $oldFiles = is_array($decoded) ? $decoded : [$hrm->$field];
                            } elseif (is_array($hrm->$field)) {
                                $oldFiles = $hrm->$field;
                            }

                            foreach ($oldFiles as $oldFile) {
                                if (file_exists(public_path($oldFile))) {
                                    unlink(public_path($oldFile));
                                }
                            }
                        }

                        $file->move(public_path('uploads/images'), $file_name);
                        $filePaths[] = 'uploads/images/' . $file_name;
                    }

                    // Save single or multiple files
                    $hrm->$field = count($filePaths) > 1 ? json_encode($filePaths) : $filePaths[0];
                }
            }

            //     foreach ($hrmImageFields as $field) {
            //     if ($request->hasFile($field)) {
            //         $files = $request->file($field);

            //         if (!is_array($files)) {
            //             $files = [$files]; // Convert single file to array for uniform handling
            //         }

            //         $filePaths = []; // Store all uploaded file paths

            //         foreach ($files as $file) {
            //             $extension = $file->getClientOriginalExtension();
            //             $file_name = time() . '_' . uniqid() . '.' . $extension;
            //             $file->move(public_path('uploads/images'), $file_name);
            //             $filePaths[] = 'uploads/images/' . $file_name;
            //         }

            //         // If multiple files, store as JSON; otherwise, store as a single string
            //         $hrm->$field = count($filePaths) > 1 ? json_encode($filePaths) : $filePaths[0];
            //     }
            // }

            if ($request->has('activation')) {
                $hrm->activation = $request->input('activation');
            }

            $hrm->save();

            $payrollsData = $request->input('payrolls', []);

            foreach ($payrollsData as $payrollData) {
                $payrollId = $payrollData['p_id'] ?? null;
                $payrollFileFields = [
                    'p_employee_pay_slips',
                    'p_payroll_reports',
                ];
                foreach ($payrollFileFields as $field) {
                    if ($request->hasFile($field) && isset($payrollData[$field])) {
                        $file = $request->file($field);
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/payrolls'), $file_name);
                        $payrollData[$field] = 'uploads/payrolls/' . $file_name;
                    }
                }
                if (empty($payrollId)) {
                    $hrm->payrolls()->create($payrollData);
                } else {
                    $payroll = payroll::find($payrollId);
                    if ($payroll) {
                        $payroll->update($payrollData);
                    }
                }
            }

            // Update Guarantors
            $guarantorsData = $request->input('guarantors', []);

            foreach ($guarantorsData as $guarantorData) {
                $guarantorId = $guarantorData['g_id'] ?? null;

                $guarantorFields = [
                    'g_cnic_f',
                    'g_cnic_b',
                    'head_attach',
                ];

                foreach ($guarantorFields as $field) {
                    if ($request->hasFile($field) && isset($guarantorData[$field])) {
                        $file = $request->file($field);
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $guarantorData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($guarantorId)) {
                    $hrm->guarantors()->create($guarantorData);
                } else {
                    $guarantor = Guarantor::find($guarantorId);
                    if ($guarantor) {
                        $guarantor->update($guarantorData);
                    }
                }
            }

            $trainingdata = $request->input('trainings', []);
            $trainerImageFields = ['training_course_file', 'expenses_proof_attach', 'training_certificate', 'attachment_anyone'];

            foreach ($trainingdata as $index => $training) {
                $trainingId = $training['training_id'] ?? null;

                foreach ($trainerImageFields as $field) {
                    if ($request->hasFile("trainings.$index.$field")) {
                        $file = $request->file("trainings.$index.$field");
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $training[$field] = 'uploads/images/' . $file_name;
                    } elseif ($trainingId) {
                        $existingTraining = $hrm->trainingssecontion()->find($trainingId);
                        if ($existingTraining) {
                            $training[$field] = $existingTraining->$field;
                        }
                    }
                }

                if ($trainingId) {
                    // Update existing training record
                    $trainingRecord = $hrm->trainingssecontion()->find($trainingId);
                    if ($trainingRecord) {
                        $trainingRecord->update($training);
                    }
                }
            }

            // Update Work Experiences
            $workExperienceData = $request->input('workExperiences', []);

            foreach ($workExperienceData as $workExperience) {
                $workExperienceId = $workExperience['w_id'] ?? null;

                $workExperienceFields = [
                    'jec',
                    'jec_attach',
                    'ser_other',
                ];

                foreach ($workExperienceFields as $field) {
                    if ($request->hasFile($field) && isset($workExperience[$field])) {
                        $file = $request->file($field);
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $workExperience[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($workExperienceId)) {
                    $hrm->workExperiences()->create($workExperience);
                } else {
                    $workExperienceModel = Work::find($workExperienceId);
                    if ($workExperienceModel) {
                        $workExperienceModel->update($workExperience);
                    }
                }
            }

            // Update Education
            $educationData = $request->input('education', []);

            foreach ($educationData as $education) {
                $educationId = $education['d_id'] ?? null;

                $educationFields = [
                    'degree_pic',
                    'degree_attach',
                ];

                foreach ($educationFields as $field) {
                    if ($request->hasFile($field) && isset($education[$field])) {
                        $file = $request->file($field);
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $education[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($educationId)) {
                    $hrm->education()->create($education);
                } else {
                    $educationModel = Education::find($educationId);
                    if ($educationModel) {
                        $educationModel->update($education);
                    }
                }
            }

            DB::commit();

            Log::info('HRM data successfully updated.');

            // ✅ Send WhatsApp Notification on Update
            $manager = app(WhatsAppNotificationManager::class);
            $manager->send(
                phone: $hrm->cell,
                message: 'Your HRM record has been successfully updated.',
                eventType: 'update',
                user: $hrm
            );

            // ✅ Notify Customer if assignment changed or newly set
            if ($hrm->wasChanged('client_id') && $hrm->client_id) {
                $hrm->load('customer');
                if ($hrm->customer) {
                    $customer = $hrm->customer;
                    $customerPhone = $customer->poc_cell ?? $customer->phone;
                    if ($customerPhone) {
                        $manager->sendHrmAssignmentToCustomer(
                            $customerPhone,
                            $customer->customers_name,
                            $hrm->name,
                            $hrm->category ?? $hrm->designation ?? 'Staff Member',
                            $hrm
                        );
                    }
                }
            }

            return redirect()->back()->with('success', 'HRM data successfully updated.');
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('An error occurred while updating HRM data: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while updating data.');
        }
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
                $message
                    ->to($email)
                    ->subject($subject);

                // Check if CC is provided
                if (!empty($cc)) {
                    $message->cc($cc);
                }

                // Check if BCC is provided
                if (!empty($bcc)) {
                    $message->bcc($bcc);
                }

                $message
                    ->attach($pdf, ['as' => 'hrm_information.pdf'])
                    ->text($body);
            });

            // Send WhatsApp Notification for PDF sharing
            $hrm = $request->has('hrm_id') ? \App\Models\Hrm::find($request->hrm_id) : null;
            $phone = $request->input('phone') ?? ($hrm ? $hrm->cell : null);

            if ($phone) {
                app(\App\Services\WhatsApp\WhatsAppNotificationManager::class)->send(
                    phone: $phone,
                    message: $body ?: "Please find the document attached to your email sent from Piffers Security System.",
                    eventType: 'share_pdf',
                    user: $hrm
                );
            }

            return response()->json(['message' => 'Email and WhatsApp sent successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to send email.'], 500);
        }
    }

    // Hrm Categories

    public function hrmcategory()
    {
        $categories = hrmCategory::all();
        return view('Hrm.hrmcategory', compact('categories'));
    }

    public function posthrmcategory(Request $request)
    {
        $categories = new hrmCategory;
        $categories->hrmcategory_name = $request->input('hrmcategory_name');
        $categories->save();
        return redirect()->back();
    }

    public function edit($id)
    {
        $category = HrmCategory::find($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = HrmCategory::find($id);
        $category->hrmcategory_name = $request->input('hrmcategory_name');
        $category->save();

        return redirect()->back()->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $category = HrmCategory::find($id);
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully');
    }

    // Hired At
    // Hrm Categories

    public function hiredat()
    {
        $hiredats = HiredAt::all();
        return view('Hrm.hiredat', compact('hiredats'));
    }

    public function posthiredat(Request $request)
    {
        $hiredats = new HiredAt;
        $hiredats->hiredat_name = $request->input('hiredat_name');
        $hiredats->save();
        return redirect()->back();
    }

    public function deletehiredat($id)
    {
        $hiredats = HiredAt::find($id);
        $hiredats->delete();

        return redirect()->back()->with('success', 'Hired At deleted successfully');
    }

    // Hrm Designations

    public function designation()
    {
        $designations = Designation::all();
        return view('Hrm.designation', compact('designations'));
    }

    public function postdesignation(Request $request)
    {
        $designations = new Designation;
        $designations->designation_name = $request->input('designation_name');
        $designations->save();
        return redirect()->back();
    }

    public function editdesignation($id)
    {
        $designation = Designation::find($id);
        return view('designation.edit', compact('designation'));
    }

    public function updatedesignation(Request $request, $id)
    {
        $designation = Designation::find($id);

        if (!$designation) {
            return redirect()->back()->with('error', 'Designation not found.');
        }

        $designation->designation_name = $request->input('designation_name');
        $designation->save();

        return redirect()->back()->with('success', 'Designation updated successfully');
    }

    public function destroydesignation($id)
    {
        $designations = Designation::find($id);

        if ($designations) {
            $designations->delete();
            return redirect()->back()->with('success', 'Designation deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Designation  not found.');
        }
    }

    // Hrm Diseases

    public function disease()
    {
        $diseases = Disease::all();
        return view('Hrm.disease', compact('diseases'));
    }

    public function postdisease(Request $request)
    {
        $disease = new Disease;
        $disease->hrm_disease = $request->input('hrm_disease');
        $disease->save();
        return redirect()->back();
    }

    public function editdisease($id)
    {
        $disease = Disease::find($id);
        return view('diseases.edit', compact('disease'));
    }

    public function updatedisease(Request $request, $id)
    {
        $disease = Disease::find($id);

        if (!$disease) {
            return redirect()->back()->with('error', 'Disease not found.');
        }

        $disease->hrm_disease = $request->input('hrm_disease');
        $disease->save();

        return redirect()->back()->with('success', 'Disease updated successfully');
    }

    public function destroydisease($id)
    {
        $disease = Disease::find($id);

        if ($disease) {
            $disease->delete();
            return redirect()->back()->with('success', 'Disease deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Disease not found.');
        }
    }

    // Hrm Old Age EOBI Cities
    public function eobi()
    {
        $eobiCities = Eobi::all();
        return view('Hrm.eobi', compact('eobiCities'));
    }

    public function posteobi(Request $request)
    {
        $eobis = new Eobi;
        $eobis->eobi_city = $request->input('eobi_city');
        $eobis->save();
        return redirect()->back();
    }

    public function editeobi($id)
    {
        $eobicity = Eobi::find($id);
        return view('eobicities.edit', compact('eobicity'));
    }

    public function updateeobi(Request $request, $id)
    {
        // Update the record
        $eobis = Eobi::find($id);
        if (!$eobis) {
            return redirect()->back()->with('error', 'EOBI City not found.');
        }

        $eobis->eobi_city = $request->input('eobi_city');
        $eobis->save();

        return redirect()->back()->with('success', 'City updated successfully');
    }

    public function destroyeobi($id)
    {
        // Delete the Fall In EOBI City by ID
        $eobicity = Eobi::find($id);
        $eobicity->delete();

        return redirect()->back()->with('success', 'Fall In EOBI City deleted successfully.');
    }

    // Hrm Old Age EOBI Cities (Social Security)
    public function social()
    {
        $socialCities = Social::all();
        return view('Hrm.social', compact('socialCities'));
    }

    public function postsocial(Request $request)
    {
        $socials = new Social;
        $socials->social_city = $request->input('social_city');
        $socials->save();
        return redirect()->back();
    }

    public function editsocial($id)
    {
        $socialCity = Social::find($id);
        return view('social.edit', compact('socialCity'));
    }

    public function updatesocial(Request $request, $id)
    {
        $socialCity = Social::find($id);

        if (!$socialCity) {
            return redirect()->back()->with('error', 'Social City not found.');
        }

        $socialCity->social_city = $request->input('social_city');
        $socialCity->save();

        return redirect()->back()->with('success', 'Social City updated successfully');
    }

    public function destroysocial($id)
    {
        $socialCity = Social::find($id);

        if ($socialCity) {
            $socialCity->delete();
            return redirect()->back()->with('success', 'Social City deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Social City not found.');
        }
    }

    public function addObservation()
    {
        $observations = Observation::all();
        return view('Hrm.observation', compact('observations'));
    }

    public function storeobservation(Request $request)
    {
        $observations = new Observation();
        $observations->o_name = $request->o_name;
        $observations->save();
        return redirect()->back()->with('success', 'Observation added successfully');
    }

    public function deleteeobservation($id)
    {
        $observations = Observation::find($id);
        $observations->delete();
        return redirect()->back()->with('success', 'Observation deleted successfully');
    }

    public function delete_hrm($id)
    {
        $delete = Hrm::find($id);
        
        if ($delete && $delete->cell) {
            app(\App\Services\WhatsApp\WhatsAppNotificationManager::class)->send(
                phone: $delete->cell,
                message: "Dear {$delete->name},\n\nYour record has been successfully removed from the Piffers Security System. If you have any questions, please contact the admin team.",
                eventType: 'delete',
                user: null
            );
        }

        $delete->delete();
        return redirect()->back()->with('success', ' Deleted successfully');
    }

    public function IsHrm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hrm_email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'data' => $validator->errors()->first()
            ], 403);
        }

        $hrm = HRM::where('email', $request->hrm_email)->first();

        return response()->json([
            'status' => true,
            'data' => $hrm
        ]);
    }
}
