<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf; 
 use Illuminate\Support\Facades\Validator;
use App\Models\mpoc;
use App\Models\Admin;
use App\Models\Duties;
use App\Models\Emerser;
use App\Models\Finance;
use App\Models\Sources;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Customer;
use App\Models\Checkedby;
use App\Models\Guardpost;
use App\Models\Activities;
use App\Models\Compliance;
use App\Models\Department;
use App\Models\Equipments;
use Endroid\QrCode\QrCode;
use App\Models\Notification;
use App\Models\SaobCategory;
use Illuminate\Http\Request;
use App\Models\CustomerAudits;
use App\Models\CustomerSalary;
use App\Imports\CustomersImport;
use App\Models\CustomerArmourer;
use App\Models\CustomerFeedback;
use App\Models\CustomerIncident;
use App\Models\CustomerManPower;
use App\Models\ComplaintTaggedTo;
use App\Models\CustomerAssigment;
use App\Models\CustomerBussiness;
use App\Models\CustomerComplaint;
use App\Models\CustomerEmergency;
use App\Models\CustomerSignatory;
use App\Mail\CustomerConfirmation;
use App\Models\CustomerActivities;
use App\Models\CustomerDepartment;
use App\Models\CustomerInspection;
use App\Models\NotificationShared;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\ComplaintAddressedBy;
use App\Models\CustomerNotification;
use App\Models\ReminderNotification;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Mail\DepartmentConfirmationMail;
use App\Services\WhatsApp\WhatsAppNotificationManager;

class CustomerController extends Controller
{
    public function search_customers(Request $request)
    {

        $query = Customer::query();

        if ($request->filled('date_of_entry')) {
            $query->whereDate('date_of_entry', $request->date_of_entry);
        }

        if ($request->filled('customers_name')) {
            $query->where('customers_name', 'like', '%' . $request->customers_name . '%');
        }

        if ($request->filled('customers_region')) {
            $query->where('customers_region', 'like', '%' . $request->customers_region . '%');
        }

        if ($request->filled('payment')) {
            $query->where('payment', $request->payment);
        }

        if ($request->filled('customers_id')) {
            $query->where('customers_id', $request->customers_id);
        }
        if ($request->filled('customers_activation_check')) {
            $query->where('customers_activation_check', $request->customers_activation_check);
        }

        $customers = $query->orderByRaw('CAST(customers_id AS DECIMAL(10,2)) ASC')->get();

        return view('searchresults.customers', [
            'customers' => $customers,
            'filters' => $request->all(),
        ]);
    }
    public function search_customers_id(Request $request)
    {
        $query = Customer::query();
        if ($request->filled('customers_id')) {
            $query->where('customers_id', $request->customers_id);
        }
        $customers = $query->get();
        return view('searchresults.customer_site_id', [
            'customers' => $customers,
            'filters' => [
                'date_of_entry' => $request->date_of_entry ?? now()->toDateString(), // <-- Ensure key exists
                'customers_id' => $request->customers_id,
            ],
        ]);
    }

    public function search_customers_yearly(Request $request)
    {
        $query = Customer::query();

        if ($request->filled('customers_id')) {
            $query->where('customers_id', $request->customers_id);
        }

        if ($request->filled('year')) {
            // You can filter with created_at or any date field if applicable
            $query->whereYear('created_at', $request->year);
        }

        $customers = $query->get();

        return view('searchresults.customer_site_monthly', [
            'customers' => $customers,
            'filters' => [
                'year' => $request->year ?? now()->year,
                'date_of_entry' => $request->date_of_entry ?? now()->toDateString(),
                'customers_id' => $request->customers_id,
            ],
        ]);
    }




    public function getCustomerData($id)
    {
        $customer = Customer::with(['hrms', 'customersignatories', 'customersalary', 'customermanpowers', 'customeremergencies', 'customerdepartments', 'customerinspections', 'customerarmourers', 'customerincidents', 'customerassigments', 'customeraudits', 'customerbussinesses', 'customeractivities', 'customerfeedbacks', 'customercomplaints', 'customernotifications'])->where('customers_activation_check', 1)->find($id);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Customer retrieved successfully',
            'data' => $customer
        ]);
    }

    public function getallCustomerData()
    {
        // Fetch only specific columns
        $customers = Customer::select('id', 'customers_id', 'customers_name')
            ->where('customers_activation_check', 1)
            ->get();

        if ($customers->isEmpty()) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Customer retrieved successfully',
            'data' => $customers
        ]);
    }

    public function customer()
    {
        $user = Auth::user();
        if ($user->role == 'customer') {
            $customers = Customer::where('customers_name', $user->customer_name)
                ->where('customers_id', 'NOT LIKE', '%.%')
                ->get();
        } else {
            $customers = Customer::where('customers_id', 'NOT LIKE', '%.%')->get();
        }
        return view('customers.customer', compact('customers'));
    }

    public function customer_notifications($id)
    {
        $customer = Customer::findOrFail($id);

        $notifications = ReminderNotification::where('user_id', $customer->id)->where('entity_type', 'customer')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('customers.reminders.notifications', compact('customer', 'notifications'));
    }

    public function markAsRead($id)
    {
        $notification = ReminderNotification::findOrFail($id);

        if (!$notification->is_read) {
            $notification->is_read = 1;
            $notification->save();
        }

        return redirect()->back()->with('success', 'Notification marked as read.');
    }


    public function search(Request $request)
    {
        $searchText = $request->get('search');
        $customers = Customer::where('customers_name', 'LIKE', "%$searchText%")
            ->orWhere('customers_id', 'LIKE', "%$searchText%")
            ->orWhere('customers_suffix', 'LIKE', "%$searchText%")
            ->orWhere('city_of_deployment', 'LIKE', "%$searchText%")
            ->orWhere('customers_region', 'LIKE', "%$searchText%")
            ->orWhere('branch_name', 'LIKE', "%$searchText%")
            ->orWhere('display_name_as', 'LIKE', "%$searchText%")
            ->orWhere('nature_of_business', 'LIKE', "%$searchText%")
            ->orWhere('website', 'LIKE', "%$searchText%")
            ->orWhere('phone', 'LIKE', "%$searchText%")
            ->orWhere('email', 'LIKE', "%$searchText%")
            ->orWhere('sub_customer', 'LIKE', "%$searchText%")
            ->orWhere('c_e_date', 'LIKE', "%$searchText%")
            ->orWhere('c_end_date', 'LIKE', "%$searchText%")
            ->orWhere('c_r_date', 'LIKE', "%$searchText%")
            ->orWhere('c_r_rem', 'LIKE', "%$searchText%")
            ->orWhere('insc_name', 'LIKE', "%$searchText%")
            ->orWhere('insc_date', 'LIKE', "%$searchText%")
            ->orWhere('per_guan', 'LIKE', "%$searchText%")
            ->orWhere('poc_name', 'LIKE', "%$searchText%")
            ->orWhere('poc_desig', 'LIKE', "%$searchText%")
            ->orWhere('poc_cell', 'LIKE', "%$searchText%")
            ->orWhere('poc_bill_c', 'LIKE', "%$searchText%")
            ->orWhere('poc_bill_d', 'LIKE', "%$searchText%")
            ->orWhere('poc_bill_l', 'LIKE', "%$searchText%")
            ->orWhere('poc_office', 'LIKE', "%$searchText%")
            ->orWhere('poc_floor', 'LIKE', "%$searchText%")
            ->orWhere('poc_building', 'LIKE', "%$searchText%")
            ->orWhere('poc_block', 'LIKE', "%$searchText%")
            ->orWhere('poc_area', 'LIKE', "%$searchText%")
            ->orWhere('poc_city', 'LIKE', "%$searchText%")
            ->orWhere('cf_name', 'LIKE', "%$searchText%")
            ->orWhere('cf_desig', 'LIKE', "%$searchText%")
            ->orWhere('cf_no', 'LIKE', "%$searchText%")
            ->orWhere('cf_email', 'LIKE', "%$searchText%")
            ->orWhere('cf_office', 'LIKE', "%$searchText%")
            ->orWhere('cf_building', 'LIKE', "%$searchText%")
            ->orWhere('pat_name', 'LIKE', "%$searchText%")
            ->orWhere('pat_model', 'LIKE', "%$searchText%")
            ->orWhere('pat_make', 'LIKE', "%$searchText%")
            ->orWhere('pat_reg', 'LIKE', "%$searchText%")
            ->orWhere('pat_quan', 'LIKE', "%$searchText%")
            ->orWhere('pat_price', 'LIKE', "%$searchText%")
            ->orWhere('pat_val', 'LIKE', "%$searchText%")
            ->orWhere('meeting_date', 'LIKE', "%$searchText%")
            ->orWhere('meeting_chaired', 'LIKE', "%$searchText%")
            ->orWhere('meeting_minutes', 'LIKE', "%$searchText%")
            ->orWhere('scr_cus_name', 'LIKE', "%$searchText%")
            ->orWhere('scr_cus_region', 'LIKE', "%$searchText%")
            ->orWhere('scr_cus_id', 'LIKE', "%$searchText%")
            ->orWhere('scr_cus_site_id', 'LIKE', "%$searchText%")
            ->orWhere('scr_cus_date', 'LIKE', "%$searchText%")
            ->orWhere('cus_poc_name', 'LIKE', "%$searchText%")
            ->orWhere('cus_poc_cell', 'LIKE', "%$searchText%")
            ->orWhere('cro_name', 'LIKE', "%$searchText%")
            ->orWhere('cro_cell', 'LIKE', "%$searchText%")
            ->orWhere('gm_name', 'LIKE', "%$searchText%")
            ->orWhere('gm_cell', 'LIKE', "%$searchText%")
            ->get();

        if ($customers->isEmpty()) {
            return response()->json(['html' => '<tr><td colspan="6">No results found</td></tr>']);
        }

        $rows = '';

        foreach ($customers as $customer) {
            $rows .= '<tr>';
            $rows .= '<td>' . htmlspecialchars($customer->customers_id) . '</td>';
            $rows .= '<td>' . htmlspecialchars($customer->customers_name) . '</td>';
            $rows .= '<td>' . htmlspecialchars($customer->phone) . '</td>';
            $rows .= '<td>' . htmlspecialchars($customer->customers_region) . '</td>';
            $rows .= '<td>';
            if ($customer->qrcode_path) {
                $rows .= '<div class="text-center">';
                $rows .= '<a href="' . asset($customer->qrcode_path) . '" target="_blank">';
                $rows .= '<img src="' . asset($customer->qrcode_path) . '" alt="QR Code" width="50" style="border: 1px solid #ddd; padding: 2px;">';
                $rows .= '</a><br>';
                $rows .= '<a href="' . asset($customer->qrcode_path) . '" download class="btn btn-sm btn-outline-info mt-1" title="Download QR Code">';
                $rows .= '<i class="fa-solid fa-download"></i> Download';
                $rows .= '</a></div>';
            } else {
                $rows .= '<span class="text-muted">No QR Code</span>';
            }
            $rows .= '</td>';
            $rows .= '<td>';
            $rows .= '<a href="' . route('viewcustomer', ['id' => $customer->id]) . '">';
            $rows .= '<i class="material-icons" style="color: rgb(92, 92, 255);">visibility</i>';
            $rows .= '</a>';

            if (Auth::user()->role != 'customer' && Auth::user()->role != 'client') {
                $rows .= '<a href="' . route('editcustomer', ['id' => $customer->id]) . '" class="ml-2">';
                $rows .= '<i class="material-icons" style="color: rgb(57, 221, 57);">edit</i>';
                $rows .= '</a>';
            }
            $rows .= '<a class="btn" href="' . route('sub_customer', ['id' => $customer->id]) . '">';
            $rows .= '  <img src="https://img.icons8.com/?size=80&id=114064&format=png" width="20px" height="20px">';
            $rows .= '</a>';
            $rows .= '<a class="btn" href="' . route('getcustomer.guards', ['id' => $customer->id]) . '">';
            $rows .= '  <img src="https://img.icons8.com/?size=50&id=BH1dwMAiBfeP&format=png" width="20px" height="20px">';
            $rows .= '</a>';
            $rows .= '</td>';
            $rows .= '</tr>';
        }
        return response()->json(['html' => $rows]);
    }


    public function postcustomer()
    {
        $activities = Activities::all();
        $branches = Admin::all();
        $currencies = Currency::all();
        $compliances = Compliance::all();
        $departments = Department::all();
        $duties = Duties::all();
        $categories = Category::all();
        $saobcategories = SaobCategory::all();
        $emerser = Emerser::all();
        $checkedby = Checkedby::all();
        $mpoc = mpoc::all();
        $guardposts = Guardpost::all();
        $customers = Customer::all();
        $finances = Finance::all();
        $equipments = Equipments::all();
        $sources = Sources::all();
        $complaintsto = ComplaintTaggedTo::all();
        $complaintsby = ComplaintAddressedBy::all();
        $notifications = Notification::all();
        $notificationshared = NotificationShared::all();

        return view('customers.postcustomer', compact('activities', 'branches', 'currencies', 'equipments', 'compliances', 'departments', 'duties', 'categories', 'saobcategories', 'emerser', 'checkedby', 'mpoc', 'guardposts', 'customers', 'finances', 'sources', 'complaintsto', 'complaintsby', 'notifications', 'notificationshared'));
    }

    public function import(Request $request)
    {
        set_time_limit(300);

        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        Excel::import(new CustomersImport, $request->file('file'));

        return redirect()->back()->with('success', 'Customers imported successfully.');
    }


    public function submit_customer(Request $request)
    {
        DB::beginTransaction();

        try {
            $customerData = $request->except('_token');

            $customerData['admin_id'] = $request->input('branch_name');

            $checkboxFields = [
                'approved_com',
                'quick_box',
                'eobi',
                'social_security',
                'grp_life_ins',
                'approv_q_s',
                'approv_q_c',
                'approv_q_cfo',
                'sales_dept',
                'cmd',
                'ops_dept',
                'finance_dept',
                'directors',
                'signed_ser',
                'com_ins',
                'testimonials',
                'sales_inc',
                'fbr',
                'pra',
                'kpra',
                'srb',
                'bra',
                'ajk',
                'gb'
            ];

            foreach ($checkboxFields as $field) {
                $customerData[$field] = $request->has($field) ? true : false;
            }

            $customerImageFields = [
                'approved_attach',
                'quickbooks_attach',
                'sum_apr',
                'apr_kpi',
                'approv_q_s_attach',
                'approv_q_c_attach',
                'approv_q_cfo_attach',
                'signed_ser_attach',
                'com_ins_attach',
                'testimonials_attach',
                'sales_inc_attach',
                'perfom_attach',
                'ntn_fbr',
                'poc_photo',
                'poc_attach',
                'cf_photo',
                'cf_attach',
                'currency_attach',
                'meeting_attach',
                'meeting_freq_attach',
                'meeting_alert_attach',
                'pat_super_photo',
            ];

            foreach ($customerImageFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $customerData[$field] = 'uploads/images/' . $file_name;
                }
            }

            $customerVideoFields = [
                'pat_super_video',
            ];

            foreach ($customerVideoFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/videos'), $file_name);
                    $customerData[$field] = 'uploads/videos/' . $file_name;
                }
            }

            $customerData['provinces'] = json_encode($request->input('provinces', []));

            $customer = Customer::create($customerData);

            // Signatory Details
            $customerSignatureData = $request->only([
                'sign_name',
                'sign_desig',
                'sign_cell',
                'sign_email',
            ]);

            $customerSignatureDataArray = [];
            if (isset($customerSignatureData['sign_name']) && is_array($customerSignatureData['sign_name'])) {
                foreach ($customerSignatureData['sign_name'] as $index => $signName) {
                    $customerSignatureDataRow = [
                        'sign_name' => $signName,
                        'sign_desig' => $customerSignatureData['sign_desig'][$index] ?? null,
                        'sign_cell' => $customerSignatureData['sign_cell'][$index] ?? null,
                        'sign_email' => $customerSignatureData['sign_email'][$index] ?? null,
                    ];

                    $customerSignatureDataArray[] = $customerSignatureDataRow;
                }
            }

            $customer->customersignatories()->createMany($customerSignatureDataArray);

            // Salary And Benefits
            $customerSalaryAndBenefitsData = $request->only([
                'cat_name',
                'sal_cat',
                'sal_days',
                'leaves_a',
                'other_ben',
                'sal_note',
            ]);

            $customerSalaryAndBenefitsDataArray = [];
            if (isset($customerSalaryAndBenefitsData['cat_name']) && is_array($customerSalaryAndBenefitsData['cat_name'])) {
                foreach ($customerSalaryAndBenefitsData['cat_name'] as $index => $catName) {
                    $customerSalaryAndBenefitsDataRow = [
                        'cat_name' => $catName,
                        'sal_cat' => $customerSalaryAndBenefitsData['sal_cat'][$index] ?? null,
                        'sal_days' => $customerSalaryAndBenefitsData['sal_days'][$index] ?? null,
                        'leaves_a' => $customerSalaryAndBenefitsData['leaves_a'][$index] ?? null,
                        'other_ben' => $customerSalaryAndBenefitsData['other_ben'][$index] ?? null,
                        'sal_note' => $customerSalaryAndBenefitsData['sal_note'][$index] ?? null,
                    ];

                    $customerSalaryAndBenefitsFields = [
                        'sal_attach',
                    ];

                    foreach ($customerSalaryAndBenefitsFields as $field) {
                        if ($request->hasFile($field) && isset($request->$field[$index])) {
                            $file = $request->$field[$index];
                            $extension = $file->getClientOriginalExtension();
                            $file_name = time() . '_' . $file->getClientOriginalName();
                            $file->move(public_path('uploads/images'), $file_name);
                            $customerSalaryAndBenefitsDataRow[$field] = 'uploads/images/' . $file_name;
                        }
                    }

                    $customerSalaryAndBenefitsDataArray[] = $customerSalaryAndBenefitsDataRow;
                }
            }

            $customer->customersalary()->createMany($customerSalaryAndBenefitsDataArray);

            // Man Power Module
            $customerManpowerData = $request->only([
                'man_post',
                'man_cat',
                'man_uni',
                'man_uni_no',
                'man_weapon',
                'man_ammu',
                'man_equip',
                's_start_date',
                's_end_date',
                's_start_time',
                's_end_time',
                'man_start_date',
                'man_end_date',
                'man_start_time',
                'man_end_time',
                'man_quan',
                'man_hours',
                'man_any_sp',
                'man_apr_l',
                'man_salary',
            ]);

            $customerManpowerDataArray = [];
            if (isset($customerManpowerData['man_post']) && is_array($customerManpowerData['man_post'])) {
                foreach ($customerManpowerData['man_post'] as $index => $manPost) {
                    $customerManpowerDataRow = [
                        'man_post' => $manPost,
                        'man_cat' => $customerManpowerData['man_cat'][$index] ?? null,
                        'man_uni' => $customerManpowerData['man_uni'][$index] ?? null,
                        'man_uni_no' => $customerManpowerData['man_uni_no'][$index] ?? null,
                        'man_weapon' => $customerManpowerData['man_weapon'][$index] ?? null,
                        'man_ammu' => $customerManpowerData['man_ammu'][$index] ?? null,
                        'man_equip' => $customerManpowerData['man_equip'][$index] ?? null,
                        's_start_date' => $customerManpowerData['s_start_date'][$index] ?? null,
                        's_end_date' => $customerManpowerData['s_end_date'][$index] ?? null,
                        's_start_time' => $customerManpowerData['s_start_time'][$index] ?? null,
                        's_end_time' => $customerManpowerData['s_end_time'][$index] ?? null,
                        'man_start_date' => $customerManpowerData['man_start_date'][$index] ?? null,
                        'man_end_date' => $customerManpowerData['man_end_date'][$index] ?? null,
                        'man_start_time' => $customerManpowerData['man_start_time'][$index] ?? null,
                        'man_end_time' => $customerManpowerData['man_end_time'][$index] ?? null,
                        'man_quan' => $customerManpowerData['man_quan'][$index] ?? null,
                        'man_hours' => $customerManpowerData['man_hours'][$index] ?? null,
                        'man_any_sp' => $customerManpowerData['man_any_sp'][$index] ?? null,
                        'man_apr_l' => $customerManpowerData['man_apr_l'][$index] ?? null,
                        'man_salary' => $customerManpowerData['man_salary'][$index] ?? null,
                    ];

                    $customerManpowerFields = [
                        'man_equip_attach',
                        'man_jd_attach',
                    ];

                    foreach ($customerManpowerFields as $field) {
                        if ($request->hasFile($field) && isset($request->$field[$index])) {
                            $file = $request->$field[$index];
                            $extension = $file->getClientOriginalExtension();
                            $file_name = time() . '_' . $file->getClientOriginalName();
                            $file->move(public_path('uploads/images'), $file_name);
                            $customerManpowerDataRow[$field] = 'uploads/images/' . $file_name;
                        }
                    }

                    $customerManpowerDataArray[] = $customerManpowerDataRow;
                }
            }

            $customer->customermanpowers()->createMany($customerManpowerDataArray);

            // Emergency Module
            $customerEmergencyData = $request->only([
                'emer_ser',
                'emer_poc_name',
                'emer_poc_desig',
                'emer_poc_cell',
                'emer_poc_email',
                'emer_poc_notes',
                'emer_office',
                'emer_floor',
                'emer_building',
                'emer_block',
                'emer_area',
                'emer_city',
                'emer_email',
                'emer_web',
                'emer_pin',
                'longitude2',
                'latitude2',
                'emer_app_rental',
                'emer_note',
            ]);

            $customerEmergencyDataArray = [];
            if (isset($customerEmergencyData['emer_ser']) && is_array($customerEmergencyData['emer_ser'])) {
                foreach ($customerEmergencyData['emer_ser'] as $index => $emerSer) {
                    $customerEmergencyDataRow = [
                        'emer_ser' => $emerSer,
                        'emer_poc_name' => $customerEmergencyData['emer_poc_name'][$index] ?? null,
                        'emer_poc_desig' => $customerEmergencyData['emer_poc_desig'][$index] ?? null,
                        'emer_poc_cell' => $customerEmergencyData['emer_poc_cell'][$index] ?? null,
                        'emer_poc_email' => $customerEmergencyData['emer_poc_email'][$index] ?? null,
                        'emer_poc_notes' => $customerEmergencyData['emer_poc_notes'][$index] ?? null,
                        'emer_office' => $customerEmergencyData['emer_office'][$index] ?? null,
                        'emer_floor' => $customerEmergencyData['emer_floor'][$index] ?? null,
                        'emer_building' => $customerEmergencyData['emer_building'][$index] ?? null,
                        'emer_block' => $customerEmergencyData['emer_block'][$index] ?? null,
                        'emer_area' => $customerEmergencyData['emer_area'][$index] ?? null,
                        'emer_city' => $customerEmergencyData['emer_city'][$index] ?? null,
                        'emer_email' => $customerEmergencyData['emer_email'][$index] ?? null,
                        'emer_web' => $customerEmergencyData['emer_web'][$index] ?? null,
                        'emer_pin' => $customerEmergencyData['emer_pin'][$index] ?? null,
                        'longitude2' => $customerEmergencyData['longitude2'][$index] ?? null,
                        'latitude2' => $customerEmergencyData['latitude2'][$index] ?? null,
                        'emer_app_rental' => $customerEmergencyData['emer_app_rental'][$index] ?? null,
                        'emer_note' => $customerEmergencyData['emer_note'][$index] ?? null,
                    ];

                    $customerEmergencyFields = [
                        'emer_pic',
                        'emer_poc_attach',
                        'emer_loc',
                        'emer_attach',
                    ];

                    foreach ($customerEmergencyFields as $field) {
                        if ($request->hasFile($field) && isset($request->$field[$index])) {
                            $file = $request->$field[$index];
                            $extension = $file->getClientOriginalExtension();
                            $file_name = time() . '_' . $file->getClientOriginalName();
                            $file->move(public_path('uploads/images'), $file_name);
                            $customerEmergencyDataRow[$field] = 'uploads/images/' . $file_name;
                        }
                    }

                    $customerEmergencyDataArray[] = $customerEmergencyDataRow;
                }
            }

            $customer->customeremergencies()->createMany($customerEmergencyDataArray);

            // Department Module
            $customerDepartmentData = $request->only([
                'dept_type',
                'dept_name',
                'dept_email',
                'dept_cell',
                'dept_address',
                'dept_desig',
                'dept_notes',
                'dept_office',
                'dept_floor',
                'dept_build',
                'dept_block',
                'dept_area',
                'dept_city',
                'dept_pin',
                'longitude3',
                'latitude3',
                'dept_ex_notes',
            ]);

            $customerDepartmentDataArray = [];
            if (isset($customerDepartmentData['dept_type']) && is_array($customerDepartmentData['dept_type'])) {
                foreach ($customerDepartmentData['dept_type'] as $index => $deptType) {
                    $customerDepartmentDataRow = [
                        'dept_type' => $deptType,
                        'dept_name' => $customerDepartmentData['dept_name'][$index] ?? null,
                        'dept_email' => $customerDepartmentData['dept_email'][$index] ?? null,
                        'dept_cell' => $customerDepartmentData['dept_cell'][$index] ?? null,
                        'dept_address' => $customerDepartmentData['dept_address'][$index] ?? null,
                        'dept_desig' => $customerDepartmentData['dept_desig'][$index] ?? null,
                        'dept_notes' => $customerDepartmentData['dept_notes'][$index] ?? null,
                        'dept_office' => $customerDepartmentData['dept_office'][$index] ?? null,
                        'dept_floor' => $customerDepartmentData['dept_floor'][$index] ?? null,
                        'dept_build' => $customerDepartmentData['dept_build'][$index] ?? null,
                        'dept_block' => $customerDepartmentData['dept_block'][$index] ?? null,
                        'dept_area' => $customerDepartmentData['dept_area'][$index] ?? null,
                        'dept_city' => $customerDepartmentData['dept_city'][$index] ?? null,
                        'dept_pin' => $customerDepartmentData['dept_pin'][$index] ?? null,
                        'longitude3' => $customerDepartmentData['longitude3'][$index] ?? null,
                        'latitude3' => $customerDepartmentData['latitude3'][$index] ?? null,
                        'dept_ex_notes' => $customerDepartmentData['dept_ex_notes'][$index] ?? null,
                    ];

                    $customerDepartmentFields = [
                        'dept_front',
                        'dept_back',
                        'dept_attach',
                        'dept_photo',
                        'dept_ex_attach',
                    ];

                    foreach ($customerDepartmentFields as $field) {
                        if ($request->hasFile($field) && isset($request->$field[$index])) {
                            $file = $request->$field[$index];
                            $extension = $file->getClientOriginalExtension();
                            $file_name = time() . '_' . $file->getClientOriginalName();
                            $file->move(public_path('uploads/images'), $file_name);
                            $customerDepartmentDataRow[$field] = 'uploads/images/' . $file_name;
                        }
                    }

                    $customerDepartmentDataArray[] = $customerDepartmentDataRow;
                }
            }

            $customer->customerdepartments()->createMany($customerDepartmentDataArray);

            // Inspection Module
            $customerInspectionData = $request->only([
                'inspection_no',
                'inspection_emp_id',
                'inspection_emp_name',
                'inspection_emp_cell',
                'inspection_emp_dept',
                'inspection_date',
                'inspection_rem_petr',
                'inspection_note',
            ]);

            $customerInspectionDataArray = [];
            if (isset($customerInspectionData['inspection_no']) && is_array($customerInspectionData['inspection_no'])) {
                foreach ($customerInspectionData['inspection_no'] as $index => $inspectionNo) {
                    $customerInspectionDataRow = [
                        'inspection_no' => $inspectionNo,
                        'inspection_emp_id' => $customerInspectionData['inspection_emp_id'][$index] ?? null,
                        'inspection_emp_name' => $customerInspectionData['inspection_emp_name'][$index] ?? null,
                        'inspection_emp_cell' => $customerInspectionData['inspection_emp_cell'][$index] ?? null,
                        'inspection_emp_dept' => $customerInspectionData['inspection_emp_dept'][$index] ?? null,
                        'inspection_date' => $customerInspectionData['inspection_date'][$index] ?? null,
                        'inspection_rem_petr' => $customerInspectionData['inspection_rem_petr'][$index] ?? null,
                        'inspection_note' => $customerInspectionData['inspection_note'][$index] ?? null,
                    ];

                    $customerInspectionFields = [
                        'inspection_pic',
                        'inspection_attach',
                    ];

                    foreach ($customerInspectionFields as $field) {
                        if ($request->hasFile("inspection_pic.{$index}") || $request->hasFile("inspection_attach.{$index}")) {
                            $files = $request->file($field)[$index] ?? [];
                            if (is_array($files)) {
                                $filePaths = [];
                                foreach ($files as $file) {
                                    $extension = $file->getClientOriginalExtension();
                                    $file_name = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();
                                    $file->move(public_path('uploads/images'), $file_name);
                                    $filePaths[] = 'uploads/images/' . $file_name;
                                }
                                $customerInspectionDataRow[$field] = json_encode($filePaths);
                            } else {
                                $extension = $files->getClientOriginalExtension();
                                $file_name = time() . '_' . $files->getClientOriginalName();
                                $files->move(public_path('uploads/images'), $file_name);
                                $customerInspectionDataRow[$field] = 'uploads/images/' . $file_name;
                            }
                        }
                    }

                    $customerInspectionDataArray[] = $customerInspectionDataRow;
                }
            }

            $customer->customerinspections()->createMany($customerInspectionDataArray);

            // Armourer Module
            $customerArmourerData = $request->only([
                'arm_branch_name',
                'arm_branch_id',
                'arm_site_id',
                'arm_client_name',
                'arm_weapon_no',
                'arm_weapon_bore',
                'arm_weapon_type',
                'arm_work_detail',
                'arm_sign_cus',
                'arm_auth',
                'arm_auth_no',
                'arm_auth_date',
                'arm_auth_issue',
                'type_weapon_cleaned',
                'arm_weapon_cleaned',
                'arm_cost_day',
                'arm_next_clean',
                'arm_auth_notes',
            ]);

            $customerArmourerDataArray = [];
            if (isset($customerArmourerData['arm_branch_name']) && is_array($customerArmourerData['arm_branch_name'])) {
                foreach ($customerArmourerData['arm_branch_name'] as $index => $armbranchName) {
                    $customerArmourerDataRow = [
                        'arm_branch_name' => $armbranchName,
                        'arm_branch_id' => $customerArmourerData['arm_branch_id'][$index] ?? null,
                        'arm_site_id' => $customerArmourerData['arm_site_id'][$index] ?? null,
                        'arm_client_name' => $customerArmourerData['arm_client_name'][$index] ?? null,
                        'arm_weapon_no' => $customerArmourerData['arm_weapon_no'][$index] ?? null,
                        'arm_weapon_bore' => $customerArmourerData['arm_weapon_bore'][$index] ?? null,
                        'arm_weapon_type' => $customerArmourerData['arm_weapon_type'][$index] ?? null,
                        'arm_work_detail' => $customerArmourerData['arm_work_detail'][$index] ?? null,
                        'arm_sign_cus' => $customerArmourerData['arm_sign_cus'][$index] ?? null,
                        'arm_auth' => $customerArmourerData['arm_auth'][$index] ?? null,
                        'arm_auth_no' => $customerArmourerData['arm_auth_no'][$index] ?? null,
                        'arm_auth_date' => $customerArmourerData['arm_auth_date'][$index] ?? null,
                        'arm_auth_issue' => $customerArmourerData['arm_auth_issue'][$index] ?? null,
                        'arm_weapon_cleaned' => $customerArmourerData['arm_weapon_cleaned'][$index] ?? null,
                        'type_weapon_cleaned' => $customerArmourerData['type_weapon_cleaned'][$index] ?? null,
                        'arm_cost_day' => $customerArmourerData['arm_cost_day'][$index] ?? null,
                        'arm_next_clean' => $customerArmourerData['arm_next_clean'][$index] ?? null,
                        'arm_auth_notes' => $customerArmourerData['arm_auth_notes'][$index] ?? null,
                    ];

                    $customerArmourerFields = [
                        'arm_pic_b',
                        'arm_pic_a',
                        'arm_cost_bill',
                        'arm_auth_attach',
                    ];

                    foreach ($customerArmourerFields as $field) {
                        if ($request->hasFile($field) && isset($request->$field[$index])) {
                            $file = $request->$field[$index];
                            $extension = $file->getClientOriginalExtension();
                            $file_name = time() . '_' . $file->getClientOriginalName();
                            $file->move(public_path('uploads/images'), $file_name);
                            $customerArmourerDataRow[$field] = 'uploads/images/' . $file_name;
                        }
                    }

                    $customerArmourerDataArray[] = $customerArmourerDataRow;
                }
            }

            $customer->customerarmourers()->createMany($customerArmourerDataArray);

            // Incident Module
            $customerIncidentData = $request->only([
                'client_name',
                'client_id',
                'client_site_id',
                'client_poc',
                'client_cell',
                'client_email',
                'client_site_address',
                'client_office',
                'client_build',
                'client_street',
                'client_area',
                'client_city',
                'client_fir',
                'arrest',
                'casual',
                'injuired',
                'incident_rep',
                'police_officer_name',
                'station',
                'rank',
                'report_made_by',
                'report_date',
                'report_time',
                'report_apr_by',
                'report_shared',
                'incident_type',
                'weapon_used',
                'detail_of_attacker',
                'attacker_desc',
                'attacker_shoe',
                'attacker_beard',
                'attacker_lang',
                'focused',
                'opening_phrase',
                'any_usual',
                'estimated_loss',
                'desc_loss',
                'officer_response',
                'incident_note',
            ]);

            $customerIncidentDataArray = [];
            if (isset($customerIncidentData['client_name']) && is_array($customerIncidentData['client_name'])) {
                foreach ($customerIncidentData['client_name'] as $index => $clientName) {
                    $customerIncidentDataRow = [
                        'client_name' => $clientName,
                        'client_id' => $customerIncidentData['client_id'][$index] ?? null,
                        'client_site_id' => $customerIncidentData['client_site_id'][$index] ?? null,
                        'client_poc' => $customerIncidentData['client_poc'][$index] ?? null,
                        'client_cell' => $customerIncidentData['client_cell'][$index] ?? null,
                        'client_email' => $customerIncidentData['client_email'][$index] ?? null,
                        'client_site_address' => $customerIncidentData['client_site_address'][$index] ?? null,
                        'client_office' => $customerIncidentData['client_office'][$index] ?? null,
                        'client_build' => $customerIncidentData['client_build'][$index] ?? null,
                        'client_street' => $customerIncidentData['client_street'][$index] ?? null,
                        'client_area' => $customerIncidentData['client_area'][$index] ?? null,
                        'client_city' => $customerIncidentData['client_city'][$index] ?? null,
                        'client_fir' => $customerIncidentData['client_fir'][$index] ?? null,
                        'arrest' => $customerIncidentData['arrest'][$index] ?? null,
                        'casual' => $customerIncidentData['casual'][$index] ?? null,
                        'injuired' => $customerIncidentData['injuired'][$index] ?? null,
                        'incident_rep' => $customerIncidentData['incident_rep'][$index] ?? null,
                        'police_officer_name' => $customerIncidentData['police_officer_name'][$index] ?? null,
                        'station' => $customerIncidentData['station'][$index] ?? null,
                        'rank' => $customerIncidentData['rank'][$index] ?? null,
                        'report_made_by' => $customerIncidentData['report_made_by'][$index] ?? null,
                        'report_date' => $customerIncidentData['report_date'][$index] ?? null,
                        'report_time' => $customerIncidentData['report_time'][$index] ?? null,
                        'report_apr_by' => $customerIncidentData['report_apr_by'][$index] ?? null,
                        'report_shared' => $customerIncidentData['report_shared'][$index] ?? null,
                        'incident_type' => $customerIncidentData['incident_type'][$index] ?? null,
                        'weapon_used' => $customerIncidentData['weapon_used'][$index] ?? null,
                        'detail_of_attacker' => $customerIncidentData['detail_of_attacker'][$index] ?? null,
                        'attacker_desc' => $customerIncidentData['attacker_desc'][$index] ?? null,
                        'attacker_shoe' => $customerIncidentData['attacker_shoe'][$index] ?? null,
                        'attacker_beard' => $customerIncidentData['attacker_beard'][$index] ?? null,
                        'attacker_lang' => $customerIncidentData['attacker_lang'][$index] ?? null,
                        'focused' => $customerIncidentData['focused'][$index] ?? null,
                        'opening_phrase' => $customerIncidentData['opening_phrase'][$index] ?? null,
                        'any_usual' => $customerIncidentData['any_usual'][$index] ?? null,
                        'estimated_loss' => $customerIncidentData['estimated_loss'][$index] ?? null,
                        'desc_loss' => $customerIncidentData['desc_loss'][$index] ?? null,
                        'officer_response' => $customerIncidentData['officer_response'][$index] ?? null,
                        'incident_note' => $customerIncidentData['incident_note'][$index] ?? null,
                    ];

                    $customerIncidentFields = [
                        'incident_attach',
                    ];

                    foreach ($customerIncidentFields as $field) {
                        if ($request->hasFile($field) && isset($request->$field[$index])) {
                            $file = $request->$field[$index];
                            $extension = $file->getClientOriginalExtension();
                            $file_name = time() . '_' . $file->getClientOriginalName();
                            $file->move(public_path('uploads/images'), $file_name);
                            $customerIncidentDataRow[$field] = 'uploads/images/' . $file_name;
                        }
                    }

                    $customerIncidentDataArray[] = $customerIncidentDataRow;
                }
            }

            $customer->customerincidents()->createMany($customerIncidentDataArray);

            // Assignment Module
            $customerAssigmentData = $request->only([
                'asig_customer_name',
                'task_assigning',
                'asig_desig',
                'asig_office',
                'asig_building',
                'asig_road',
                'asig_area',
                'asig_city',
                'asig_country',
                'asig_security',
                'asig_contact',
                'incharge_name',
                'incharge_desig',
                'incharge_contact',
                'incharge_help',
                'incharge_desc',
                'incharge_risk',
                'incharge_asig',
                'incharge_signed_by',
                'incharge_date',
                'incharge_offc',
                'incharge_floor',
                'incharge_build',
                'incharge_block',
                'incharge_area',
                'incharge_city',
                'incharge_pin',
                'longitude4',
                'latitude4',
                'incharge_country',
                'incharge_site',
                'incharge_a_g',
                'incharge_a_ung',
                'incharge_t_g',
                'rec_inc_rel',
                'feq_occ',
                'exp_piff',
                'any_spec',
                'petr_instruc',
                'asig_ex_notes',
            ]);

            $customerAssigmentDataArray = [];
            if (isset($customerAssigmentData['asig_customer_name']) && is_array($customerAssigmentData['asig_customer_name'])) {
                foreach ($customerAssigmentData['asig_customer_name'] as $index => $asigcustomerName) {
                    $customerAssigmentDataRow = [
                        'asig_customer_name' => $asigcustomerName,
                        'task_assigning' => $customerAssigmentData['task_assigning'][$index] ?? null,
                        'asig_desig' => $customerAssigmentData['asig_desig'][$index] ?? null,
                        'asig_office' => $customerAssigmentData['asig_office'][$index] ?? null,
                        'asig_building' => $customerAssigmentData['asig_building'][$index] ?? null,
                        'asig_road' => $customerAssigmentData['asig_road'][$index] ?? null,
                        'asig_area' => $customerAssigmentData['asig_area'][$index] ?? null,
                        'asig_city' => $customerAssigmentData['asig_city'][$index] ?? null,
                        'asig_country' => $customerAssigmentData['asig_country'][$index] ?? null,
                        'asig_security' => $customerAssigmentData['asig_security'][$index] ?? null,
                        'asig_contact' => $customerAssigmentData['asig_contact'][$index] ?? null,
                        'incharge_name' => $customerAssigmentData['incharge_name'][$index] ?? null,
                        'incharge_desig' => $customerAssigmentData['incharge_desig'][$index] ?? null,
                        'incharge_contact' => $customerAssigmentData['incharge_contact'][$index] ?? null,
                        'incharge_help' => $customerAssigmentData['incharge_help'][$index] ?? null,
                        'incharge_desc' => $customerAssigmentData['incharge_desc'][$index] ?? null,
                        'incharge_risk' => $customerAssigmentData['incharge_risk'][$index] ?? null,
                        'incharge_asig' => $customerAssigmentData['incharge_asig'][$index] ?? null,
                        'incharge_signed_by' => $customerAssigmentData['incharge_signed_by'][$index] ?? null,
                        'incharge_date' => $customerAssigmentData['incharge_date'][$index] ?? null,
                        'incharge_offc' => $customerAssigmentData['incharge_offc'][$index] ?? null,
                        'incharge_floor' => $customerAssigmentData['incharge_floor'][$index] ?? null,
                        'incharge_build' => $customerAssigmentData['incharge_build'][$index] ?? null,
                        'incharge_block' => $customerAssigmentData['incharge_block'][$index] ?? null,
                        'incharge_area' => $customerAssigmentData['incharge_area'][$index] ?? null,
                        'incharge_city' => $customerAssigmentData['incharge_city'][$index] ?? null,
                        'incharge_pin' => $customerAssigmentData['incharge_pin'][$index] ?? null,
                        'longitude4' => $customerAssigmentData['longitude4'][$index] ?? null,
                        'latitude4' => $customerAssigmentData['latitude4'][$index] ?? null,
                        'incharge_country' => $customerAssigmentData['incharge_country'][$index] ?? null,
                        'incharge_site' => $customerAssigmentData['incharge_site'][$index] ?? null,
                        'incharge_a_g' => $customerAssigmentData['incharge_a_g'][$index] ?? null,
                        'incharge_t_g' => $customerAssigmentData['incharge_t_g'][$index] ?? null,
                        'rec_inc_rel' => $customerAssigmentData['rec_inc_rel'][$index] ?? null,
                        'feq_occ' => $customerAssigmentData['feq_occ'][$index] ?? null,
                        'exp_piff' => $customerAssigmentData['exp_piff'][$index] ?? null,
                        'any_spec' => $customerAssigmentData['any_spec'][$index] ?? null,
                        'petr_instruc' => $customerAssigmentData['petr_instruc'][$index] ?? null,
                        'asig_ex_notes' => $customerAssigmentData['asig_ex_notes'][$index] ?? null,
                    ];

                    $customerAssigmentFields = [
                        'asig_ex_attach',
                    ];

                    foreach ($customerAssigmentFields as $field) {
                        if ($request->hasFile($field) && isset($request->$field[$index])) {
                            $file = $request->$field[$index];
                            $extension = $file->getClientOriginalExtension();
                            $file_name = time() . '_' . $file->getClientOriginalName();
                            $file->move(public_path('uploads/images'), $file_name);
                            $customerAssigmentDataRow[$field] = 'uploads/images/' . $file_name;
                        }
                    }

                    $customerAssigmentDataArray[] = $customerAssigmentDataRow;
                }
            }

            $customer->customerassigments()->createMany($customerAssigmentDataArray);

            // Audits Module
            $customerAuditData = $request->only([
                'audit_file',
                'audit_sign',
                'audit_date',
                'audit_checked_by',
                'audit_note',
            ]);

            $customerAuditDataArray = [];
            if (isset($customerAuditData['audit_file']) && is_array($customerAuditData['audit_file'])) {
                foreach ($customerAuditData['audit_file'] as $index => $auditFile) {
                    $customerAuditDataRow = [
                        'audit_file' => $auditFile,
                        'audit_sign' => $customerAuditData['audit_sign'][$index] ?? null,
                        'audit_date' => $customerAuditData['audit_date'][$index] ?? null,
                        'audit_checked_by' => $customerAuditData['audit_checked_by'][$index] ?? null,
                        'audit_note' => $customerAuditData['audit_note'][$index] ?? null,
                    ];

                    $customerAuditFields = [
                        'audit_attach',
                        'audit_ex_attach',
                    ];

                    foreach ($customerAuditFields as $field) {
                        if ($request->hasFile($field) && isset($request->$field[$index])) {
                            $file = $request->$field[$index];
                            $extension = $file->getClientOriginalExtension();
                            $file_name = time() . '_' . $file->getClientOriginalName();
                            $file->move(public_path('uploads/images'), $file_name);
                            $customerAuditDataRow[$field] = 'uploads/images/' . $file_name;
                        }
                    }

                    $customerAuditDataArray[] = $customerAuditDataRow;
                }
            }

            $customer->customeraudits()->createMany($customerAuditDataArray);

            // Business Module
            $customerBussinessData = $request->only([
                'cb_name',
                'cb_desig',
                'cb_comp_name',
                'cb_email',
                'cb_cno',
                'bussiness_name',
                'bussiness_nature',
                'bussiness_office_no',
                'bussiness_floor',
                'bussiness_building',
                'bussiness_block',
                'bussiness_area',
                'bussiness_city',
                'bussiness_email',
                'bussiness_web',
                'bussiness_pin',
                'longitude5',
                'latitude5',
                'bussiness_notes',
            ]);

            $customerBussinessDataArray = [];
            if (isset($customerBussinessData['bussiness_name']) && is_array($customerBussinessData['bussiness_name'])) {
                foreach ($customerBussinessData['bussiness_name'] as $index => $bussinessName) {
                    $customerBussinessDataRow = [
                        'bussiness_name' => $bussinessName,
                        'bussiness_nature' => $customerBussinessData['bussiness_nature'][$index] ?? null,
                        'cb_name' => $customerBussinessData['cb_name'][$index] ?? null,
                        'cb_desig' => $customerBussinessData['cb_desig'][$index] ?? null,
                        'cb_comp_name' => $customerBussinessData['cb_comp_name'][$index] ?? null,
                        'cb_email' => $customerBussinessData['cb_email'][$index] ?? null,
                        'cb_cno' => $customerBussinessData['cb_cno'][$index] ?? null,
                        'bussiness_office_no' => $customerBussinessData['bussiness_office_no'][$index] ?? null,
                        'bussiness_floor' => $customerBussinessData['bussiness_floor'][$index] ?? null,
                        'bussiness_building' => $customerBussinessData['bussiness_building'][$index] ?? null,
                        'bussiness_block' => $customerBussinessData['bussiness_block'][$index] ?? null,
                        'bussiness_area' => $customerBussinessData['bussiness_area'][$index] ?? null,
                        'bussiness_city' => $customerBussinessData['bussiness_city'][$index] ?? null,
                        'bussiness_email' => $customerBussinessData['bussiness_email'][$index] ?? null,
                        'bussiness_web' => $customerBussinessData['bussiness_web'][$index] ?? null,
                        'bussiness_pin' => $customerBussinessData['bussiness_pin'][$index] ?? null,
                        'longitude5' => $customerBussinessData['longitude5'][$index] ?? null,
                        'latitude5' => $customerBussinessData['latitude5'][$index] ?? null,
                        'bussiness_notes' => $customerBussinessData['bussiness_notes'][$index] ?? null,
                    ];

                    $customerBussinessFields = [
                        'bussiness_photo',
                        'bussiness_attach',
                    ];

                    foreach ($customerBussinessFields as $field) {
                        if ($request->hasFile($field) && isset($request->$field[$index])) {
                            $file = $request->$field[$index];
                            $extension = $file->getClientOriginalExtension();
                            $file_name = time() . '_' . $file->getClientOriginalName();
                            $file->move(public_path('uploads/images'), $file_name);
                            $customerBussinessDataRow[$field] = 'uploads/images/' . $file_name;
                        }
                    }

                    $customerBussinessDataArray[] = $customerBussinessDataRow;
                }
            }

            $customer->customerbussinesses()->createMany($customerBussinessDataArray);

            // Promotional Activities Module
            $customerActivitiesData = $request->only([
                'promotional_act',
                'promotional_quantity',
                'prom_price',
                'prom_date',
                'promotional_notes',
            ]);

            $customerActivitiesDataArray = [];
            if (isset($customerActivitiesData['promotional_act']) && is_array($customerActivitiesData['promotional_act'])) {
                foreach ($customerActivitiesData['promotional_act'] as $index => $promotionalAct) {
                    $customerActivitiesDataRow = [
                        'promotional_act' => $promotionalAct,
                        'promotional_quantity' => $customerActivitiesData['promotional_quantity'][$index] ?? null,
                        'prom_price' => $customerActivitiesData['prom_price'][$index] ?? null,
                        'prom_date' => $customerActivitiesData['prom_date'][$index] ?? null,
                        'promotional_notes' => $customerActivitiesData['promotional_notes'][$index] ?? null,
                    ];

                    $customerActivitiesFields = [
                        'promotional_attach',
                    ];

                    foreach ($customerActivitiesFields as $field) {
                        if ($request->hasFile($field) && isset($request->$field[$index])) {
                            $file = $request->$field[$index];
                            $extension = $file->getClientOriginalExtension();
                            $file_name = time() . '_' . $file->getClientOriginalName();
                            $file->move(public_path('uploads/images'), $file_name);
                            $customerActivitiesDataRow[$field] = 'uploads/images/' . $file_name;
                        }
                    }

                    $customerActivitiesDataArray[] = $customerActivitiesDataRow;
                }
            }

            $customer->customeractivities()->createMany($customerActivitiesDataArray);

            // Feedback Module
            $customerFeedbackData = $request->only([
                'feed_client_name',
                'feed_client_poc_name',
                'feed_client_email',
                'feed_client_id',
                'feed_client_site_id',
                'feed_desig',
                'feed_cell',
                'feed_month',
                'q1',
                'q2',
                'q3',
                'q4',
                'q5',
                'q6',
                'q7',
                'q8',
                'q9',
                'q10',
                'total_score',
                'feed_company_name',
                'feed_poc_name',
                'feed_comment',
                'feedback_form',
                'feed_email',
                'feed_telephone',
                'feed_signature',
                'feed_received',
                'feed_remarks',
            ]);

            $customerFeedbackDataArray = [];
            if (isset($customerFeedbackData['feed_client_name']) && is_array($customerFeedbackData['feed_client_name'])) {
                foreach ($customerFeedbackData['feed_client_name'] as $index => $feedClientname) {
                    $customerFeedbackDataRow = [
                        'feed_client_name' => $feedClientname,
                        'feed_client_poc_name' => $customerFeedbackData['feed_client_poc_name'][$index] ?? null,
                        'feed_client_email' => $customerFeedbackData['feed_client_email'][$index] ?? null,
                        'feed_client_id' => $customerFeedbackData['feed_client_id'][$index] ?? null,
                        'feed_client_site_id' => $customerFeedbackData['feed_client_site_id'][$index] ?? null,
                        'feed_desig' => $customerFeedbackData['feed_desig'][$index] ?? null,
                        'feed_cell' => $customerFeedbackData['feed_cell'][$index] ?? null,
                        'feed_month' => $customerFeedbackData['feed_month'][$index] ?? null,
                        'q1' => $customerFeedbackData['q1'][$index] ?? null,
                        'q2' => $customerFeedbackData['q2'][$index] ?? null,
                        'q3' => $customerFeedbackData['q3'][$index] ?? null,
                        'q4' => $customerFeedbackData['q4'][$index] ?? null,
                        'q5' => $customerFeedbackData['q5'][$index] ?? null,
                        'q6' => $customerFeedbackData['q6'][$index] ?? null,
                        'q7' => $customerFeedbackData['q7'][$index] ?? null,
                        'q8' => $customerFeedbackData['q8'][$index] ?? null,
                        'q9' => $customerFeedbackData['q9'][$index] ?? null,
                        'q10' => $customerFeedbackData['q10'][$index] ?? null,
                        'total_score' => $customerFeedbackData['total_score'][$index] ?? null,
                        'feed_company_name' => $customerFeedbackData['feed_company_name'][$index] ?? null,
                        'feed_poc_name' => $customerFeedbackData['feed_poc_name'][$index] ?? null,
                        'feed_comment' => $customerFeedbackData['feed_comment'][$index] ?? null,
                        'feedback_form' => $customerFeedbackData['feedback_form'][$index] ?? null,
                        'feed_email' => $customerFeedbackData['feed_email'][$index] ?? null,
                        'feed_telephone' => $customerFeedbackData['feed_telephone'][$index] ?? null,
                        'feed_signature' => $customerFeedbackData['feed_signature'][$index] ?? null,
                        'feed_received' => $customerFeedbackData['feed_received'][$index] ?? null,
                        'feed_remarks' => $customerFeedbackData['feed_remarks'][$index] ?? null,
                    ];

                    $customerFeedbackFields = [
                        'feed_attach',
                    ];

                    foreach ($customerFeedbackFields as $field) {
                        if ($request->hasFile($field) && isset($request->$field[$index])) {
                            $file = $request->$field[$index];
                            $extension = $file->getClientOriginalExtension();
                            $file_name = time() . '_' . $file->getClientOriginalName();
                            $file->move(public_path('uploads/images'), $file_name);
                            $customerFeedbackDataRow[$field] = 'uploads/images/' . $file_name;
                        }
                    }

                    $customerFeedbackDataArray[] = $customerFeedbackDataRow;
                }
            }

            $customer->customerfeedbacks()->createMany($customerFeedbackDataArray);

            // Complaint Module (FIXED HERE)
            $customerComplaintData = $request->only([
                'complaint_no',
                'complaint_guards_duty',
                'complaint_gaurd_note',
                'wea_uni_equip',
                'wue_note',
                'finance_dept',
                'fd_note',
                'src_complaint',
                'complain_month',
                'src_note',
                'mng_feed',
                'mng_note',
                'complaint_poc_name',
                'complaint_poc_desig',
                'complaint_poc_dept',
                'complaint_poc_email',
                'complaint_poc_contact',
                'details_complaint',
                'complaint_tagged',
                'complaint_arressed',
                'complaint_addressed_note',
            ]);

            $customerComplaintDataArray = [];
            if (isset($customerComplaintData['complaint_no']) && is_array($customerComplaintData['complaint_no'])) {
                foreach ($customerComplaintData['complaint_no'] as $index => $complaintNo) {
                    $customerComplaintDataRow = [
                        'complaint_no' => $complaintNo,
                        'complaint_guards_duty' => $customerComplaintData['complaint_guards_duty'][$index] ?? null,
                        'complaint_gaurd_note' => $customerComplaintData['complaint_gaurd_note'][$index] ?? null,
                        'wea_uni_equip' => $customerComplaintData['wea_uni_equip'][$index] ?? null,
                        'wue_note' => $customerComplaintData['wue_note'][$index] ?? null,
                        'finance_dept' => $customerComplaintData['finance_dept'][$index] ?? null,
                        'fd_note' => $customerComplaintData['fd_note'][$index] ?? null,
                        'src_complaint' => $customerComplaintData['src_complaint'][$index] ?? null,
                        'complain_month' => $customerComplaintData['complain_month'][$index] ?? null,  // FIXED: Null coalescing here
                        'src_note' => $customerComplaintData['src_note'][$index] ?? null,
                        'mng_feed' => $customerComplaintData['mng_feed'][$index] ?? null,
                        'mng_note' => $customerComplaintData['mng_note'][$index] ?? null,
                        'complaint_poc_name' => $customerComplaintData['complaint_poc_name'][$index] ?? null,
                        'complaint_poc_desig' => $customerComplaintData['complaint_poc_desig'][$index] ?? null,
                        'complaint_poc_dept' => $customerComplaintData['complaint_poc_dept'][$index] ?? null,
                        'complaint_poc_email' => $customerComplaintData['complaint_poc_email'][$index] ?? null,
                        'complaint_poc_contact' => $customerComplaintData['complaint_poc_contact'][$index] ?? null,
                        'details_complaint' => $customerComplaintData['details_complaint'][$index] ?? null,
                        'complaint_tagged' => $customerComplaintData['complaint_tagged'][$index] ?? null,
                        'complaint_arressed' => $customerComplaintData['complaint_arressed'][$index] ?? null,
                        'complaint_addressed_note' => $customerComplaintData['complaint_addressed_note'][$index] ?? null,
                    ];

                    $customerComplaintFields = [
                        'complaint_guard_attach',
                        'fd_attach',
                        'src_attach',
                        'mng_attach',
                        'complaint_picture',
                        'details_attach',
                        'complaint_addressed_attach',
                    ];

                    foreach ($customerComplaintFields as $field) {
                        if ($request->hasFile($field) && isset($request->$field[$index])) {
                            $file = $request->$field[$index];
                            $extension = $file->getClientOriginalExtension();
                            $file_name = time() . '_' . $file->getClientOriginalName();
                            $file->move(public_path('uploads/images'), $file_name);
                            $customerComplaintDataRow[$field] = 'uploads/images/' . $file_name;
                        }
                    }

                    $customerComplaintDataArray[] = $customerComplaintDataRow;
                }
            }

            $customer->customercomplaints()->createMany($customerComplaintDataArray);

            // Notification Module
            $customerNotificationData = $request->only([
                'notification_no',
                'notification_related',
                'notification_of_month',
                'notification_note',
                'notification_shared',
                'notification_ex_note',
            ]);

            $customerNotificationDataArray = [];
            if (isset($customerNotificationData['notification_no']) && is_array($customerNotificationData['notification_no'])) {
                foreach ($customerNotificationData['notification_no'] as $index => $notificationNo) {
                    $customerNotificationDataRow = [
                        'notification_no' => $notificationNo,
                        'notification_related' => $customerNotificationData['notification_related'][$index] ?? null,
                        'notification_note' => $customerNotificationData['notification_note'][$index] ?? null,
                        'notification_of_month' => $customerNotificationData['notification_of_month'][$index] ?? null,
                        'notification_shared' => $customerNotificationData['notification_shared'][$index] ?? null,
                        'notification_ex_note' => $customerNotificationData['notification_ex_note'][$index] ?? null,
                    ];

                    $customerNotificationFields = [
                        'notification_attach',
                        'notification_ex_attach',
                    ];

                    foreach ($customerNotificationFields as $field) {
                        if ($request->hasFile($field) && isset($request->$field[$index])) {
                            $file = $request->$field[$index];
                            $extension = $file->getClientOriginalExtension();
                            $file_name = time() . '_' . $file->getClientOriginalName();
                            $file->move(public_path('uploads/images'), $file_name);
                            $customerNotificationDataRow[$field] = 'uploads/images/' . $file_name;
                        }
                    }

                    $customerNotificationDataArray[] = $customerNotificationDataRow;
                }
            }

            $customer->customernotifications()->createMany($customerNotificationDataArray);

            $qrCodePath = 'uploads/qrcodes/';
            $fullQrCodePath = public_path($qrCodePath);

            if (!file_exists($fullQrCodePath)) {
                mkdir($fullQrCodePath, 0777, true);
                chmod($fullQrCodePath, 0777);
            }

            if (!empty($customer->display_name_as)) {
                try {
                    $qrCode = new QrCode($customer->display_name_as);

                    $writer = new PngWriter();

                    $qrCodeString = $writer->write($qrCode)->getString();

                    $customerData['qrcode_path'] = $qrCodePath . 'customer_' . $customer->id . '.png';

                    file_put_contents(public_path($customerData['qrcode_path']), $qrCodeString);

                    $customer->update(['qrcode_path' => $customerData['qrcode_path']]);

                    $qrCodeUrl = asset($customerData['qrcode_path']);

                    Log::info('QR Code Path: ' . $customerData['qrcode_path']);
                    Log::info('QR Code Base Path: ' . $qrCodePath);
                    Log::info('QR Code URL: ' . $qrCodeUrl);
                } catch (\Exception $e) {
                    Log::error('Error generating QR code for customer ' . $customer->id . ': ' . $e->getMessage());
                }
            } else {
                Log::error('Error generating QR code for customer ' . $customer->id . ': Display name is null or empty.');
            }
            DB::commit();

            $customerId = $customer->id;
            // Send WhatsApp Confirmation using existing sendWelcome template
                        $whatsappTo = !empty($customer->whatsapp_number) ? $customer->whatsapp_number : $customer->phone;
                        if (!empty($whatsappTo)) {
                            app(WhatsAppNotificationManager::class)->sendWelcome(
                                to: $whatsappTo,
                                customerName: $customer->display_name_as,
                                username: $customerData['email'],
                                userModel: $customer
                            );
                            Log::info('Confirmation WhatsApp sent to: ' . $whatsappTo);
                        }
            Log::info('Customer data successfully stored. Customer ID: ' . $customerId);
            // Send email if save_and_email is clicked
            if ($request->has('save_and_email') && !empty($customerData['email'])) {
                if ($customer->notification_status == 1) {
                    try {
                        Mail::to($customerData['email'])->send(new CustomerConfirmation($customer));
                        Log::info('Confirmation email sent to: ' . $customerData['email']);

                        
                    } catch (\Exception $e) {
                        Log::error('Error sending email to ' . $customerData['email'] . ': ' . $e->getMessage());
                    }
                } else {
                    Log::info('Confirmation email skipped. Customer notification status is OFF.');
                }
                $url = route('viewcustomer', ['id' => $customerId]);
                if ($customer->notification_status == 1) {
                    return redirect()->to($url)->with('success', 'Customer data successfully stored and email sent.');
                } else {
                    return redirect()->to($url)->with('success', 'Customer data successfully stored. Email skipped: Notification status is OFF.');
                }
            } elseif ($request->has('save_and_share')) {
                return redirect()->route('postcustomer')->with('success', 'Customer data successfully stored.')->with('customerId', $customerId);
            } elseif ($request->has('save_and_new')) {
                return redirect()->route('postcustomer')->with('success', 'Customer data successfully stored.');
            } else {
                return redirect()->route('customer')->with('success', 'Customer data successfully stored.');
            }
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('An error occurred while saving Customer data: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while saving data.');
        }
    }


    public function sendReportEmail(Request $request)
    {
        try {
            $validator = $request->validate([
                'subject' => 'required|string',
                'body' => 'required|string',
                'recipientEmail' => 'required|email',
                'ccEmail' => 'nullable|email',
                'bccEmail' => 'nullable|email',
                'attachments.*' => 'nullable|file|max:20480', // Allow null for attachments, adjust max file size as needed
            ]);

            $emailSubject = $request->input('subject');
            $emailBody = $request->input('body');
            $recipientEmail = $request->input('recipientEmail');
            $ccEmail = $request->input('ccEmail');
            $bccEmail = $request->input('bccEmail');
            $attachments = $request->file('attachments');

            Log::info('Sending email to ' . $recipientEmail . ' with subject: ' . $emailSubject);

            Log::info('Sending email to ' . $recipientEmail . ' with subject: ' . $emailSubject);

            $customerRecipient = Customer::where('email', $recipientEmail)->first();
            if ($customerRecipient && $customerRecipient->notification_status != 1) {
                Log::info('Email skipped for ' . $recipientEmail . ' due to notification status OFF.');
                return response()->json(['status' => 'success', 'message' => 'Customer notification_status is OFF.']);
            }

            Mail::raw($emailBody, function ($message) use ($recipientEmail, $ccEmail, $bccEmail, $emailSubject, $attachments) {
                if ($attachments) {
                    foreach ($attachments as $attachment) {
                        $message->attach($attachment->getRealPath(), [
                            'as' => $attachment->getClientOriginalName(), // Use original file name as attachment name
                            'mime' => $attachment->getClientMimeType()
                        ]);
                    }
                }

                $message->to($recipientEmail)
                    ->subject($emailSubject);

                if ($ccEmail) {
                    $message->cc($ccEmail);
                }

                if ($bccEmail) {
                    $message->bcc($bccEmail);
                }
            });

            Log::info('Email sent successfully to ' . $recipientEmail);

            // Send WhatsApp message
            if ($customerRecipient) {
                $whatsappTo = !empty($customerRecipient->whatsapp_number) ? $customerRecipient->whatsapp_number : $customerRecipient->phone;
                if (!empty($whatsappTo)) {
                    app(WhatsAppNotificationManager::class)->sendCustomerReport(
                        to: $whatsappTo,
                        recipientName: $customerRecipient->customers_name,
                        date: now()->format('Y-m-d'),
                        userModel: $customerRecipient
                    );
                }
            }

            return response()->json(['status' => 'success', 'message' => 'Email sent successfully.']);
        } catch (\Exception $e) {
            Log::error('Failed to send email. Error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Failed to send email.'], 500);
        }
    }

    public function sendEditReportEmail(Request $request)
    {
        try {
            $validator = $request->validate([
                'subject' => 'required|string',
                'body' => 'required|string',
                'recipientEmail' => 'required|email',
                'ccEmail' => 'nullable|email',
                'bccEmail' => 'nullable|email',
                'attachments.*' => 'nullable|file|max:20480', // Allow null for attachments, adjust max file size as needed
            ]);

            $emailSubject = $request->input('subject');
            $emailBody = $request->input('body');
            $recipientEmail = $request->input('recipientEmail');
            $ccEmail = $request->input('ccEmail');
            $bccEmail = $request->input('bccEmail');
            $attachments = $request->file('attachments');

            Log::info('Sending email to ' . $recipientEmail . ' with subject: ' . $emailSubject);

            Log::info('Sending email to ' . $recipientEmail . ' with subject: ' . $emailSubject);

            $customerRecipient = Customer::where('email', $recipientEmail)->first();
            if ($customerRecipient && $customerRecipient->notification_status != 1) {
                Log::info('Email skipped for ' . $recipientEmail . ' due to notification status OFF.');
                return response()->json(['status' => 'success', 'message' => 'Customer notification_status is OFF.']);
            }

            Mail::raw($emailBody, function ($message) use ($recipientEmail, $ccEmail, $bccEmail, $emailSubject, $attachments) {
                if ($attachments) {
                    foreach ($attachments as $attachment) {
                        $message->attach($attachment->getRealPath(), [
                            'as' => $attachment->getClientOriginalName(),
                            'mime' => $attachment->getClientMimeType()
                        ]);
                    }
                }

                $message->to($recipientEmail)
                    ->subject($emailSubject);

                if ($ccEmail) {
                    $message->cc($ccEmail);
                }

                if ($bccEmail) {
                    $message->bcc($bccEmail);
                }
            });

            Log::info('Email sent successfully to ' . $recipientEmail);

            // Send WhatsApp message
            if ($customerRecipient) {
                $whatsappTo = !empty($customerRecipient->whatsapp_number) ? $customerRecipient->whatsapp_number : $customerRecipient->phone;
                if (!empty($whatsappTo)) {
                    app(WhatsAppNotificationManager::class)->sendCustomerReport(
                        to: $whatsappTo,
                        recipientName: $customerRecipient->customers_name,
                        date: now()->format('Y-m-d'),
                        userModel: $customerRecipient
                    );
                }
            }

            return response()->json(['status' => 'success', 'message' => 'Email sent successfully.']);
        } catch (\Exception $e) {
            Log::error('Failed to send email. Error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Failed to send email.'], 500);
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

            $pdf = $request->file('pdf');

            $customerRecipient = Customer::where('email', $email)->first();
            if ($customerRecipient && $customerRecipient->notification_status != 1) {
                return response()->json(['message' => 'Customer notification_status is OFF.'], 200);
            }

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

                $message->attach($pdf, ['as' => 'customer_information.pdf'])
                    ->text($body);
            });

            // Send WhatsApp message
            if ($customerRecipient) {
                $whatsappTo = !empty($customerRecipient->whatsapp_number) ? $customerRecipient->whatsapp_number : $customerRecipient->phone;
                if (!empty($whatsappTo)) {
                    app(WhatsAppNotificationManager::class)->sendCustomerReport(
                        to: $whatsappTo,
                        recipientName: $customerRecipient->customers_name,
                        date: now()->format('Y-m-d'),
                        userModel: $customerRecipient
                    );
                }
            }

            return response()->json(['message' => 'Email sent successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to send email.'], 500);
        }
    }

    public function editcustomer($id)
    {
        $customers = Customer::find($id);
        $currencies = Currency::all();
        $compliances = Compliance::all();
        $saobcategories = SaobCategory::all();
        $guardposts = Guardpost::all();
        $categories = Category::all();
        $emerser = Emerser::all();
        $mpoc = mpoc::all();
        $activities = Activities::all();
        $duties = Duties::all();
        $equipments = Equipments::all();
        $finances = Finance::all();
        $sources = Sources::all();
        $complaintsto = ComplaintTaggedTo::all();
        $complaintsby = ComplaintAddressedBy::all();
        $notifications = Notification::all();
        $notificationshared = NotificationShared::all();
        $checkedby = Checkedby::all();
        $departments = Department::all();
        $subCustomerss = Customer::all();
        $duties = Duties::all();

        // return  $subCustomerss;
        return view('customers.editcustomer', compact(
            'customers',
            'currencies',
            'compliances',
            'saobcategories',
            'guardposts',
            'categories',
            'emerser',
            'mpoc',
            'activities',
            'duties',
            'equipments',
            'finances',
            'sources',
            'complaintsto',
            'complaintsby',
            'notifications',
            'notificationshared',
            'checkedby',
            'departments',
            'subCustomerss'
        ));
    }

    public function sub_customer($id)
    {
        $customer = Customer::findOrFail($id);
        $subCustomers = Customer::where('customers_id', 'LIKE', $customer->customers_id . '.%')
            ->whereRaw("LENGTH(customers_id) - LENGTH(REPLACE(customers_id, '.', '')) = ?", [substr_count($customer->customers_id, '.') + 1])
            ->orderByRaw("LENGTH(customers_id), customers_id ASC")
            ->get();
        //  return $subCustomers;
        return view('customers.sub_customer', compact('subCustomers'));
    }

    public function getSubCustomers($customer_id)
    {
        $customer = Customer::where('customers_id', $customer_id)->firstOrFail();

        // Get all sub-customers recursively
        $subCustomers = $this->fetchAllSubCustomers($customer->customers_id);
        //   return  $subCustomers;
        return view('customers.sub_child_customers', compact('customer', 'subCustomers'));
    }

    /**
     * Fetch all nested sub-customers recursively.
     */
    private function fetchAllSubCustomers($parent_id)
    {
        $subCustomers = Customer::where('customers_id', 'LIKE', $parent_id . '.%')
            ->orderByRaw("LENGTH(customers_id), customers_id ASC")
            ->get();

        foreach ($subCustomers as $sub) {
            $sub->sub_customers = $this->fetchAllSubCustomers($sub->customers_id); // Recursive call
        }

        return $subCustomers;
    }

public function viewcustomer($id)
    {
        $customers = Customer::with([
            'hrms', 
            'customersignatories', 
            'customersalary', 
            'customermanpowers', 
            'customeremergencies', 
            'customerdepartments', 
            'customerinspections.inspectionForms.answers.question.options',
            'customerinspections.inspectionForms.answers.option',
            'customerarmourers', 
            'customerincidents', 
            'customerassigments', 
            'customeraudits', 
            'customerbussinesses', 
            'customeractivities', 
            'customerfeedbacks', 
            'customercomplaints', 
            'customernotifications'
        ])->findOrFail($id);

        return view('customers.viewcustomer', compact('customers'));
    }

    public function viewcustomerone($id)
    {
        $customers = Customer::find($id);
        return view('customers.viewcustomerone', compact('customers'));
    }

    // CustomerController.php
    public function generateAndSendPDF(Request $request)
    {
        Log::info('generateAndSendPDF method called');
        try {
            $request->validate([
                'email' => 'required|email',
            ]);

            $email = $request->input('email');
            dd($email);

            // Generate PDF
            $pdf = PDF::loadView('pdf.customer_information'); // Assuming you have a Blade view for the PDF content

            // Ensure PDF generation was successful
            if (!$pdf) {
                throw new \Exception('Failed to generate PDF');
            }

            // Send email with PDF attachment
            // Send email with PDF attachment
            $customerRecipient = Customer::where('email', $email)->first();
            if ($customerRecipient && $customerRecipient->notification_status != 1) {
                Log::info('Email skipped for ' . $email . ' due to notification status OFF.');
                return response()->json(['message' => 'Customer notification_status is OFF.'], 200);
            }

            Mail::send([], [], function ($message) use ($pdf, $email) {
                $message->to($email)
                    ->subject('Customer Information PDF')
                    ->attachData($pdf->output(), 'customer_information.pdf');
            });

            // Send WhatsApp message
            // Send WhatsApp message
            if ($customerRecipient) {
                $whatsappTo = !empty($customerRecipient->whatsapp_number) ? $customerRecipient->whatsapp_number : $customerRecipient->phone;
                if (!empty($whatsappTo)) {
                    $nameFallback = !empty($customerRecipient->display_name_as) ? $customerRecipient->display_name_as : 'Customer';
                    $emailFallback = !empty($email) ? $email : 'your email';

                    app(WhatsAppNotificationManager::class)->send(
                        phone: $whatsappTo,
                        message: "Dear *{$nameFallback}*,\n\nYour Customer Information PDF has been sent to {$emailFallback}.",
                        eventType: 'pdf_generated',
                        user: $customerRecipient,
                        category: 'UTILITY'
                    );
                }
            }

            // Log success message
            Log::info('Email sent successfully to ' . $email);

            // Return success response
            return response()->json(['message' => 'Email sent successfully'], 200);
        } catch (\Exception $e) {
            // Log error message
            Log::error('Failed to send email: ' . $e->getMessage());

            // Return error response
            return response()->json(['error' => 'Failed to send email'], 500);
        }
        Log::info('generateAndSendPDF method completed');
    }

    public function getCustomer($id)
    {
        // Fetch the customer information based on the provided ID
        $customer = Customer::find($id);

        // Check if the customer exists
        if (!$customer) {
            return response()->json(['error' => 'Customer not found'], 404);
        }

        // Return the customer information in JSON format
        return response()->json($customer);
    }

    public function update_customer(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $customerData = $request->except('_token');

            $checkboxFields = [
                'approved_com',
                'quick_box',
                'eobi',
                'social_security',
                'grp_life_ins',
                'approv_q_s',
                'approv_q_c',
                'approv_q_cfo',
                'sales_dept',
                'cmd',
                'ops_dept',
                'finance_dept',
                'directors',
                'signed_ser',
                'com_ins',
                'testimonials',
                'sales_inc',
                'fbr',
                'pra',
                'kpra',
                'srb',
                'bra',
                'ajk',
                'gb'
            ];

            foreach ($checkboxFields as $field) {
                $customerData[$field] = $request->has($field) ? true : false;
            }

            $customerImageFields = [
                'approved_attach',
                'quickbooks_attach',
                'sum_apr',
                'apr_kpi',
                'approv_q_s_attach',
                'approv_q_c_attach',
                'approv_q_cfo_attach',
                'signed_ser_attach',
                'com_ins_attach',
                'testimonials_attach',
                'sales_inc_attach',
                'perfom_attach',
                'ntn_fbr',
                'poc_photo',
                'poc_attach',
                'cf_photo',
                'cf_attach',
                'currency_attach',
                'meeting_attach',
                'meeting_freq_attach',
                'meeting_alert_attach',
                'pat_super_photo',
            ];

            foreach ($customerImageFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $customerData[$field] = 'uploads/images/' . $file_name;
                }
            }


            $customerVideoFields = [
                'pat_super_video',
            ];

            foreach ($customerVideoFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/videos'), $file_name);
                    $customerData[$field] = 'uploads/videos/' . $file_name;
                }
            }

            $customer = Customer::findOrFail($id);
            $customer->update($customerData);

            // Signatory Details
            $customerSignatureData = $request->input('customersignatories', []);

            foreach ($customerSignatureData as $customerSignatureDatum) {
                $customersignatoryId = $customerSignatureDatum['s_id'];

                if (empty($customersignatoryId)) {
                    $customer->customersignatories()->create($customerSignatureDatum);
                } else {
                    $customersignatory = CustomerSignatory::find($customersignatoryId);
                    if ($customersignatory) {
                        $customersignatory->update($customerSignatureDatum);
                    }
                }
            }


            // Salary And Benefits
            $customerSalaryAndBenefitsData = $request->input('customersalary', []);

foreach ($customerSalaryAndBenefitsData as $index => $customerSalaryAndBenefitsData) {
                $customerSalaryAndBenefitsId = $customerSalaryAndBenefitsData['sal_id'];

                $customerSalaryAndBenefitsFields = ['sal_attach'];

                foreach ($customerSalaryAndBenefitsFields as $field) {
                    if ($request->hasFile($field) && isset($request->file($field)[$index])) {
                        $file = $request->file($field)[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $customerSalaryAndBenefitsData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($customerSalaryAndBenefitsId)) {
                    $customer->customersalary()->create($customerSalaryAndBenefitsData);
                } else {
                    $customersalary = CustomerSalary::find($customerSalaryAndBenefitsId);
                    if ($customersalary) {
                        $customersalary->update($customerSalaryAndBenefitsData);
                    }
                }
            }

            //Customers ManPower Data :

            $customermansData = $request->input('customermanpowers', []);

            foreach ($customermansData as $customermanData) {
                $customermanId = $customermanData['m_id'];

                $customermanFields = ['man_equip_attach'];

                foreach ($customermanFields as $field) {
                    if ($request->hasFile($field) && isset($customermanData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $customermanData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($customermanId)) {
                    $customer->customermanpowers()->create($customermanData);
                } else {
                    $customerman = CustomerManPower::find($customermanId);
                    if ($customerman) {
                        $customerman->update($customermanData);
                    }
                }
            }

            //Customers Emergency Data :

            $customeremergenciesData = $request->input('customeremergencies', []);

foreach ($customeremergenciesData as $index => $customeremergencyData) {
                $customeremergencyId = $customeremergencyData['e_id'];

                $customeremergencyFields = ['emer_pic', 'emer_poc_attach', 'emer_loc', 'emer_attach'];

                foreach ($customeremergencyFields as $field) {
                    if ($request->hasFile($field) && isset($request->file($field)[$index])) {
                        $file = $request->file($field)[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $customeremergencyData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($customeremergencyId)) {
                    $customer->customeremergencies()->create($customeremergencyData);
                } else {
                    $customeremergency = CustomerEmergency::find($customeremergencyId);
                    if ($customeremergency) {
                        $customeremergency->update($customeremergencyData);
                    }
                }
            }

            //Customers Departments Data :
            $customerdepartmentsData = $request->input('customerdepartments', []);

foreach ($customerdepartmentsData as $index => $customerdepartmentData) {
                $customerdepartmentId = $customerdepartmentData['d_id'];

                $customerdepartmentFields = ['dept_photo', 'dept_ex_attach'];

                foreach ($customerdepartmentFields as $field) {
                    if ($request->hasFile($field) && isset($request->file($field)[$index])) {
                        $file = $request->file($field)[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $customerdepartmentData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($customerdepartmentId)) {
                    $customer->customerdepartments()->create($customerdepartmentData);
                } else {
                    $customerdepartment = CustomerDepartment::find($customerdepartmentId);
                    if ($customerdepartment) {
                        $customerdepartment->update($customerdepartmentData);
                    }
                }
            }

            //Customers Inspections Data :

            $customerinspectionsData = $request->input('customerinspections', []);

            foreach ($customerinspectionsData as $index => $customerinspectionData) {
                $customerinspectionId = $customerinspectionData['i_id'] ?? null;

                $customerinspectionFields = ['inspection_pic', 'inspection_attach'];

                foreach ($customerinspectionFields as $field) {
                    if ($request->hasFile("customerinspections.{$index}.{$field}")) {
                        $files = $request->file("customerinspections.{$index}.{$field}");
                        if (is_array($files)) {
                            $filePaths = [];
                            foreach ($files as $file) {
                                $extension = $file->getClientOriginalExtension();
                                $file_name = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();
                                $file->move(public_path('uploads/images'), $file_name);
                                $filePaths[] = 'uploads/images/' . $file_name;
                            }
                            $customerinspectionData[$field] = json_encode($filePaths); // Store as JSON array if multiple
                        } else {
                            $extension = $files->getClientOriginalExtension();
                            $file_name = time() . '_' . $files->getClientOriginalName();
                            $files->move(public_path('uploads/images'), $file_name);
                            $customerinspectionData[$field] = 'uploads/images/' . $file_name;
                        }
                    }
                }

                if (empty($customerinspectionId)) {
                    $customerinspectionData['customers_id'] = $customer->id;
                    $customer->customerinspections()->create($customerinspectionData);
                } else {
                    $customerinspection = CustomerInspection::find($customerinspectionId);
                    if ($customerinspection) {
                        $customerinspection->update($customerinspectionData);
                    }
                }
            }

            //Customers Armourer Data :

            $customerarmsData = $request->input('customerarmourers', []);

            foreach ($customerarmsData as $customerarmData) {
                $customerarmId = $customerarmData['a_id']; // Update the variable name to reflect the correct ID

                $customerarmFields = ['arm_pic_b', 'arm_pic_a', 'arm_cost_bill', 'arm_auth_attach'];

                foreach ($customerarmFields as $field) {
                    if ($request->hasFile($field) && isset($customerarmData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $customerarmData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($customerarmId)) {
                    $customer->customerarmourers()->create($customerarmData);
                } else {
                    $customerarm = CustomerArmourer::find($customerarmId);
                    if ($customerarm) {
                        $customerarm->update($customerarmData);
                    }
                }
            }

            //Customers Incident Form Data :

            $customerincidentsData = $request->input('customerincidents', []);

            foreach ($customerincidentsData as $customerincidentData) {
                $customerincidentId = $customerincidentData['in_id'];

                $customerincidentFields = ['incident_attach'];

                foreach ($customerincidentFields as $field) {
                    if ($request->hasFile($field) && isset($customerincidentData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $customerincidentData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($customerincidentId)) {
                    $customer->customerincidents()->create($customerincidentData);
                } else {
                    $customerincident = CustomerIncident::find($customerincidentId);
                    if ($customerincident) {
                        $customerincident->update($customerincidentData);
                    }
                }
            }

            //Customers Assignment Form Data :

            $customerassigmentsData = $request->input('customerassigments', []);

            foreach ($customerassigmentsData as $customerassigmentData) {
                $customerassigmentId = $customerassigmentData['asig_id'];

                $customerassigmentFields = ['asig_ex_attach'];

                foreach ($customerassigmentFields as $field) {
                    if ($request->hasFile($field) && isset($customerassigmentData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $customerassigmentData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($customerassigmentId)) {
                    $customer->customerassigments()->create($customerassigmentData);
                } else {
                    $customerassigment = CustomerAssigment::find($customerassigmentId);
                    if ($customerassigment) {
                        $customerassigment->update($customerassigmentData);
                    }
                }
            }

            //Customers Audits Form Data :

            $customerauditsData = $request->input('customeraudits', []);

            foreach ($customerauditsData as $customerauditData) {
                $customerauditId = $customerauditData['au_id'];

                $customerauditFields = ['audit_attach', 'audit_ex_attach'];

                foreach ($customerauditFields as $field) {
                    if ($request->hasFile($field) && isset($customerauditData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $customerauditData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($customerauditId)) {
                    $customer->customeraudits()->create($customerauditData);
                } else {
                    $customeraudit = CustomerAudits::find($customerauditId);
                    if ($customeraudit) {
                        $customeraudit->update($customerauditData);
                    }
                }
            }

            //Customers Bussiness Data :

            $customerbussinessesData = $request->input('customerbussinesses', []);

            foreach ($customerbussinessesData as $customerbussinessData) {
                $customerbussinessId = $customerbussinessData['b_id'];

                $customerbussinessFields = ['bussiness_photo', 'bussiness_attach'];

                foreach ($customerbussinessFields as $field) {
                    if ($request->hasFile($field) && isset($customerbussinessData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $customerbussinessData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($customerbussinessId)) {
                    $customer->customerbussinesses()->create($customerbussinessData);
                } else {
                    $customerbussiness = CustomerBussiness::find($customerbussinessId);
                    if ($customerbussiness) {
                        $customerbussiness->update($customerbussinessData);
                    }
                }
            }

            //Promotional Activities :

            $customeractivitiesData = $request->input('customeractivities', []);

            foreach ($customeractivitiesData as $customeractivityData) {
                $customeractivityId = $customeractivityData['act_id'];

                $customeractivityFields = ['promotional_attach'];

                foreach ($customeractivityFields as $field) {
                    if ($request->hasFile($field) && isset($customeractivityData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $customeractivityData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($customeractivityId)) {
                    $customer->customeractivities()->create($customeractivityData);
                } else {
                    $customeractivity = CustomerActivities::find($customeractivityId);
                    if ($customeractivity) {
                        $customeractivity->update($customeractivityData);
                    }
                }
            }

            //Feedbacks Data :

            $customerfeedbacksData = $request->input('customerfeedbacks', []);

            foreach ($customerfeedbacksData as $customerfeedbackData) {
                $customerfeedbackId = $customerfeedbackData['f_id'];

                $customerfeedbackFields = ['feed_attach'];

                foreach ($customerfeedbackFields as $field) {
                    if ($request->hasFile($field) && isset($customerfeedbackData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $customerfeedbackData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($customerfeedbackId)) {
                    $customer->customerfeedbacks()->create($customerfeedbackData);
                } else {
                    $customerfeedback = CustomerFeedback::find($customerfeedbackId);
                    if ($customerfeedback) {
                        $customerfeedback->update($customerfeedbackData);
                    }
                }
            }

            //Complaints Data :

            $customercomplaintsData = $request->input('customercomplaints', []);

            foreach ($customercomplaintsData as $customercomplaintData) {
                $customercomplaintId = $customercomplaintData['com_id'];

                $customercomplaintFields = [
                    'complaint_guard_attach',
                    'wue_attach',
                    'fd_attach',
                    'src_attach',
                    'mng_attach',
                    'complaint_picture',
                    'details_attach',
                    'complaint_addressed_attach',
                ];

                foreach ($customercomplaintFields as $field) {
                    if ($request->hasFile($field) && isset($customercomplaintData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $customercomplaintData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($customerfeedbackId)) {
                    $customer->customercomplaints()->create($customercomplaintData);
                } else {
                    $customercomplaint = CustomerComplaint::find($customercomplaintId);
                    if ($customercomplaint) {
                        $customercomplaint->update($customercomplaintData);
                    }
                }
            }

            //Notifications Data :

            $customernotificationsData = $request->input('customernotifications', []);

            foreach ($customernotificationsData as $customernotificationData) {
                $customernotificationId = $customernotificationData['n_id'];

                $customernotificationFields = ['notification_attach', 'notification_ex_attach'];

                foreach ($customernotificationFields as $field) {
                    if ($request->hasFile($field) && isset($customernotificationData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $customernotificationData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($customernotificationId)) {
                    $customer->customernotifications()->create($customernotificationData);
                } else {
                    $customernotification = CustomerNotification::find($customernotificationId);
                    if ($customernotification) {
                        $customernotification->update($customernotificationData);
                    }
                }
            }
            DB::commit();
            $customerId = $customer->id;

            if ($customer->notification_status == 1) {
                    $viewUrl = route('viewcustomer', ['id' => $customer->id]);

                    // 1. Send WhatsApp Confirmation to the Primary Customer Number (if available)
                    $primaryPhone = $customer->whatsapp_number ?: $customer->phone;
                    if (!empty($primaryPhone)) {
                        try {
                            app(WhatsAppNotificationManager::class)->sendCustomerUpdate(
                                to: $primaryPhone,
                                recipientName: $customer->customers_name,
                                customerId: $customer->id,
                                deptName: 'Head Office',
                                viewUrl: $viewUrl,
                                userModel: $customer
                            );
                            Log::info('Update confirmation WhatsApp sent to primary customer cell: ' . $primaryPhone);
                        } catch (\Exception $e) {
                            Log::error('Error sending WhatsApp to primary customer ' . $primaryPhone . ': ' . $e->getMessage());
                        }
                    }else{

                            Log::info('WhatsApp not sent to primary customer cell: '. $primaryPhone);
                        }

                    // 2. Send Email and/or WhatsApp to Department POCs
                    foreach ($customerdepartmentsData as $department) {
                        // Send Email if dept_email is provided
                        if (!empty($department['dept_email'])) {
                            try {
                                Mail::to($department['dept_email'])->send(
                                    new DepartmentConfirmationMail($customer, $department)
                                );
                                Log::info('Update confirmation email sent to dept_email: ' . $department['dept_email']);
                            } catch (\Exception $e) {
                                Log::error('Error sending email to dept_email ' . $department['dept_email'] . ': ' . $e->getMessage());
                            }
                        }

                        // Send WhatsApp if dept_cell is provided
                        if (!empty($department['dept_cell'])) {
                            try {
                                app(WhatsAppNotificationManager::class)->sendCustomerUpdate(
                                    to: $department['dept_cell'],
                                    recipientName: $customer->customers_name,
                                    customerId: $customer->id,
                                    deptName: $department['dept_name'] ?? '-',
                                    viewUrl: $viewUrl,
                                    userModel: $customer
                                );
                                Log::info('Update confirmation WhatsApp sent to dept_cell: ' . $department['dept_cell']);
                            } catch (\Exception $e) {
                                Log::error('Error sending WhatsApp to dept_cell ' . $department['dept_cell'] . ': ' . $e->getMessage());
                            }
                        }else{
                            Log::info('WhatsApp not sent to dept_cell: ');
                        }
                    }
                } else {
                    Log::info('Update confirmation email skipped. Customer notification status is OFF.');
                }
                
            // Send email to all POCs (sign_email and dept_email) if save_and_email is clicked
            if ($request->has('save_and_email')) {
                
                $url = route('viewcustomer', ['id' => $customerId]);
                if ($customer->notification_status == 1) {
                    return redirect()->to($url)->with('success', 'Customer data updated and emails sent to POCs and department contacts.');
                } else {
                    return redirect()->to($url)->with('success', 'Customer data updated. Emails skipped: Notification status is OFF.');
                }
            } elseif ($request->has('save_and_share')) {
                return redirect()->route('postcustomer')->with('success', 'Customer data updated successfully.')->with('customerId', $customerId);
            } elseif ($request->has('save_and_new')) {
                return redirect()->route('postcustomer')->with('success', 'Customer data updated successfully.');
            } else {
                return redirect()->route('customer')->with('success', 'Customer data updated successfully.');
            }
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('An error occurred while updating Customer data: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while updating data.');
        }
    }


    public function deletecustomer($id)
    {
        DB::beginTransaction();

        try {
            $customer = Customer::find($id);

            if (!$customer) {
                return redirect()->back()->with('error', 'Customer record not found.');
            }

            $customer->customersignatories()->delete();
            $customer->customersalary()->delete();
            $customer->customermanpowers()->delete();
            $customer->customeremergencies()->delete();
            $customer->customerdepartments()->delete();
            $customer->customerinspections()->delete();
            $customer->customerarmourers()->delete();
            $customer->customerincidents()->delete();
            $customer->customerassigments()->delete();
            $customer->customeraudits()->delete();
            $customer->customerbussinesses()->delete();
            $customer->customeractivities()->delete();
            $customer->customerfeedbacks()->delete();
            $customer->customercomplaints()->delete();
            $customer->customernotifications()->delete();
            $customer->delete();

            // Notify about deletion
            $whatsappTo = !empty($customer->whatsapp_number) ? $customer->whatsapp_number : $customer->phone;
            if (!empty($whatsappTo)) {
                app(WhatsAppNotificationManager::class)->sendCustomerReport(
                    to: $whatsappTo,
                    recipientName: $customer->customers_name,
                    date: now()->format('Y-m-d'),
                    userModel: $customer
                );
            }

            DB::commit();

            return redirect()->back()->with('success', 'Customer record deleted successfully.');
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('An error occurred while deleting Customer record: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while deleting the Customer record.');
        }
    }

    //Currencies

    public function currency()
    {
        $currencies = Currency::all();
        return view('customers.currency', compact('currencies'));
    }

    public function postcurrency(Request $request)
    {
        $currencies = new Currency;
        $currencies->currency_name = $request->input('currency_name');
        $currencies->save();
        return redirect()->back();
    }

    public function destroycurrency($id)
    {
        $currencies = Currency::find($id);

        if ($currencies) {
            $currencies->delete();
            return redirect()->back()->with('success', 'Currency deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Currency  not found.');
        }
    }

    //Complianes

    public function compliance()
    {
        $compliances = Compliance::all();
        return view('customers.compliance', compact('compliances'));
    }

    public function postcompliance(Request $request)
    {
        $compliances = new Compliance;
        $compliances->compliance_name = $request->input('compliance_name');
        $compliances->save();
        return redirect()->back();
    }


    public function destroycompliance($id)
    {
        $compliances = Compliance::find($id);

        if ($compliances) {
            $compliances->delete();
            return redirect()->back()->with('success', 'Compliance deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Compliance not found.');
        }
    }

    //Departments

    public function department()
    {
        $departments = Department::all();
        return view('customers.department', compact('departments'));
    }

    public function postdepartment(Request $request)
    {
        $departments = new Department();
        $departments->department_name = $request->input('department_name');
        $departments->save();
        return redirect()->back();
    }

    public function destroydepartment($id)
    {
        $departments = Department::find($id);

        if ($departments) {
            $departments->delete();
            return redirect()->back()->with('success', 'Department deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Department not found.');
        }
    }

    //Categories

    public function category()
    {
        $categories = Category::all();
        return view('customers.category', compact('categories'));
    }

    public function postcategory(Request $request)
    {
        $categories = new Category();
        $categories->category_name = $request->input('category_name');
        $categories->save();
        return redirect()->back();
    }

    public function destroycustomercategory($id)
    {
        $categories = Category::find($id);

        if ($categories) {
            $categories->delete();
            return redirect()->back()->with('success', 'Category deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Category not found.');
        }
    }

    //Guard Posts

    public function guardpost()
    {
        $guardposts = Guardpost::all();
        return view('customers.guardpost', compact('guardposts'));
    }

    public function postguard(Request $request)
    {
        $guardposts = new Guardpost();
        $guardposts->guard_post = $request->input('guard_post');
        $guardposts->save();
        return redirect()->back();
    }

    public function destroyguardpost($id)
    {
        $guardposts = Guardpost::find($id);

        if ($guardposts) {
            $guardposts->delete();
            return redirect()->back()->with('success', 'Guard Post deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Guard Post not found.');
        }
    }

    //SAOB Categories

    public function saob_category()
    {
        $saobcategories = SaobCategory::all();
        return view('customers.saobcategory', compact('saobcategories'));
    }

    public function postsaob_category(Request $request)
    {
        $saobcategories = new SaobCategory();
        $saobcategories->saob_category_name = $request->input('saob_category_name');
        $saobcategories->save();
        return redirect()->back();
    }

    public function destroycustomersaob_category($id)
    {
        $saobcategories = SaobCategory::find($id);

        if ($saobcategories) {
            $saobcategories->delete();
            return redirect()->back()->with('success', 'Category deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Category not found.');
        }
    }

    //Emergency Services
    public function emerser()
    {
        $emerser = Emerser::all();
        return view('customers.emerser', compact('emerser'));
    }

    public function postemerser(Request $request)
    {
        $emerser = new Emerser();
        $emerser->emerser_name = $request->input('emerser_name');
        $emerser->save();
        return redirect()->back();
    }

    public function destroycustomeremerser($id)
    {
        $emerser = Emerser::find($id);

        if ($emerser) {
            $emerser->delete();
            return redirect()->back()->with('success', 'Category deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Category not found.');
        }
    }
    //Audits Checkedby
    public function checkedby()
    {
        $checkedby = Checkedby::all();
        return view('customers.checkedby', compact('checkedby'));
    }

    public function postcheckedby(Request $request)
    {
        $checkedby = new Checkedby();
        $checkedby->checkedby_name = $request->input('checkedby_name');
        $checkedby->save();
        return redirect()->back();
    }

    public function destroycustomercheckedby($id)
    {
        $checkedby = Checkedby::find($id);

        if ($checkedby) {
            $checkedby->delete();
            return redirect()->back()->with('success', 'Category deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Category not found.');
        }
    }
    //Monthly performance review report
    public function mpoc()
    {
        $mpoc = mpoc::all();
        return view('customers.mpoc', compact('mpoc'));
    }

    public function postmpoc(Request $request)
    {
        $mpoc = new mpoc();
        $mpoc->mpoc_name = $request->input('mpoc_name');
        $mpoc->save();
        return redirect()->back();
    }

    public function destroycustomermpoc($id)
    {
        $mpoc = mpoc::find($id);

        if ($mpoc) {
            $mpoc->delete();
            return redirect()->back()->with('success', 'Category deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Category not found.');
        }
    }

    //Promotional Activities

    public function activities()
    {
        $activities = Activities::all();
        return view('customers.activities', compact('activities'));
    }

    public function postactivity(Request $request)
    {
        $activities = new Activities;
        $activities->activity_name = $request->input('activity_name');
        $activities->save();
        return redirect()->back();
    }

    public function destroyactivity($id)
    {
        $activities = Activities::find($id);

        if ($activities) {
            $activities->delete();
            return redirect()->back()->with('success', 'Activity deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Activity not found.');
        }
    }

    //Guards Duty

    public function duties()
    {
        $duties = Duties::all();
        return view('customers.duties', compact('duties'));
    }

    public function postduty(Request $request)
    {
        $duties = new Duties;
        $duties->duty_name = $request->input('duty_name');
        $duties->save();
        return redirect()->back();
    }

    public function destroyduty($id)
    {
        $duties = Duties::find($id);

        if ($duties) {
            $duties->delete();
            return redirect()->back()->with('success', 'Duty deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Duty not found.');
        }
    }

    // Guards Finances

    public function finances()
    {
        $finances = Finance::all();
        return view('customers.finances', compact('finances'));
    }

    public function postfinance(Request $request)
    {
        $finances = new Finance;
        $finances->finance_name = $request->input('finance_name');
        $finances->save();
        return redirect()->back();
    }

    public function destroyfinance($id)
    {
        $finances = Finance::find($id);

        if ($finances) {
            $finances->delete();
            return redirect()->back()->with('success', 'Finance deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Finance not found.');
        }
    }

    //Guards Equipments

    public function equipments()
    {
        $equipments = Equipments::all();
        return view('customers.equipments', compact('equipments'));
    }

    public function postequipment(Request $request)
    {
        $equipments = new Equipments;
        $equipments->equipment_name = $request->input('equipment_name');
        $equipments->save();
        return redirect()->back();
    }

    public function destroyequipment($id)
    {
        $equipments = Equipments::find($id);

        if ($equipments) {
            $equipments->delete();
            return redirect()->back()->with('success', 'Equipment deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Equipment not found.');
        }
    }

    //Source of Complaints

    public function sources()
    {
        $sources = Sources::all();
        return view('customers.sources', compact('sources'));
    }

    public function postsource(Request $request)
    {
        $sources = new Sources;
        $sources->source_name = $request->input('source_name');
        $sources->save();
        return redirect()->back();
    }

    public function destroysource($id)
    {
        $sources = Sources::find($id);

        if ($sources) {
            $sources->delete();
            return redirect()->back()->with('success', 'Source deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Source not found.');
        }
    }

    //Complaint Tagged To :

    public function complaintto()
    {
        $complaintsto = ComplaintTaggedTo::all();
        return view('customers.complaintto', compact('complaintsto'));
    }

    public function postcomplaintto(Request $request)
    {
        $complaintsto = new ComplaintTaggedTo;
        $complaintsto->tagged_to_name = $request->input('tagged_to_name');
        $complaintsto->save();
        return redirect()->back();
    }

    public function destroycomplaintto($id)
    {
        $complaintsto = ComplaintTaggedTo::find($id);

        if ($complaintsto) {
            $complaintsto->delete();
            return redirect()->back()->with('success', 'Complaintsto deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Complaintsto not found.');
        }
    }

    //Complaint Addressed By :

    public function complaintby()
    {
        $complaintsby = ComplaintAddressedBy::all();
        return view('customers.complaintby', compact('complaintsby'));
    }

    public function postcomplaintby(Request $request)
    {
        $complaintsby = new ComplaintAddressedBy;
        $complaintsby->addressed_by_name = $request->input('addressed_by_name');
        $complaintsby->save();
        return redirect()->back();
    }

    public function destroycomplaintby($id)
    {
        $complaintsby = ComplaintAddressedBy::find($id);

        if ($complaintsby) {
            $complaintsby->delete();
            return redirect()->back()->with('success', 'ComplaintsBy deleted successfully');
        } else {
            return redirect()->back()->with('error', 'ComplaintsBy not found.');
        }
    }

    //Notifications Related tO :

    public function notifications()
    {
        $notifications = Notification::all();
        return view('customers.notifications', compact('notifications'));
    }

    public function postnotification(Request $request)
    {
        $notifications = new Notification;
        $notifications->notification_name = $request->input('notification_name');
        $notifications->save();
        return redirect()->back();
    }

    public function destroynotification($id)
    {
        $notifications = Notification::find($id);

        if ($notifications) {
            $notifications->delete();
            return redirect()->back()->with('success', 'Notification deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Notification not found.');
        }
    }

    //Notifications Shared With :

    public function notificationshared()
    {
        $notificationshared = NotificationShared::all();
        return view('customers.notificationshared', compact('notificationshared'));
    }

    public function postnotificationshared(Request $request)
    {
        $notificationshared = new NotificationShared;
        $notificationshared->notification_shared_name = $request->input('notification_shared_name');
        $notificationshared->save();
        return redirect()->back();
    }

    public function destroynotificationshared($id)
    {
        $notificationshared = NotificationShared::find($id);

        if ($notificationshared) {
            $notificationshared->delete();
            return redirect()->back()->with('success', 'Notification Shared deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Notification Shared not found.');
        }
    }

    public function deleteAttachment(Request $request)
    {
        $customer = Customer::find($request->customer_id);

        if ($customer) {
            $field = $request->type;

            if ($customer->$field) {
                $filePath = public_path($customer->$field);

                // Delete the file
                if (file_exists($filePath)) {
                    unlink($filePath);
                }

                // Remove the file path from the database
                $customer->$field = null;
                $customer->save();

                return response()->json(['success' => true, 'message' => ucfirst($field) . ' deleted successfully.']);
            }
        }

        return response()->json(['success' => false, 'message' => 'Attachment not found or already deleted.']);
    }

    public function notification_status($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->back()->with('error', 'Customer not found.');
        }

        // Toggle notification status
        $customer->notification_status = !$customer->notification_status;
        $customer->save();

        $status = $customer->notification_status ? 'enabled' : 'disabled';

        // Notify about status change via WhatsApp
        $whatsappTo = !empty($customer->whatsapp_number) ? $customer->whatsapp_number : $customer->phone;
        if (!empty($whatsappTo)) {
            app(WhatsAppNotificationManager::class)->sendCustomerReport(
                to: $whatsappTo,
                recipientName: $customer->customers_name,
                date: now()->format('Y-m-d'),
                userModel: $customer
            );
        }

        return redirect()->back()->with('success', 'Notifications have been ' . $status . ' for this customer.');
    }

public function update(Request $request, $id)
{ 
    $validator = Validator::make($request->all(), [
        'inspection_emp_id' => 'required|string|max:255',
        'inspection_no' => 'required|string|max:255',
        'inspection_emp_name' => 'required|string|max:255',
        'inspection_emp_cell' => 'required|string|max:20',
        'inspection_emp_dept' => 'required|string|max:255',
        'inspection_date' => 'required|date',
        'inspection_rem_petr'=> 'required|string|max:255',
        'inspection_note'=> 'required|string|max:255',

        'inspection_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',

        'inspection_attach' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp,mp4,avi,mov,pdf,doc,docx,xls,xlsx|max:51200', 
    ],[
        'inspection_attach.max' => 'Video/File is too large to upload. Maximum size allowed is 50MB.',
    ]);
 
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with('error','Video is too large to upload.');
    }

    $inspection = CustomerInspection::findOrFail($id);
    $data = $request->all();

    $uploadPath = public_path('uploads/inspections');
    if (!file_exists($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    if ($request->hasFile('inspection_pic')) {
        $file = $request->file('inspection_pic');
        $file_name = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/images'), $file_name);
        $data['inspection_pic'] = 'uploads/images/' . $file_name;
    }

    if ($request->hasFile('inspection_attach')) {
        $file = $request->file('inspection_attach');
        $file_name = time().'_'.uniqid().'_'.$file->getClientOriginalName();
        $file->move($uploadPath, $file_name);
        $data['inspection_attach'] = 'uploads/inspections/'.$file_name;
    }

    $inspection->update($data);

    return redirect()->back()->with('success','Inspection updated successfully.');
}

public function destroy($id)
{
    try {
        $inspection = CustomerInspection::findOrFail($id);

        // Delete files
        if ($inspection->inspection_pic && file_exists(public_path($inspection->inspection_pic))) {
            unlink(public_path($inspection->inspection_pic));
        }

        if ($inspection->inspection_attach && file_exists(public_path($inspection->inspection_attach))) {
            unlink(public_path($inspection->inspection_attach));
        }

        $inspection->delete();

        return redirect()->back()->with('success', 'Inspection deleted successfully.');
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return redirect()->back()->with('error', 'Inspection not found.');
    } catch (\Exception $e) {
        \Log::error('Error deleting inspection: '.$e->getMessage());
        return redirect()->back()->with('error', 'An error occurred while deleting the inspection.');
    }
}
}

