<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\ChamberController;
use App\Http\Controllers\CorporateController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\EmployeeLeaveController;
use App\Http\Controllers\HrmController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\InternalDispatchController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\LmsController;
use App\Http\Controllers\PayRollEmployeeController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RegulatoryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\RequisitionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SalesPlanningController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UniformRecordController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\WeaponRecordControler;
use App\Http\Controllers\WhatsappController;
use App\Http\Controllers\WhatsAppTestController;
use App\Mail\ArmourerVisitReminder;
use App\Models\Customer;
use App\Models\CustomerArmourer;
use App\Models\ReminderNotification;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


use App\Models\Hrm;
use App\Services\WhatsApp\WhatsAppNotificationManager;

Route::get('/test-whatsapp-normal', function () {
    // 1. Find the latest HRM record that has an interaction timestamp
    $hrm = Hrm::whereNotNull('last_whatsapp_interaction_at')
        ->latest('last_whatsapp_interaction_at')
        ->first();

    if (!$hrm) {
        return "No HRM found with an active WhatsApp session. Please send a template message first.";
    }

    $manager = app(WhatsAppNotificationManager::class);

    // 2. Send a NORMAL text message (this will trigger the 'text' payload because user has a session)
    $result = $manager->send(
        phone: $hrm->cell,
        message: "Hello {$hrm->name}! This is a test of a NORMAL WhatsApp text message (outside of a template).",
        eventType: 'test_normal',
        user: $hrm
    );

    return response()->json([
        'status' => 'Testing Normal Message Flow',
        'hrm_id' => $hrm->id,
        'hrm_name' => $hrm->name,
        'whatsapp_result' => $result
    ]);
});



Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('test-mail', function () {
    $armourer = CustomerArmourer::with('customer')->first();
    return $armourer;
    if ($armourer && $armourer->customer && $armourer->customer->email) {
        Mail::to($armourer->customer->email)->send(new ArmourerVisitReminder($armourer));
        return 'Mail sent';
    }
    return 'No data';
});
Route::get('/home', [AuthController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware(['auth']);

Route::post('send-customer-email', [EmailController::class, 'send'])
    ->name('customer.email.send')
    ->middleware(['auth']);

Route::post('/admin/messages/send', [WhatsappController::class, 'send'])->name('admin.messages.send');

Route::get('/admin/whatsapp-test', [WhatsAppTestController::class, 'index'])->name('admin.whatsapp.test');
Route::post('/admin/whatsapp-test/send', [WhatsAppTestController::class, 'send'])->name('admin.whatsapp.test.send');

// Authentication
Route::get('/login', [AuthController::class, 'loadLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::post('/update-likes', [AdminController::class, 'updateLikes'])->name('update.likes');
Route::get('/admin/social', [AdminController::class, 'showSocials'])->name('admin.socials');

Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::get('/editadmin/{id}', [AdminController::class, 'editadmin'])->name('editadmin');
Route::get('/adminone', [AdminController::class, 'adminone'])->name('adminone');
Route::get('/postadmin', [AdminController::class, 'postadmin']);
Route::post('/submitadmin', [AdminController::class, 'submitadmin'])->name('submitadmin');
Route::put('/update_admin/{id}', [AdminController::class, 'update_admin'])->name('update_admin');
Route::get('/viewadmin/{id}', [AdminController::class, 'viewadmin'])->name('viewadmin');
Route::get('/crotask/{id}', [AdminController::class, 'crotask'])->name('crotask');
Route::post('/send-pdf-email', [AdminController::class, 'sendPDFViaEmail']);
Route::delete('/deleteadmin/{id}', [AdminController::class, 'deleteAdmin'])->name('deleteadmin');
Route::get('/admin/search', [AdminController::class, 'search'])->name('search.admins');
Route::get('/admin/search_baranceshes', [AdminController::class, 'search_baranceshes'])->name('search_baranceshes.admins');
Route::post('/upload-sales-register-report', [AdminController::class, 'upload_sales_register_report'])->name('sales.register.report');
Route::get('/admin/moveable/assets', [AdminController::class, 'admin_moveable_assets'])->name('admin.moveable.assets');
Route::get('/client-report', [AdminController::class, 'clientReport'])->name('admin.client');
Route::get('/get-branches/{category}', [AdminController::class, 'getBranches']);

// Admin Office Equipments
Route::get('adminequipments', [AdminController::class, 'adminequipments'])->name('adminequipments');
Route::post('postadminequipment', [AdminController::class, 'postadminequipment'])->name('postadminequipment');
Route::delete('/adminequipment/{id}', [AdminController::class, 'deleteadminequipment'])->name('deleteadminequipment');

// Reporting To branch
Route::get('reporting', [AdminController::class, 'reporting'])->name('reporting');
Route::post('postreporting', [AdminController::class, 'postreporting'])->name('postreporting');
Route::delete('/reporting/{id}', [AdminController::class, 'deletereporting'])->name('deleteReporting');

Route::get('all/cros', [AdminController::class, 'all_cros'])->name('all.cros');
Route::post('post/cro', [AdminController::class, 'postcro'])->name('post.cro');
Route::delete('/delete/cro/{id}', [AdminController::class, 'delete_cro'])->name('delete.cro');
Route::get('/reports/cro/{id}', [AdminController::class, 'cro_reports'])->name('reports.cro');
Route::get('/dispatches/cro/{id}', [AdminController::class, 'cro_dispatches'])->name('dispatches.cro');

Route::get('task/group', [AdminController::class, 'task_group'])->name('taskgroup');
Route::post('posttask_group', [AdminController::class, 'posttask_group'])->name('posttask_group');
Route::delete('/task_group/{id}', [AdminController::class, 'deletetask_group'])->name('deletetask_group');
Route::put('/taskgroups/{id}', [AdminController::class, 'update_taskgroup'])->name('updatetask_group');

Route::get('cro/tasks', [AdminController::class, 'all_cros_tasks'])->name('all_cros_tasks');
Route::post('postcro/tasks', [AdminController::class, 'postcro_tasks'])->name('postcro_tasks');
Route::get('/get-next-task-number/{section_number}', [AdminController::class, 'getNextTaskNumber']);
Route::delete('/delete/cro/task/{id}', [AdminController::class, 'deletecro_task'])->name('deletecro_tasks');
Route::put('/cro_tasks/update/{id}', [AdminController::class, 'update_crotask'])->name('updatecro_tasks');

Route::get('/register', [AdminController::class, 'showRegister'])->name('register.index');
Route::post('/crotask/{id}/save', [AdminController::class, 'storeTaskAssignments'])->name('store.task.assignments');
Route::get('/search/crotask', [AdminController::class, 'search_crotask'])->name('searchcrotask');

// Rental Property Details
Route::get('/rental', [AdminController::class, 'rental']);
Route::get('/rental/details/search', [AdminController::class, 'rental_details_search'])->name('rental.details.search');
Route::get('/viewrental/{id}', [AdminController::class, 'showrental'])->name('viewrental');
Route::get('/rental/property/record/search', [AdminController::class, 'rental_property_record_search'])->name('rental.property.record.search');

Route::get('/postrental', [AdminController::class, 'postrental']);
Route::post('/store_rental', [AdminController::class, 'store_rental'])->name('store_rental');
Route::get('/editrental/{id}', [AdminController::class, 'editrental'])->name('editrental');

Route::delete('/deleterental/{id}', [AdminController::class, 'deleteRental'])->name('deleterental');
Route::post('/updaterental/{id}', [AdminController::class, 'updaterental'])->name('updaterental');

Route::post('/task-record-dairy', [AdminController::class, 'task_record_dairy'])->name('admin.task_record_dairy');
Route::get('/search-task-record-dairy', [AdminController::class, 'search_task_record_dairy'])->name('search_task_record_dairy');
// Hrm
Route::post('/notices/store', [AdminController::class, 'notices_store'])->name('notice.store');
Route::get('/notices/delete/{id}', [AdminController::class, 'notices_destroy'])->name('notice.delete');
Route::get('/search-notice-log-sheet', [AdminController::class, 'search_notice_log_sheet'])->name('search_notice_log_sheet');

Route::get('hrm', [HrmController::class, 'hrm'])->name('hrm');
Route::get('hrm/delete/{id}', [HrmController::class, 'delete_hrm'])->name('delete_hrm');
Route::post('/save-items', [HrmController::class, 'saveItems'])->name('save.items');

// My changes start
Route::get('/viewhrm/{id}', [HrmController::class, 'showhrm'])->name('viewhrm');
Route::get('/viewguarantors/{id}', [HrmController::class, 'showguarantors'])->name('viewguarantors');
Route::get('/search-hrms', [HrmController::class, 'search'])->name('search.hrms');
Route::get('/staff/details/search', [HrmController::class, 'staff_details_search'])->name('staff.details.search');
Route::get('customer/guards/{id}', [HrmController::class, 'getcustomerGuards'])->name('getcustomer.guards');

// changes end

Route::get('posthrm', [HrmController::class, 'posthrm'])->name('posthrm');
Route::post('submit_hrm', [HrmController::class, 'submit_hrm'])->name('submit_hrm');
Route::get('edithrm/{id}', [HrmController::class, 'edithrm'])->name('edithrm');
Route::delete('/deletehrm/{id}', [HrmController::class, 'deletehrm'])->name('deletehrm');
Route::put('/update_hrm/{id}', [HrmController::class, 'update_hrm'])->name('update_hrm');

// Hrm Categories
Route::get('hrmcategory', [HrmController::class, 'hrmcategory'])->name('hrmcategory');
Route::post('posthrmcategory', [HrmController::class, 'posthrmcategory'])->name('posthrmcategory');
Route::get('/categories/{id}/edit', [HrmController::class, 'edit'])->name('editCategory');
Route::put('/categories/{id}', [HrmController::class, 'update'])->name('updateCategory');
Route::delete('/categories/{id}', [HrmController::class, 'destroy'])->name('deleteCategory');

Route::get('/observation/type/add', [HrmController::class, 'addObservation'])->name('Observation.add');
Route::post('/observation/type/store', [HrmController::class, 'storeobservation'])->name('observation.store');
Route::delete('/observation/type/delete/{id}', [HrmController::class, 'deleteeobservation'])->name('observation.delete');

//Hrm Hired At
Route::get('hiredat', [HrmController::class, 'hiredat'])->name('hiredat');
Route::post('posthiredat', [HrmController::class, 'posthiredat'])->name('posthiredat');
Route::delete('/hiredat/{id}', [HrmController::class, 'deletehiredat'])->name('deletehiredat');

//Designations ..
Route::get('designation', [HrmController::class, 'designation'])->name('designation');
Route::post('postdesignation', [HrmController::class, 'postdesignation'])->name('postdesignation');
Route::delete('designation/{id}', [HrmController::class, 'destroydesignation'])->name('deleteDesignation');
Route::get('designation/{id}/edit', [HrmController::class, 'editdesignation'])->name('editDesignation');
Route::put('designation/{id}', [HrmController::class, 'updatedesignation'])->name('updateDesignation');

//Hrm Fall In EOBI Cities :
Route::get('eobi', [HrmController::class, 'eobi'])->name('eobi');
Route::post('posteobi', [HrmController::class, 'posteobi'])->name('posteobi');
Route::get('/eobi/{id}/edit', [HrmController::class, 'editeobi'])->name('editEobi');
Route::put('/eobi/{id}', [HrmController::class, 'updateeobi'])->name('updateEobi');
Route::delete('/eobi/{id}', [HrmController::class, 'destroyeobi'])->name('deleteEobi');

// Hrm Fall In EOBI Cities (Social Security) :
Route::get('social', [HrmController::class, 'social'])->name('social');
Route::post('postsocial', [HrmController::class, 'postsocial'])->name('postsocial');
Route::get('social/{id}/edit', [HrmController::class, 'editsocial'])->name('editSocial');
Route::put('social/{id}', [HrmController::class, 'updatesocial'])->name('updateSocial');
Route::delete('social/{id}', [HrmController::class, 'destroysocial'])->name('deleteSocial');

//Hrm Diseases :
Route::get('disease', [HrmController::class, 'disease'])->name('disease');
Route::post('postdisease', [HrmController::class, 'postdisease'])->name('postdisease');
Route::get('diseases/{id}/edit', [HrmController::class, 'editdisease'])->name('editDisease');
Route::put('diseases/{id}', [HrmController::class, 'updatedisease'])->name('updateDisease');
Route::delete('diseases/{id}', [HrmController::class, 'destroydisease'])->name('deleteDisease');
Route::post('/send-pdf-email', [HrmController::class, 'sendPDFViaEmail']);

Route::post('/hrm/import', [HrmController::class, 'import'])->name('hrm.import');

//Regulatory Affairs :-
//Regulator
Route::get('regulator', [RegulatoryController::class, 'regulator'])->name('regulator');
Route::get('postregulator', [RegulatoryController::class, 'postregulator'])->name('postregulator');
Route::post('submit_regulator', [RegulatoryController::class, 'submit_regulator'])->name('submit_regulator');
Route::get('editregulator/{id}', [RegulatoryController::class, 'editregulator'])->name('editregulator');
Route::put('/update_regulator/{id}', [RegulatoryController::class, 'update_regulator'])->name('update_regulator');
Route::delete('/deleteregulator/{id}', [RegulatoryController::class, 'deleteregulator'])->name('deleteregulator');
Route::get('viewregulator/{id}', [RegulatoryController::class, 'viewregulator'])->name('viewregulator');
Route::get('regulator/delete/{id}', [RegulatoryController::class, 'regulator_delete'])->name('regulator_delete');

Route::post('/send-pdf-email', [RegulatoryController::class, 'sendPDFViaEmail']);

//Corporate
Route::get('corporate', [CorporateController::class, 'corporate'])->name('corporate');
Route::get('postcorporate', [CorporateController::class, 'postcorporate'])->name('postcorporate');
Route::post('submit_corporate', [CorporateController::class, 'submit_corporate'])->name('submit_corporate');
Route::get('editcorporate/{id}', [CorporateController::class, 'editcorporate'])->name('editcorporate');
Route::put('/update_corporate/{id}', [CorporateController::class, 'update_corporate'])->name('update_corporate');
Route::delete('/deletecorporate/{id}', [CorporateController::class, 'deletecorporate'])->name('deletecorporate');
Route::get('viewcorporate/{id}', [CorporateController::class, 'viewcorporate'])->name('viewcorporate');
Route::get('corporate/delete/{id}', [CorporateController::class, 'corporate_delete'])->name('corporate_delete');
Route::post('/send-pdf-email', [CorporateController::class, 'sendPDFViaEmail']);

//Chamber
Route::get('chamber', [ChamberController::class, 'chamber'])->name('chamber');
Route::get('postchamber', [ChamberController::class, 'postchamber'])->name('postchamber');
Route::post('submitchamber', [ChamberController::class, 'submitchamber'])->name('submitchamber');
Route::get('editchamber/{id}', [ChamberController::class, 'editchamber'])->name('editchamber');
Route::delete('/deletechamber/{id}', [ChamberController::class, 'deletechamber'])->name('deletechamber');
Route::put('/update_chamber/{id}', [ChamberController::class, 'update_chamber'])->name('update_chamber');
Route::get('viewchamber/{id}', [ChamberController::class, 'viewchamber'])->name('viewchamber');
Route::post('/send-pdf-email', [ChamberController::class, 'sendPDFViaEmail']);

//Training
Route::get('train', [TrainingController::class, 'train'])->name('train');
Route::get('posttrain', [TrainingController::class, 'posttrain'])->name('posttrain');
Route::post('submit_train', [TrainingController::class, 'submit_train'])->name('submit_train');
Route::get('edittrain/{id}', [TrainingController::class, 'edittrain'])->name('edittrain');
Route::put('update_trainss/{id}', [TrainingController::class, 'update_trainss'])->name('update_trainss');
Route::put('update_train/{id}', [TrainingController::class, 'update_train'])->name('update_train');
Route::post('/checklist', [TrainingController::class, 'storechecklist'])->name('store.checklist');
Route::delete('/checklist-item/{id}', [TrainingController::class, 'deleteChecklistItem'])->name('checklist.delete');

Route::get('/deletetrain/{id}', [TrainingController::class, 'deletetrain'])->name('deletetrain');
Route::get('/check-training-number/{number}', [TrainingController::class, 'checkTrainingNumber'])
    ->where('number', '.*');

Route::prefix('trainings')->group(function () {
    Route::get('/trashed', [TrainingController::class, 'trashedTrainings'])->name('trainings.trashed');
    Route::post('/restore/{id}', [TrainingController::class, 'restoreTraining'])->name('trainings.restore');
    Route::delete('/force-delete/{id}', [TrainingController::class, 'forceDeleteTraining'])->name('trainings.forceDelete');
});

Route::get('/viewtrain/{id}', [TrainingController::class, 'viewtrain'])->name('viewtrain');
Route::get('/search/trainings', [TrainingController::class, 'search'])->name('search.trainings');

Route::get('payroll', [HrmController::class, 'payroll'])->name('payroll');
Route::get('print/payroll/{id}', [HrmController::class, 'print_payroll'])->name('print.payroll');
Route::get('payroll/delete/{id}', [HrmController::class, 'delete_payroll'])->name('delete.payroll');
Route::get('/search', [HrmController::class, 'payrollsearch']);

// Get all the guards in pdf
Route::get('/get-all-guards', [TrainingController::class, 'getAllGuards'])->name('get.all.guards');

// Categories :-
Route::get('type', [TrainingController::class, 'type'])->name('type');
Route::post('posttype', [TrainingController::class, 'posttype'])->name('posttype');
Route::delete('type/{id}', [TrainingController::class, 'destroytype'])->name('deleteType');

// Sending Email to Active Customers
Route::post('/send-email', [TrainingController::class, 'sendEmail']);
Route::post('/send-inactive-email', [TrainingController::class, 'sendInactiveEmail'])->name('send.inactive.email');
Route::post('/send-multiple-emails', [TrainingController::class, 'sendMultipleEmails']);
Route::post('/send-edit-multiple-emails', [TrainingController::class, 'sendEditMultipleEmails']);
Route::post('/send-multiple-inactive-email', [TrainingController::class, 'sendInactiveMultipleEmail']);
Route::post('/send-edit-multiple-inactive-email', [TrainingController::class, 'sendEditInactiveMultipleEmail']);
Route::post('/send-pdf-email', [TrainingController::class, 'sendPDFViaEmail']);
Route::post('trainings/import', [TrainingController::class, 'import'])->name('trainings.import');

// Customer
Route::get('customer', [CustomerController::class, 'customer'])->name('customer');
Route::get('/search-customers', [CustomerController::class, 'search'])->name('search.customers');
Route::get('postcustomer', [CustomerController::class, 'postcustomer'])->name('postcustomer');
Route::post('submit_customer', [CustomerController::class, 'submit_customer'])->name('submit_customer');
Route::get('editcustomer/{id}', [CustomerController::class, 'editcustomer'])->name('editcustomer');
Route::post('/delete-attachment', [CustomerController::class, 'deleteAttachment'])->name('delete.attachment');

Route::put('/update_customer/{id}', [CustomerController::class, 'update_customer'])->name('update_customer');
Route::get('/deletecustomer/{id}', [CustomerController::class, 'deletecustomer'])->name('deletecustomer');
Route::get('/viewcustomer/{id}', [CustomerController::class, 'viewcustomer'])->name('viewcustomer');
Route::get('/customers/{id}/sub-customers', [CustomerController::class, 'sub_customer'])->name('sub_customer');
Route::get('/subcustomers/{customer_id}/sub-customers', [CustomerController::class, 'getSubCustomers'])->name('sub_child_customers');
Route::get('/viewcustomerone/{id}', [CustomerController::class, 'viewcustomerone'])->name('viewcustomerone');


Route::put('/inspection/{id}', [CustomerController::class, 'update'])->name('inspection.update');
Route::delete('/inspection/{id}', [CustomerController::class, 'destroy'])->name('inspection.destroy');
Route::get('/getcustomer/{id}', [CustomerController::class, 'getCustomer'])->name('getcustomer');
Route::post('/send-report-email', [CustomerController::class, 'sendReportEmail']);
Route::post('/send-edit-report-email', [CustomerController::class, 'sendEditReportEmail']);
Route::post('/send-pdf-email', [CustomerController::class, 'sendPDFViaEmail']);
Route::get('/customers/{id}/notifications', [CustomerController::class, 'customer_notifications'])
    ->name('allnotifications');
Route::get('/notification/read/{id}', [CustomerController::class, 'markAsRead'])->name('notification.read');
Route::get('/notification-status/{id}', [CustomerController::class, 'notification_status'])->name('notification.status');

Route::post('/import-customers', [CustomerController::class, 'import'])->name('import.customers');
Route::get('/admin/search_customer', [CustomerController::class, 'search_customers'])->name('search_customer');
Route::get('/admin/search_customer_id', [CustomerController::class, 'search_customers_id'])->name('search_customer_id');
Route::get('/admin/search_customer_yearly', [CustomerController::class, 'search_customers_yearly'])->name('search_customer_yearly');

Route::get('webservilancecategory', [DropdownController::class, 'webservilancecategory'])->name('webservilancecategory.add');
Route::post('webservilancecategory/store', [DropdownController::class, 'webservilancecategorystore'])->name('webservilancecategory.store');
Route::delete('webservilancecategory/{id}', [DropdownController::class, 'webservilancecategorydelete'])->name('webservilancecategory.delete');

// Further Customer Requirements :-
Route::get('currency', [CustomerController::class, 'currency'])->name('currency');
Route::post('postcurrency', [CustomerController::class, 'postcurrency'])->name('postcurrency');
Route::delete('currency/{id}', [CustomerController::class, 'destroycurrency'])->name('deleteCurrency');
// Appicable Compliances :-
Route::get('compliance', [CustomerController::class, 'compliance'])->name('compliance');
Route::post('postcompliance', [CustomerController::class, 'postcompliance'])->name('postcompliance');
Route::delete('compliance/{id}', [CustomerController::class, 'destroycompliance'])->name('deleteCompliance');

// Departments :-
Route::get('department', [CustomerController::class, 'department'])->name('department');
Route::post('postdepartment', [CustomerController::class, 'postdepartment'])->name('postdepartment');
Route::delete('department/{id}', [CustomerController::class, 'destroydepartment'])->name('deleteDepartment');
// Guard Posts :-
Route::get('guardpost', [CustomerController::class, 'guardpost'])->name('guardpost');
Route::post('postguard', [CustomerController::class, 'postguard'])->name('postguard');
Route::delete('guardpost/{id}', [CustomerController::class, 'destroyguardpost'])->name('deleteGuardpost');
// Categories :-
Route::get('category', [CustomerController::class, 'category'])->name('category');
Route::post('postcategory', [CustomerController::class, 'postcategory'])->name('postcategory');
Route::delete('category/{id}', [CustomerController::class, 'destroycustomercategory'])->name('customerdeleteCategory');

// SAOB Categories :-
Route::get('saobcategory', [CustomerController::class, 'saob_category'])->name('saobcategory');
Route::post('saobpostcategory', [CustomerController::class, 'postsaob_category'])->name('saobpostcategory');
Route::delete('saobcategory/{id}', [CustomerController::class, 'destroycustomersaob_category'])->name('saobcustomerdeleteCategory');

// Emergency Services :-
Route::get('emerser', [CustomerController::class, 'emerser'])->name('emerser');
Route::post('postemerser', [CustomerController::class, 'postemerser'])->name('postemerser');
Route::delete('emerser/{id}', [CustomerController::class, 'destroycustomeremerser'])->name('customerdeleteemerser');

// Training Emergency Services :-
Route::get('trainemerser', [TrainingController::class, 'trainemerser'])->name('trainemerser');
Route::post('posttrainemerser', [TrainingController::class, 'posttrainemerser'])->name('posttrainemerser');
Route::delete('trainemerser/{id}', [TrainingController::class, 'destroytrainingemerser'])->name('trainingdeletetrainemerser');

// Audits Checkedby :-
Route::get('checkedby', [CustomerController::class, 'checkedby'])->name('checkedby');
Route::post('postcheckedby', [CustomerController::class, 'postcheckedby'])->name('postcheckedby');
Route::delete('checkedby/{id}', [CustomerController::class, 'destroycustomercheckedby'])->name('customerdeletecheckedby');

// MPOC :-
Route::get('mpoc', [CustomerController::class, 'mpoc'])->name('mpoc');
Route::post('postmpoc', [CustomerController::class, 'postmpoc'])->name('postmpoc');
Route::delete('mpoc/{id}', [CustomerController::class, 'destroycustomermpoc'])->name('customerdeletempoc');

// Promotional Activities :-
Route::get('activities', [CustomerController::class, 'activities'])->name('activities');
Route::post('postactivity', [CustomerController::class, 'postactivity'])->name('postactivity');
Route::delete('activity/{id}', [CustomerController::class, 'destroyactivity'])->name('deleteActivitys');

// Guard Duties :-
Route::get('duties', [CustomerController::class, 'duties'])->name('duties');
Route::post('postduty', [CustomerController::class, 'postduty'])->name('postduty');
Route::delete('duty/{id}', [CustomerController::class, 'destroyduty'])->name('deleteDuty');

// Finance :-
Route::get('finances', [CustomerController::class, 'finances'])->name('finances');
Route::post('postfinance', [CustomerController::class, 'postfinance'])->name('postfinance');
Route::delete('finance/{id}', [CustomerController::class, 'destroyfinance'])->name('deleteFinance');

// Equipment :-
Route::get('equipments', [CustomerController::class, 'equipments'])->name('equipments');
Route::post('postequipment', [CustomerController::class, 'postequipment'])->name('postequipment');
Route::delete('equipment/{id}', [CustomerController::class, 'destroyequipment'])->name('deleteEquipment');

// Sources :-
Route::get('sources', [CustomerController::class, 'sources'])->name('sources');
Route::post('postsource', [CustomerController::class, 'postsource'])->name('postsource');
Route::delete('source/{id}', [CustomerController::class, 'destroysource'])->name('deleteSource');

// Complaints Tagged To  :-
Route::get('complaintto', [CustomerController::class, 'complaintto'])->name('complaintto');
Route::post('postcomplaintto', [CustomerController::class, 'postcomplaintto'])->name('postcomplaintto');
Route::delete('complaintto/{id}', [CustomerController::class, 'destroycomplaintto'])->name('deleteComplaintTo');

// Complaints Addressed By  :-
Route::get('complaintby', [CustomerController::class, 'complaintby'])->name('complaintby');
Route::post('postcomplaintby', [CustomerController::class, 'postcomplaintby'])->name('postcomplaintby');
Route::delete('complaintby/{id}', [CustomerController::class, 'destroycomplaintby'])->name('deleteAddressedBy');

// Notifications Related To :-
Route::get('notifications', [CustomerController::class, 'notifications'])->name('notifications');
Route::post('postnotification', [CustomerController::class, 'postnotification'])->name('postnotification');
Route::delete('notification/{id}', [CustomerController::class, 'destroynotification'])->name('deleteNotification');

// Notifications Shared With :-
Route::get('notificationshared', [CustomerController::class, 'notificationshared'])->name('notificationshared');
Route::post('postnotificationshared', [CustomerController::class, 'postnotificationshared'])->name('postnotificationshared');
Route::delete('notificationshared/{id}', [CustomerController::class, 'destroynotificationshared'])->name('deleteNotificationShared');

// Sales :-
Route::get('sales', [SalesController::class, 'sales'])->name('sales');
Route::get('planning', [SalesController::class, 'planning'])->name('planning');

// Sales Promotional Activities
Route::get('activities', [SalesController::class, 'activities'])->name('activities');
Route::post('postactivity', [SalesController::class, 'postactivity'])->name('postactivity');
Route::delete('activities/{id}', [SalesController::class, 'destroyactivity'])->name('deleteActivity');

Route::get('/sourceLead/add', [SalesController::class, 'addSourceLead'])->name('sourceLead.add');
Route::post('/sourceLead/store', [SalesController::class, 'storeSourceLead'])->name('sourceLead.store');
Route::delete('/sourceLead/delete/{id}', [SalesController::class, 'deleteeSourceLead'])->name('sourceLead.delete');

Route::get('/vehical/type/add', [SalesController::class, 'addvehicaltype'])->name('vehicaltype.add');
Route::post('/vehical/type/store', [SalesController::class, 'storevehicaltype'])->name('vehicaltype.store');
Route::delete('/vehical/type/delete/{id}', [SalesController::class, 'deleteevehicaltype'])->name('vehicaltype.delete');

Route::get('/vehical/category/add', [SalesController::class, 'addvehicalcategory'])->name('vehicalcategory.add');
Route::post('/vehical/category/store', [SalesController::class, 'storevehicalcategory'])->name('vehicalcategory.store');
Route::delete('/vehical/category/delete/{id}', [SalesController::class, 'deleteevehicalcategory'])->name('vehicalcategory.delete');

Route::get('/security/equ/category/add', [SalesController::class, 'addsecurityequcategory'])->name('securityequcategory.add');
Route::post('/security/equ/category/store', [SalesController::class, 'storesecurityequcategory'])->name('securityequcategory.store');
Route::delete('/security/equ/category/delete/{id}', [SalesController::class, 'deleteesecurityequcategory'])->name('securityequcategory.delete');

Route::get('/barrier/ownership/add', [SalesController::class, 'addbarrierownership'])->name('barrierownership.add');
Route::post('/barrier/ownership/store', [SalesController::class, 'storebarrierownership'])->name('barrierownership.store');
Route::delete('/barrier/ownership/delete/{id}', [SalesController::class, 'deletebarrierownership'])->name('barrierownership.delete');

Route::get('/barrier/rental/add', [SalesController::class, 'addbarrierrental'])->name('barrierrental.add');
Route::post('/barrier/rental/store', [SalesController::class, 'storebarrierrental'])->name('barrierrental.store');
Route::delete('/barrier/rental/delete/{id}', [SalesController::class, 'deletebarrierrental'])->name('barrierrental.delete');

// cctv category
Route::get('/cctv/category/add', [SalesController::class, 'addcctvcategory'])->name('cctvcategory.add');
Route::post('/cctv/category/store', [SalesController::class, 'storecctvcategory'])->name('cctvcategory.store');
Route::delete('/cctv/category/delete/{id}', [SalesController::class, 'deletecctvcategory'])->name('cctvcategory.delete');

// cctv brand
Route::get('/cctv/brand/add', [SalesController::class, 'addcctvbrand'])->name('cctvbrand.add');
Route::post('/cctv/brand/store', [SalesController::class, 'storecctvbrand'])->name('cctvbrand.store');
Route::delete('/cctv/brand/delete/{id}', [SalesController::class, 'deletecctvbrand'])->name('cctvbrand.delete');

// cctv model
Route::get('/cctv/model/add', [SalesController::class, 'addcctvmodel'])->name('cctvmodel.add');
Route::post('/cctv/model/store', [SalesController::class, 'storecctvmodel'])->name('cctvmodel.store');
Route::delete('/cctv/model/delete/{id}', [SalesController::class, 'deletecctvmodel'])->name('cctvmodel.delete');

// cctv pixels

Route::get('/cctv/pixels/add', [SalesController::class, 'addcctvpixels'])->name('cctvpixels.add');
Route::post('/cctv/pixels/store', [SalesController::class, 'storecctvpixels'])->name('cctvpixels.store');
Route::delete('/cctv/pixels/delete/{id}', [SalesController::class, 'deletecctvpixels'])->name('cctvpixels.delete');

// cctv type
Route::get('/cctv/type/add', [DropdownController::class, 'addcctvtype'])->name('cctvtype.add');
Route::post('/cctv/type/store', [DropdownController::class, 'storecctvtype'])->name('cctvtype.store');
Route::delete('/cctv/type/delete/{id}', [DropdownController::class, 'deletecctvtype'])->name('cctvtype.delete');

// Cctv Backup Storage
Route::get('/cctv/backup/storage/add', [DropdownController::class, 'addcctvbackupstorage'])->name('backupstorage.add');
Route::post('/cctv/backup/storage/store', [DropdownController::class, 'storecctvbackupstorage'])->name('backupstorage.store');
Route::delete('/cctv/backup/storage/delete/{id}', [DropdownController::class, 'deletecctvbackupstorage'])->name('backupstorage.delete');

// Cctv NVR
Route::get('/cctv/nvr/add', [DropdownController::class, 'addcctvnvr'])->name('nvr.add');
Route::post('/cctv/nvr/store', [DropdownController::class, 'storecctvnvr'])->name('nvr.store');
Route::delete('/cctv/nvr/delete/{id}', [DropdownController::class, 'deletecctvnvr'])->name('nvr.delete');

// poe/switch
Route::get('/cctv/poe/switch/add', [DropdownController::class, 'addcctvpoeswitch'])->name('poeswitch.add');
Route::post('/cctv/poe/switch/store', [DropdownController::class, 'storecctvpoeswitch'])->name('poeswitch.store');
Route::delete('/cctv/poe/switch/delete/{id}', [DropdownController::class, 'deletecctpoeswitch'])->name('poeswitch.delete');

//  attendence/machine/category
Route::get('/attendence/machine/category/add', [DropdownController::class, 'addattendencemachinecategory'])->name('attendencemachinecategory.add');
Route::post('/attendence/machine/category/store', [DropdownController::class, 'storeattendencemachinecategory'])->name('attendencemachinecategory.store');
Route::delete('/attendence/machine/category/delete/{id}', [DropdownController::class, 'deleteattendencemachinecategory'])->name('attendencemachinecategory.delete');

Route::get('/comercial/category/add', [DropdownController::class, 'addcomercialcategory'])->name('comercialcategory.add');
Route::post('/comercial/category/store', [DropdownController::class, 'storecomercialcategory'])->name('comercialcategory.store');
Route::delete('/comercial/category/delete/{id}', [DropdownController::class, 'deletecomercialcategory'])->name('comercialcategory.delete');

Route::get('/comercial/region/add', [DropdownController::class, 'addcomercialregion'])->name('comercialregion.add');
Route::post('/comercial/region/store', [DropdownController::class, 'storecomercialregion'])->name('comercialregion.store');
Route::delete('/comercial/region/delete/{id}', [DropdownController::class, 'deletecomercialregion'])->name('comercialregion.delete');

Route::get('/comercial/reverse/category/add', [DropdownController::class, 'addcomercialreversecategory'])->name('comercialreversecategory.add');
Route::post('/comercial/reverse/category/store', [DropdownController::class, 'storecomercialreversecategory'])->name('comercialreversecategory.store');
Route::delete('/comercial/reverse/category/delete/{id}', [DropdownController::class, 'deletecomercialreversecategory'])->name('comercialreversecategory.delete');

Route::get('/comercial/complains/category/add', [DropdownController::class, 'addcomercialcomplainscategory'])->name('comercialcomplainscategory.add');
Route::post('/comercial/complains/category/store', [DropdownController::class, 'storecomercialcomplainscategory'])->name('comercialcomplainscategory.store');
Route::delete('/comercial/complains/category/delete/{id}', [DropdownController::class, 'deletecomercialcomplainscategory'])->name('comercialcomplainscategory.delete');

Route::get('/comercial/lumsumshown/category/add', [DropdownController::class, 'addcomerciallumsumshowncategory'])->name('comerciallumsumshowncategory.add');
Route::post('/comercial/lumsumshown/category/store', [DropdownController::class, 'storecomerciallumsumshowncategory'])->name('comerciallumsumshowncategory.store');
Route::delete('/comercial/lumsumshown/category/delete/{id}', [DropdownController::class, 'deletecomerciallumsumshowncategory'])->name('comerciallumsumshowncategory.delete');

Route::get('/comercial/lumsumhidden/category/add', [DropdownController::class, 'addcomerciallumsumhiddencategory'])->name('comerciallumsumhiddencategory.add');
Route::post('/comercial/lumsumhidden/category/store', [DropdownController::class, 'storecomerciallumsumhiddencategory'])->name('comerciallumsumhiddencategory.store');
Route::delete('/comercial/lumsumhidden/category/delete/{id}', [DropdownController::class, 'deletecomerciallumsumhiddencategory'])->name('comerciallumsumhiddencategory.delete');

// 03
Route::get('/purchase/dashboard', [PurchaseController::class, 'dashboard'])->name('purchase.dashboard');
// 05
Route::get('/purchase/billing', [PurchaseController::class, 'billing'])->name('purchase.billing');
Route::get('/purchase/postbilling', [PurchaseController::class, 'postbilling'])->name('purchase.postbilling');

// Inventory Controller
Route::get('/inventory/dashboard', [InventoryController::class, 'dashboard'])->name('inventory.dashboard');

// Access Controller
Route::get('/access-rights', [AccessController::class, 'access'])->name('access');
Route::post('/users', [AccessController::class, 'store'])->name('users.store');

// RequisitionController
Route::get('/requisition', [RequisitionController::class, 'req'])->name('req');
Route::get('/requisition-post', [RequisitionController::class, 'postreq'])->name('postreq');
Route::post('/requisition-submit', [RequisitionController::class, 'submitreq'])->name('submit.req');
Route::get('/requisition-edit/{id}', [RequisitionController::class, 'editreq'])->name('edit.req');
Route::put('/requisition-update/{id}', [RequisitionController::class, 'updatereq'])->name('update.req');
Route::get('/requisition-view/{id}', [RequisitionController::class, 'viewreq'])->name('view.req');
Route::delete('/requisition-delete/{id}', [RequisitionController::class, 'deletereq'])->name('delete.req');

// Vendor Controller
Route::get('/vendor', [VendorController::class, 'vendor'])->name('vendor');
Route::get('/vendor/postvendor', [VendorController::class, 'postvendor'])->name('post.vendor');
Route::post('/vendor/store', [VendorController::class, 'store'])->name('vendor.store');
Route::get('/vendor/edit/{id}', [VendorController::class, 'edit'])->name('vendor.edit');
Route::put('/vendor/update/{id}', [VendorController::class, 'update'])->name('vendor.update');
Route::get('/vendor/view/{id}', [VendorController::class, 'view'])->name('vendor.view');
Route::delete('/vendor/delete/{id}', [VendorController::class, 'destroy'])->name('vendor.destroy');

Route::get('/inventory/dashboard', [InventoryController::class, 'dashboard'])->name('inventory.dashboard');

// Inventory Received Controller
Route::get('/inventory-received', [InventoryController::class, 'InventoryReceived'])->name('inventory.received');
Route::get('/inventory-received-submission', [InventoryController::class, 'inventory'])->name('inventory');
Route::post('/inventory/received/save-entries', [InventoryController::class, 'inventroysaveEntries'])->name('inventory.save_entries');

Route::get('/inventory/received/{id}', [InventoryController::class, 'InventoryReceiveddelete'])->name('inventory.received.delete');

// Categories
Route::get('/inventory/category', [InventoryController::class, 'inventoryCategory'])->name('inventory.category');
Route::post('/inventory/category/store', [InventoryController::class, 'inventoryCategoryStore'])->name('inventory.category.store');

// Sub Categories
Route::get('/inventory/subcategory', [InventoryController::class, 'inventorySubCategory'])->name('inventory.subcategory');
Route::post('/inventory/subcategory/store', [InventoryController::class, 'inventorySubCategoryStore'])->name('inventory.subcategory.store');

// Articles
Route::get('/inventory/articles', [InventoryController::class, 'inventoryArticle'])->name('inventory.articles');
Route::post('/inventory/articles/store', [InventoryController::class, 'inventoryArticleStore'])->name('inventory.articles.store');

Route::get('inventory/subcategories/{categoryId}', [InventoryController::class, 'getSubcategories']);
Route::get('inventory/articles/{subcategoryId}', [InventoryController::class, 'getArticles']);
Route::post('/inventory/save-entries', [InventoryController::class, 'saveEntries']);

Route::get('/inventory/latest-lot-number', [InventoryController::class, 'getLatestLotNumber']);

// Internal Dispatch Controller
Route::get('/internal-dispatch', [InternalDispatchController::class, 'internalDispatch'])->name('internal.dispatch');
Route::get('/internal-dispatch-submission', [InternalDispatchController::class, 'dispatch'])->name('dispatch');
Route::post('/inventory/dispatch/save-entries', [InternalDispatchController::class, 'saveEntries'])->name('save_entries');

Route::get('/internal-dispatch/latest-lot-number', [InternalDispatchController::class, 'getLatestDispatchLotNumber']);
Route::get('/delete-internal-dispatch/{id}', [InternalDispatchController::class, 'delete_internalDispatch'])->name('delete.internal.dispatch');

// PurchaseOrder Controller
Route::get('/purchase-order', [PurchaseOrderController::class, 'purchaseOrder'])->name('purchase.order');
Route::get('/purchase-order-submission', [PurchaseOrderController::class, 'purchaseOrderSubmission'])->name('purchase.order.submission');
Route::post('/purchase-order/store', [PurchaseOrderController::class, 'submitPurchaseOrder'])->name('purchaseorder.store');
Route::get('/edit-purchase-order/{id}', [PurchaseOrderController::class, 'editPurchaseOrderSubmission'])->name('edit.purchase.order');
Route::put('/purchase-order/update/{id}', [PurchaseOrderController::class, 'updatePurchaseOrder'])->name('purchaseorder.update');
Route::get('/view-purchase-order/{id}', [PurchaseOrderController::class, 'viewPurchaseOrder'])->name('view.purchase.order');
Route::post('/send-pdf-email', [PurchaseOrderController::class, 'sendPDFViaEmail']);

// Billing Controller
Route::get('/billing', [BillingController::class, 'billing'])->name('billing');
Route::get('/billing-submission', [BillingController::class, 'billingSubmission'])->name('billing.submission');
Route::post('/billing/store', [BillingController::class, 'submitBilling'])->name('billing.store');
Route::get('/edit-billing/{id}', [BillingController::class, 'editBilling'])->name('edit.billing');
Route::put('/billing/update/{id}', [BillingController::class, 'updateBilling'])->name('billing.update');
Route::get('/view-billing/{id}', [BillingController::class, 'viewBilling'])->name('view.billing');
Route::post('/send-pdf-email', [BillingController::class, 'sendPDFViaEmail']);

// Sales Items
Route::get('/items/add', [SalesPlanningController::class, 'items'])->name('items');
Route::post('/item/store', [SalesPlanningController::class, 'addItems'])->name('item.store');

// Add planning
Route::get('/campaign', [SalesPlanningController::class, 'compaign'])->name('campaign');
Route::get('/campaign/add', [SalesPlanningController::class, 'addCompaign'])->name('campaign.add');
Route::post('/campaign/store', [SalesPlanningController::class, 'storeCampaign'])->name('campaign.store');
Route::get('/campaign/{id}', [SalesPlanningController::class, 'viewCampaign'])->name('campaign.view');
Route::get('/admin/search/Compaign/report', [SalesPlanningController::class, 'search_compaign_report'])->name('search.compaign.admins');

Route::get('/search/sales/email/Compaign', [SalesPlanningController::class, 'search_sales_email_compaign'])->name('sales.email.compaign.search');
Route::post('/campaign/autosave', [AdminController::class, 'autoSave'])->name('campaign.autosave');
Route::get('/analytics', [AdminController::class, 'analytics_index']);
Route::post('/analytics/update-field', [AdminController::class, 'update_Field'])->name('analytics.update');
Route::post('/wnationwide/store', [AdminController::class, 'wnationwide_store'])->name('wnationwide.store');

Route::get('/admin/feedback/report', [AdminController::class, 'feedbackReports'])->name('admin.feedback.report');
Route::get('admin/admin/social/report', [AdminController::class, 'filterReports'])->name('admin.admin.social.report');
Route::get('/admin/quotation/report', [AdminController::class, 'filterQuotationReports'])->name('admin.quotation.report');
Route::get('/search/daily/email/analytics/Compaign', [SalesPlanningController::class, 'search_daily_email_analytics_compaign'])->name('daily.analytics.compaign.search');
Route::get('/search/sales/register/report', [SalesPlanningController::class, 'search_sales_register_report'])->name('search.sales.register.report');
Route::get('/search/quotation/register/report', [SalesPlanningController::class, 'quotation_register_report'])->name('search.quotation.register.report');
Route::get('/search/feedback/register/report', [SalesPlanningController::class, 'feedback_register_report'])->name('search.feedback.register.report');
Route::get('/search/nationwide/report', [SalesPlanningController::class, 'nationwide_report'])->name('search.nationwide.report');
Route::get('/campaign/edit/{id}', [SalesPlanningController::class, 'editCampaign'])->name('campaign.edit');
Route::post('campaign/update/{id}', [SalesPlanningController::class, 'updateCampaign'])->name('campaign.update');
Route::delete('campaign/delete/{id}', [SalesPlanningController::class, 'deleteCampaign'])->name('campaign.delete');
Route::post('/send-pdf-email/campaign', [SalesPlanningController::class, 'sendPDFViaEmail']);
Route::get('/report/delete/{id}', [SalesPlanningController::class, 'deletereports'])->name('report.delete');

//  region
Route::get('/region', [RegionController::class, 'addregion'])->name('admin.region.index');
Route::post('/region/store', [RegionController::class, 'storeregion'])->name('admin.region.store');
Route::delete('/region/delete/{id}', [RegionController::class, 'deleteeregion'])->name('admin.region.delete');
Route::put('/region/update/{id}', [RegionController::class, 'updateRegion'])->name('admin.region.update');

// segment
Route::get('/segment/add', [RegionController::class, 'addsegment'])->name('segment.add');
Route::post('/segment/store', [RegionController::class, 'storesegment'])->name('segment.store');
Route::delete('/segment/delete/{id}', [RegionController::class, 'deleteesegment'])->name('segment.delete');

//  dispatch
Route::get('/dispatch/add', [RegionController::class, 'adddispatch'])->name('dispatch.add');
Route::post('/dispatch/store', [RegionController::class, 'storedispatch'])->name('dispatch.store');
Route::delete('/dispatch/delete/{id}', [RegionController::class, 'deleteedispatch'])->name('dispatch.delete');

// Requirement
Route::get('requirements', [RequirementController::class, 'requirements'])->name('requirements');
Route::get('/requirements/post', [RequirementController::class, 'postrequirements'])->name('requirements.post');
Route::post('/requirement/store', [RequirementController::class, 'storeRequirement'])->name('requirement.store');
Route::get('/view/requirements/{id}', [RequirementController::class, 'viewrequirements'])->name('requirements.view');
Route::get('/edit/requirements/{id}', [RequirementController::class, 'editrequirements'])->name('requirements.edit');
Route::put('/update/requirements/{id}', [RequirementController::class, 'updateRequirements'])->name('requirements.update');

Route::get('/delete/requirements/{id}', [RequirementController::class, 'deleterequirements'])->name('requirements.delete');
Route::get('/search/requirement/report', [SalesPlanningController::class, 'search_requirement_report'])->name('search.requirement.report');
Route::get('/search/active/requirement/report', [SalesPlanningController::class, 'search_active_requirement_report'])->name('search.active.requirement.report');

// Sales Requirements Categories (First add more)
Route::get('salescategory', [RequirementController::class, 'salescategory'])->name('salescategory');
Route::post('postsalescategory', [RequirementController::class, 'postsalescategory'])->name('postsalescategory');
Route::delete('destroysalescategory/{id}', [RequirementController::class, 'destroysalescategory'])->name('destroysalescategory');

// Sales Requirements Rhq (Second Dynamic add more)
Route::get('/salesrhq', [RequirementController::class, 'salesrhq'])->name('salesrhq');
Route::post('postsalesrhq', [RequirementController::class, 'postsalesrhq'])->name('postsalesrhq');
Route::delete('destroysalesrhq/{id}', [RequirementController::class, 'destroysalesrhq'])->name('destroysalesrhq');

// Sales Requirements Giveaways (Third Dynamic add button)
Route::get('/salesgive', [RequirementController::class, 'salesgive'])->name('salesgive');
Route::post('postsalesgive', [RequirementController::class, 'postsalesgive'])->name('postsalesgive');
Route::delete('destroysalesgive/{id}', [RequirementController::class, 'destroysalesgive'])->name('destroysalesgive');

Route::get('saleslead', [RequirementController::class, 'saleslead'])->name('saleslead');
Route::post('postsaleslead', [RequirementController::class, 'postsaleslead'])->name('postsaleslead');
Route::delete('destroysaleslead/{id}', [RequirementController::class, 'destroysaleslead'])->name('destroysaleslead');

// Sales Requirements Guard Category
Route::get('salesguard', [RequirementController::class, 'salesguard'])->name('salesguard');
Route::post('postsalesguard', [RequirementController::class, 'postsalesguard'])->name('postsalesguard');
Route::delete('destroysalesguard/{id}', [RequirementController::class, 'destroysalesguard'])->name('destroysalesguard');

// Sales Vehicle Ownership Status
Route::get('salesvehicle', [RequirementController::class, 'salesvehicle'])->name('salesvehicle');
Route::post('postsalesvehicle', [RequirementController::class, 'postsalesvehicle'])->name('postsalesvehicle');
Route::delete('destroysalesvehicle/{id}', [RequirementController::class, 'destroysalesvehicle'])->name('destroysalesvehicle');
// Sales Canine
Route::get('salescanine', [RequirementController::class, 'salescanine'])->name('salescanine');
Route::post('postsalescanine', [RequirementController::class, 'postsalescanine'])->name('postsalescanine');
Route::delete('destroysalescanine/{id}', [RequirementController::class, 'destroysalescanine'])->name('destroysalescanine');

// Sales Consultancy
Route::get('salesconsultancy', [RequirementController::class, 'salesconsultancy'])->name('salesconsultancy');
Route::post('postsalesconsultancy', [RequirementController::class, 'postsalesconsultancy'])->name('postsalesconsultancy');
Route::delete('destroysalesconsultancy/{id}', [RequirementController::class, 'destroysalesconsultancy'])->name('destroysalesconsultancy');

// Sales View PDF

Route::post('/send-report-email', [RequirementController::class, 'sendReportEmail']);
Route::post('/send-edit-report-email', [RequirementController::class, 'sendEditReportEmail']);
Route::post('/send-pdf-email', [RequirementController::class, 'sendPDFViaEmail']);

Route::resource('admin/roles', RoleController::class);

Route::get('admin/users/edit/{id}', [RoleController::class, 'edit_access_role'])->name('edit_access_role');
Route::post('admin/users/update/{id}', [RoleController::class, 'update_access_role'])->name('update_access_role');
Route::get('admin/delete/customer/{id}', [RoleController::class, 'admin_delete_customer'])->name('admin_delete_customer');
// Route::get('/get-next-sub-guard/{guardId}', [HrmController::class, 'getNextSubGuard']);
Route::get('/gethrm/{id}', [HrmController::class, 'getNextSubGuard'])->name('gethrm');
Route::get('/hrms/sub-hrms/{id}', [HrmController::class, 'sub_hrms'])->name('sub_hrms');

Route::get('/hrms/{id}/notifications', [HrmController::class, 'hrm_notifications'])
    ->name('hrms.notifications');

Route::get('/admin/reminders', function () {
    $reminders = ReminderNotification::latest()->get();
    return view('admin.reminders', compact('reminders'));
});

Route::get('/latestlicenseattachment/{id}', [ImageController::class, 'latestlicenseattachment'])->name('latestlicenseattachment');
Route::get('/delete-images/{id}/{column}', [ImageController::class, 'deleteImage'])->name('admin.deleteImage');
Route::get('/delete-image/{id}/{column}/{file}', [ImageController::class, 'deleteRentalImage'])->name('admin.deleteRentalImage');
Route::get('/delete-image/{id}/{column}', [ImageController::class, 'deleteCustomerImage'])->name('admin.deleteCustomerImage');

// Guard Duties :-
Route::get('duties', [CustomerController::class, 'duties'])->name('duties');
Route::post('postduty', [CustomerController::class, 'postduty'])->name('postduty');
Route::delete('duty/{id}', [CustomerController::class, 'destroyduty'])->name('deleteDuty');

Route::delete('/trainings/bulk-delete', [TrainingController::class, 'trainingbulkDelete'])->name('training.bulk-delete');

Route::get('/weekly/recordes', [WeaponRecordControler::class, 'weakly_recordes'])->name('weakly.recordes');
Route::get('/weekly/recordes/post', [WeaponRecordControler::class, 'postweakly_recordes'])->name('post.weakly.recordes');
Route::post('/weekly/recordes/store', [WeaponRecordControler::class, 'storeweakly_recordes'])->name('store.weakly.recordes');
Route::get('/weekly/recordes/edit/{id}', [WeaponRecordControler::class, 'editweakly_recordes'])->name('edit.weakly.recordes');
Route::put('/weekly/recordes/update/{id}', [WeaponRecordControler::class, 'updateweakly_recordes'])->name('update.weakly.recordes');
Route::get('/weekly/recordes/delete/{id}', [WeaponRecordControler::class, 'deleteweakly_recordes'])->name('delete.weakly.recordes');

Route::post('/weakly/uniform/recordes/store', [UniformRecordController::class, 'storeweakly_uniform_recordes'])->name('store.uniform.weakly.recordes');
Route::post('/weekly/sales/record', [UniformRecordController::class, 'weekly_sales_record'])->name('weekly.sales.record');
Route::get('/search/weekly/sales/record', [UniformRecordController::class, 'search_weekly_sales_record'])->name('search.weeklly.sales.reports');

Route::get('admin/reports', [ReportController::class, 'admin_reports'])->name('admin_reports');

Route::prefix('attendance')->group(function () {
    // guest admin
    Route::middleware('auth')->controller(AttendanceController::class)->group(function () {
        Route::get('attendance-view', 'attendance_view')->name('attendance.attendance_view');
        Route::post('update-att', 'update_att')->name('dashboard.update-att');
        Route::post('delete-punch', 'delete_punch')->name('dashboard.delete-punch');
    });
});

Route::prefix('api')->name('api.')->group(function () {
    Route::prefix('employee')->name('employee.')->group(function () {
        Route::prefix('attendance')->name('attendance.')->group(function () {
            Route::controller(AttendanceController::class)->group(function () {
                Route::post('get-attendance', 'get_attendance')->name('get-attendance');
                Route::post('get-leave-summary', 'get_leave_summary')->name('get-leave-summary');
                Route::post('save-attendance', 'update_att')->name('save-attendance');
            });
        });
    });
});

Route::prefix('leave-types')->name('dashboard.leave-types.')->group(function () {
    Route::middleware('auth')->controller(LeaveTypeController::class)->group(function () {
        Route::get('/', 'leave_types')->name('index');
        Route::post('store', 'store')->name('store');
        Route::get('get-data', 'get_data')->name('get-data');
        Route::post('update', 'update')->name('update');
        Route::post('delete', 'destroy')->name('delete');
    });
});

Route::prefix('employee-leaves')->name('dashboard.employee-leaves.')->group(function () {
    Route::middleware('auth')->controller(EmployeeLeaveController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('get-data', 'get_data')->name('get-data');
        Route::post('store', 'store')->name('store');
        Route::post('update-status', 'update_status')->name('update-status');
        Route::post('delete', 'destroy')->name('delete');
    });
});

Route::prefix('employee-payroll')->name('dashboard.employee-payroll.')->group(function () {
    Route::middleware('auth')->controller(PayRollEmployeeController::class)->group(function () {
        Route::get('employee-salaries', 'index')->name('salaries');
        Route::post('employee-salaries/store', 'store')->name('salaries.store');
        Route::get('employee-salaries/get-salaries', 'getSalaries')->name('salaries.get');
        Route::delete('employee-salaries/delete/{id}', 'destroy')->name('salaries.delete');
        Route::get('employee-salaries/get-detail/{id}', 'getSalaryDetail')->name('salaries.get-detail');
        Route::get('employee-salaries/increment-sheet/{id}', 'getIncrementSheet')->name('salaries.increment-sheet');

        // Salary Report Routes
        Route::get('salary-report', 'salaryReport')->name('salary-report');
        Route::match(['get', 'post'], 'salary-report/data', 'getSalaryReportData')->name('salary-report.data');
    });
});

Route::prefix('holidays')->name('dashboard.holidays.')->group(function () {
    Route::middleware('auth')->controller(PayRollEmployeeController::class)->group(function () {
        Route::get('/', 'holiDays')->name('index');
        Route::post('store', 'holiDays_Store')->name('store');
        Route::get('get-holidays', 'get_holidays')->name('get-holidays');
        Route::get('get-detail', 'getHolidayDetail')->name('get-detail');
        Route::delete('delete/{id}', 'deleteHoliday')->name('delete');
    });
});

Route::prefix('erp-lms')->name('dashboard.lms.')->group(function () {
    Route::middleware('auth')->controller(LmsController::class)->group(function () {
        Route::get('/', 'LMS')->name('index');
        Route::post('/register', 'register')->name('register');
        Route::get('/users', 'getUsers')->name('users');
    });
});


// Route::get('assign-role', function () {
//     $role = Role::findOrFail(8);
//     $role->givePermissionTo(['view_leave_request']);

//     $user = User::where('email', 'employee@example.com')->firstOrFail();
//     $user->syncRoles([$role]);

//     return response()->json([
//         'user' => $user->email,
//         'role' => $role->name,
//         'permissions_count' => $role->permissions->count(),
//     ]);

//     // Permission::where('name', 'view_leave_request')->first();
// // return Permission::where('name', 'view_leave_request')->first();
// });

// region wise sales report
Route::post('/region-reports/store', [AdminController::class, 'storeRegionReport'])->name('regionReport.store');
Route::get('/region-reports/edit/{id}', [AdminController::class, 'editRegionReport']);
Route::put('/region-reports/update/{id}', [AdminController::class, 'updateRegionReport']);
Route::delete('/region-reports/delete/{id}', [AdminController::class, 'deleteRegionReport']);
Route::get('/search/region/report/export', [AdminController::class, 'export_region_report'])->name('regionwise.index');
Route::get('/search/region/report', [AdminController::class, 'export_visit_report'])->name('visitsales.index');
Route::post('/regionwise/pdf', [AdminController::class, 'RegionWisePdf'])->name('regionwise.pdf');
Route::post('/regionwise/excel', [AdminController::class, 'RegionWiseExcel'])->name('regionwise.excel');

Route::post('/pipeline-reports/store', [AdminController::class, 'storePipelineReport'])->name('pipelineReport.store');
Route::get('/pipeline-reports/edit/{id}', [AdminController::class, 'editPipelineReport']);
Route::put('/pipeline-reports/update/{id}', [AdminController::class, 'updatePipelineReport']);
Route::delete('/pipeline-reports/delete/{id}', [AdminController::class, 'deletePipelineReport']);
Route::get('/search/pipeline/report/export', [AdminController::class, 'export_pipeline_report'])->name('pipelinesales.index');
Route::post('/pipelinesales/pdf', [AdminController::class, 'PipelinesalesPdf'])->name('pipelinesales.pdf');
Route::post('/pipelinesales/excel', [AdminController::class, 'PipelinesalesExcel'])->name('pipelinesales.excel');

Route::post('/visit-pipeline-reports/store', [AdminController::class, 'storeVisitReport'])->name('visitReport.store');
Route::get('/visit-reports/edit/{id}', [AdminController::class, 'editVisitReport']);
Route::put('/visit-reports/update/{id}', [AdminController::class, 'updateVisitReport'])->name('visitpipeline.update');
Route::delete('/visit-reports/delete/{id}', [AdminController::class, 'deleteVisitReport']);
Route::get('/search/visit/report/export', [AdminController::class, 'export_visit_pipeline_report'])->name('visitPipelinesales.index');
Route::get('/search/visit/report', [AdminController::class, 'export_visit_report'])->name('visitsales.index');
Route::post('/visit-pipelinesales/pdf', [AdminController::class, 'visitPipelinesalesPdf'])->name('visitPipelinesales.pdf');
Route::post('/visit-pipelinesales/excel', [AdminController::class, 'visitPipelinesalesExcel'])->name('visitPipelinesales.excel');
Route::post('/visitsales/pdf', [AdminController::class, 'visitsalesPdf'])->name('visitsales.pdf');
Route::post('/visitsales/excel', [AdminController::class, 'visitsalesExcel'])->name('visitsales.excel');


// Temporary Test Route for PDF Email WhatsApp Notification
Route::get('/test-pdf-notification', function () {
    $customer = \App\Models\Customer::first();
    if (!$customer) {
        return "Error: No customer records found in the database.";
    }

    // Mocking the Request
    $request = new \Illuminate\Http\Request();
    $request->setMethod('POST');
    $request->request->add([
        'email' => $customer->email,
        'subject' => 'Test Report Notification',
        'body' => 'This is a test message to confirm the PDF attachment flow and WhatsApp notification.',
    ]);

    // Create a fake PDF file
    $file = \Illuminate\Http\UploadedFile::fake()->create('test_report.pdf', 100, 'application/pdf');
    $request->files->add(['pdf' => $file]);

    try {
        $controller = app(\App\Http\Controllers\CustomerController::class);
        $response = $controller->sendPDFViaEmail($request);

        return response()->json([
            'status' => 'Test Executed',
            'customer_targeted' => $customer->customers_name,
            'customer_email' => $customer->email,
            'controller_response' => $response->getData()
        ]);
    } catch (\Exception $e) {
        return "An error occurred during testing: " . $e->getMessage();
    }
});

// Test Route for sendReportEmail
Route::get('/test-report-notification', function () {
    $customer = \App\Models\Customer::first();
    if (!$customer)
        return "Error: No customer found.";

    $request = new \Illuminate\Http\Request();
    $request->setMethod('POST');
    $request->request->add([
        'subject' => 'General Inspection Report',
        'body' => 'Hello, please find the general inspection report for your site.',
        'recipientEmail' => $customer->email,
    ]);

    // Simulate dummy attachments
    $file1 = \Illuminate\Http\UploadedFile::fake()->create('site_photo.jpg', 50, 'image/jpeg');
    $request->files->add(['attachments' => [$file1]]);

    try {
        $controller = app(\App\Http\Controllers\CustomerController::class);
        $response = $controller->sendReportEmail($request);

        return response()->json([
            'status' => 'Test Executed (Report)',
            'customer_targeted' => $customer->customers_name,
            'controller_response' => $response->getData()
        ]);
    } catch (\Exception $e) {
        return "An error occurred during testing: " . $e->getMessage();
    }
});

// Test Route for sendEditReportEmail
Route::get('/test-edit-report-notification', function () {
    $customer = \App\Models\Customer::first();
    if (!$customer)
        return "Error: No customer found.";

    $request = new \Illuminate\Http\Request();
    $request->setMethod('POST');
    $request->request->add([
        'subject' => 'REVISED: Inspection Report',
        'body' => 'The site inspection report has been updated with corrections.',
        'recipientEmail' => $customer->email,
    ]);

    try {
        $controller = app(\App\Http\Controllers\CustomerController::class);
        $response = $controller->sendEditReportEmail($request);

        return response()->json([
            'status' => 'Test Executed (Edit Report)',
            'customer_targeted' => $customer->customers_name,
            'controller_response' => $response->getData()
        ]);
    } catch (\Exception $e) {
        return "An error occurred during testing: " . $e->getMessage();
    }
});

Route::post('/admin/whatsapp/send-batch', [\App\Http\Controllers\Api\WhatsAppFlowController::class, 'sendBatch'])->name('admin.whatsapp.send_batch');
Route::post('/whatsapp/flow-response', [\App\Http\Controllers\Api\WhatsAppFlowController::class, 'handleFlowResponse']);

Route::get('/test-feedback-flow', function () {

    $customer = \App\Models\Customer::first();
    if (!$customer)
        return "Error: No customer found.";

    try {
        $manager = app(\App\Services\WhatsApp\WhatsAppNotificationManager::class);
        $result = $manager->sendFeedbackFlow(
            $customer->whatsapp_number ?? $customer->phone,
            $customer->customers_name,
            $customer
        );

        return response()->json([
            'status' => 'Feedback Flow Triggered',
            'customer_targeted' => $customer->customers_name,
            'whatsapp_result' => $result
        ]);
    } catch (\Exception $e) {
        return "An error occurred: " . $e->getMessage();
    }
});
