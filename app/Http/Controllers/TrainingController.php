<?php

namespace App\Http\Controllers;

use App\Models\Hrm;
use App\Models\Type;
use App\Models\Customer;
use App\Models\Training;
use App\Models\TrainingPoc;
use App\Models\TrainEmerser;
use Illuminate\Http\Request;
use App\Models\ChecklistItem;
use App\Models\TrainingItems;
use App\Models\TrainingBudget;
use App\Models\TrainingWeapon;
use App\Imports\TrainingsImport;
use App\Models\TrainingArmourer;
use App\Mail\ActiveEmailMailable;
use App\Models\TrainingEmergency;
use App\Models\TrainingAmmunition;
use App\Models\TrainingEquipments;
use Illuminate\Support\Facades\DB;
use App\Mail\InActiveEmailMailable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Mail\TrainingNotificationMail;

class TrainingController extends Controller
{

    public function trainingbulkDelete(Request $request)
    {
        $ids = $request->ids; // array of selected IDs
        if (!empty($ids)) {
            // Optional: log before deletion
            Log::info('Soft deleting training records with IDs:', $ids);

            // Perform soft delete
            Training::whereIn('id', $ids)->delete();

            return response()->json(['success' => 'Trainings soft deleted successfully.']);
        }

        return response()->json(['error' => 'No IDs provided.'], 400);
    }
    public function train()
    {
        $trainingData = Training::all();

        return view('training.train', compact('trainingData'));
    }
    public function checkTrainingNumber($number)
    {
        $decoded = urldecode($number);
        $exists = \App\Models\Training::where('training_no', $decoded)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function posttrain()
    {
        $types = Type::all();
        $trainemerser = TrainEmerser::all();
        $guardRecords = Hrm::where('category', 'guard')->get();
        $activeCustomerRecords = Customer::where('customers_activation_check', '1')->get();
        $inactiveCustomerRecords = Customer::where('customers_activation_check', '0')->get();
        return view('training.posttrain', compact('types', 'trainemerser', 'guardRecords', 'activeCustomerRecords', 'inactiveCustomerRecords'));
    }

    public function getAllGuards()
    {
        $guards = Hrm::where('category', 'guard')->select(
            'name',
            'fname',
            'employee_no',
            'hrm_region',
            'hrm_location'
        )->get();

        return response()->json($guards);
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls',
        ]);

        try {
            Log::info('Attempting to import training data.');

            Excel::import(new TrainingsImport(), $request->file('file'));

            Log::info('Training data imported successfully.');

            return redirect()->back()->with('success', 'Training data imported successfully!');
        } catch (\Exception $e) {
            Log::error('Error importing training data: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Error importing training data: ' . $e->getMessage());
        }
    }


    public function submit_train(Request $request)
    {
        DB::beginTransaction();

        try {
            $trainData = $request->except('_token');
            Log::info('Request data:', $request->all());

            $checkboxFields = [
                'email_active_check',
                'email_inactive_check',
                'email_all_check',
                'guards_respective',
                'general_check',
                'weapon_check',
                'frisking_check',
                'gatehouse_check',
                'optimum_check',
                'radio_check',
                'aid_check',
                'fire_check',
                'self_check',
                'close_check',
                'crime_check',
                'first_aid_check',
                'umbrella_check',
                'wireless_check',
                'mega_check',
                'sofa_check',
                'water_check',
                'point_one_check',
                'point_two_check',
                'point_three_check',
                'point_four_check',
                'point_five_check',
                'point_six_check',
                'point_seven_check',
                'point_eight_check',
                'point_nine_check',
                'point_ten_check',
                'point_eleven_check',
                'point_twelve_check',
                'point_thirteen_check',
                'point_forteen_check',
                'point_fifteen_check',
                'point_sixteen_check',
                'point_seventeen_check',
                'point_eighteen_check',
                'point_ninteen_check',
                'point_twenty_check',
                'point_twentyone_check',
                'point_twentytwo_check',
                'point_twentythree_check',
                'point_twentyfour_check',
                'point_twentyfive_check',
                'point_twentysix_check',
            ];

            foreach ($checkboxFields as $field) {
                $trainData[$field] = $request->has($field) ? true : false;
            }

            $trainVideoFields = [
                'demo',
                'general_video',
                'weapon_video',
                'frisking_video',
                'gatehouse_video',
                'optimum_video',
                'radio_video',
                'firstaid_video',
                'fire_video',
                'self_video',
                'close_video',
                'crime_video',
            ];

            foreach ($trainVideoFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('trains/videos'), $file_name);
                    $trainData[$field] = 'trains/videos/' . $file_name;
                }
            }

            $trainImageFields = [
                'photo',
                'booking_attach',
                'range_allocation_attach',
                'copy_booking_attach',
                'media_attach',
                'media_attach_2',
                'hospital_pic',
                'incident_attach',
                'suggestion_attach',
                'observation_attach',
                'remarks_attach',
                't_range_front',
                't_range_back',
                't_range_photo',
                'guard_resp_attach',
                'list_guard_attach',
                'general_literature',
                'weapon_literature',
                'frisking_literature',
                'gatehouse_literature',
                'optimum_literature',
                'radio_literature',
                'firstaid_literature',
                'fire_literature',
                'self_literature',
                'close_literature',
                'crime_literature',
                'expenses_proof_attach',
            ];

            foreach ($trainImageFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('trains/images'), $file_name);
                    $trainData[$field] = 'trains/images/' . $file_name;
                }
            }

            if ($request->has('training_activation')) {
                $trainData['training_activation'] = $request->input('training_activation');
            }

            $training = Training::create($trainData);


            $training->guards()->attach($request->input('guard_ids'));


            $trainingBudgetData = $request->only([
                'budget_category',
                'mode_of_payment',
                'budget_ins_no',
                'name_of_bank',
                'date_of_payment',
                'amount_per_unit',
                'quantity',
                'total_amount',
            ]);

            $trainingBudgetDataArray = [];
            foreach ($trainingBudgetData['budget_category'] as $index => $budgetCategory) {
                $trainingBudgetDataRow = [
                    'budget_category' => $budgetCategory,
                    'mode_of_payment' => $trainingBudgetData['mode_of_payment'][$index],
                    'budget_ins_no' => $trainingBudgetData['budget_ins_no'][$index],
                    'name_of_bank' => $trainingBudgetData['name_of_bank'][$index],
                    'date_of_payment' => $trainingBudgetData['date_of_payment'][$index],
                    'amount_per_unit' => $trainingBudgetData['amount_per_unit'][$index],
                    'total_amount' => $trainingBudgetData['total_amount'][$index],

                ];

                $checkboxFields = ['out_of_scope'];

                foreach ($checkboxFields as $field) {
                    $value = $request->input($field);
                    error_log("Checkbox value for $field: $value");
                    $trainingBudgetData[$field] = $value ? 1 : 0;
                }

                $trainingBudgetFields = [
                    'cheque_attach',
                    'voucher_attach',
                ];

                foreach ($trainingBudgetFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('trains/images'), $file_name);
                        $trainingBudgetDataRow[$field] = 'trains/images/' . $file_name;
                    }
                }

                $trainingBudgetDataArray[] = $trainingBudgetDataRow;
            }

            $training->trainingbudgets()->createMany($trainingBudgetDataArray);

            //Training Weapon Data

            $trainingWeaponData = $request->only([
                'type_of_weapon',
                'weapon_no',
                'caliber',
                'bore',
                'weapon_price_pu',
                'weapon_total_price',
                'weapon_quantity',
                'person_responsible_weapon',
                'weapon_notes',
            ]);

            $trainingWeaponDataArray = [];
            foreach ($trainingWeaponData['type_of_weapon'] as $index => $typeofWeapon) {
                $trainingWeaponDataRow = [
                    'type_of_weapon' => $typeofWeapon,
                    'weapon_no' => $trainingWeaponData['weapon_no'][$index],
                    'caliber' => $trainingWeaponData['caliber'][$index],
                    'bore' => $trainingWeaponData['bore'][$index],
                    'weapon_price_pu' => $trainingWeaponData['weapon_price_pu'][$index],
                    'weapon_total_price' => $trainingWeaponData['weapon_total_price'][$index],
                    'weapon_quantity' => $trainingWeaponData['weapon_quantity'][$index],
                    'person_responsible_weapon' => $trainingWeaponData['person_responsible_weapon'][$index],
                    'weapon_notes' => $trainingWeaponData['weapon_notes'][$index],
                ];

                $trainingWeaponImageFields = [
                    'weapon_attach',
                ];

                foreach ($trainingWeaponImageFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('trains/images'), $file_name);
                        $trainingWeaponDataRow[$field] = 'trains/images/' . $file_name;
                    }
                }

                $trainingWeaponDataArray[] = $trainingWeaponDataRow;
            }

            $training->trainingweapons()->createMany($trainingWeaponDataArray);

            //Training Poc Add more data
            $trainingPocData = $request->only([
                'poc_name',
                'poc_desig',
                'poc_fax',
                'poc_phone',
                'poc_mobile',
                'poc_web',
                'poc_email',
                'poc_loc',
                'poc_document',
                'system_id',
                'other_info'
            ]);

            $trainingPocDataArray = [];
            foreach ($trainingPocData['poc_name'] as $index => $pocName) {
                $trainingPocDataRow = [
                    'poc_name' => $pocName,
                    'poc_desig' => $trainingPocData['poc_desig'][$index],
                    'poc_fax' => $trainingPocData['poc_fax'][$index],
                    'poc_phone' => $trainingPocData['poc_phone'][$index],
                    'poc_mobile' => $trainingPocData['poc_mobile'][$index],
                    'poc_web' => $trainingPocData['poc_web'][$index],
                    'poc_email' => $trainingPocData['poc_email'][$index],
                    'poc_loc' => $trainingPocData['poc_loc'][$index],
                    'poc_document' => $trainingPocData['poc_document'][$index],
                    'system_id' => $trainingPocData['system_id'][$index],
                    'other_info' => $trainingPocData['other_info'][$index],
                ];


                $trainingPocDataArray[] = $trainingPocDataRow;
            }

            $training->trainingpocs()->createMany($trainingPocDataArray);

            //Training Ammunition Data

            $trainingAmmunitionData = $request->only([
                'ammu_quantity',
                'ammu_type',
                'person_responsible_ammu',
                'price_per_unit_ammu',
                'total_price_ammu',
                'ammu_notes',
            ]);

            $trainingAmmunitionDataArray = [];
            foreach ($trainingAmmunitionData['ammu_quantity'] as $index => $ammuQuantity) {
                $trainingAmmunitionDataRow = [
                    'ammu_quantity' => $ammuQuantity,
                    'ammu_type' => $trainingAmmunitionData['ammu_type'][$index],
                    'person_responsible_ammu' => $trainingAmmunitionData['person_responsible_ammu'][$index],
                    'price_per_unit_ammu' => $trainingAmmunitionData['price_per_unit_ammu'][$index],
                    'total_price_ammu' => $trainingAmmunitionData['total_price_ammu'][$index],
                    'ammu_notes' => $trainingAmmunitionData['ammu_notes'][$index],
                ];

                $trainingAmmunitionFields = [
                    'ammu_attach',
                ];

                foreach ($trainingAmmunitionFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('trains/images'), $file_name);
                        $trainingAmmunitionDataRow[$field] = 'trains/images/' . $file_name;
                    }
                }

                $trainingAmmunitionDataArray[] = $trainingAmmunitionDataRow;
            }

            $training->trainingammunitions()->createMany($trainingAmmunitionDataArray);

            $trainingArmourerData = $request->only([
                'armourer_name',
                'armourer_cell',
                'armourer_notes',
            ]);

            $trainingArmourerDataArray = [];
            foreach ($trainingArmourerData['armourer_name'] as $index => $armourerName) {
                $trainingArmourerDataRow = [
                    'armourer_name' => $armourerName,
                    'armourer_cell' => $trainingArmourerData['armourer_cell'][$index],
                    'armourer_notes' => $trainingArmourerData['armourer_notes'][$index],
                ];

                $trainingArmourerFields = [
                    'armourer_attach',
                ];

                foreach ($trainingArmourerFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('trains/images'), $file_name);
                        $trainingArmourerDataRow[$field] = 'trains/images/' . $file_name;
                    }
                }

                $trainingArmourerDataArray[] = $trainingArmourerDataRow;
            }

            $training->trainingarmourers()->createMany($trainingArmourerDataArray);

            //Training Equipments Data

            $trainingEquipmentData = $request->only([
                'sec_equip_category',
                'sec_equip_type',
                'sec_equip_pricepu',
                'sec_equip_quantity',
                'sec_equip_totalprice',
                'person_responsible_sec_equip',
                'sec_equip_notes',
                'red_flag_quantity',
                'target_quantity',
            ]);

            $trainingEquipmentDataArray = [];
            foreach ($trainingEquipmentData['sec_equip_category'] as $index => $secequipCategory) {
                $trainingEquipmentDataRow = [
                    'sec_equip_category' => $secequipCategory,
                    'sec_equip_type' => $trainingEquipmentData['sec_equip_type'][$index],
                    'sec_equip_pricepu' => $trainingEquipmentData['sec_equip_pricepu'][$index],
                    'sec_equip_quantity' => $trainingEquipmentData['sec_equip_quantity'][$index],
                    'sec_equip_totalprice' => $trainingEquipmentData['sec_equip_totalprice'][$index],
                    'person_responsible_sec_equip' => $trainingEquipmentData['person_responsible_sec_equip'][$index],
                    'sec_equip_notes' => $trainingEquipmentData['sec_equip_notes'][$index],
                    'red_flag_quantity' => $trainingEquipmentData['red_flag_quantity'][$index],
                    'target_quantity' => $trainingEquipmentData['target_quantity'][$index],
                ];

                $trainingEquipmentFields = [
                    'sec_equip_attach',
                ];

                foreach ($trainingEquipmentFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('trains/images'), $file_name);
                        $trainingEquipmentDataRow[$field] = 'trains/images/' . $file_name;
                    }
                }

                $trainingEquipmentDataArray[] = $trainingEquipmentDataRow;
            }

            $training->trainingequipments()->createMany($trainingEquipmentDataArray);

            //Training Items List Data

            $trainingItemsData = $request->only([
                'list_items_category',
                'item_category',
                'item_type',
                'item_supplier',
                'item_quantity',
                'item_price',
                'item_total_price',
                'item_notes',
                'item_vendor',
                'vendor_cell',
                'vendor_floor',
                'vendor_building',
                'vendor_block',
                'vendor_area',
                'vendor_city',
                'vendor_email',
                'vendor_website',
                'vendor_gps',
                'vendor_notes',
            ]);

            $trainingItemsDataArray = [];
            foreach ($trainingItemsData['list_items_category'] as $index => $listitemsCategory) {
                $trainingItemsDataRow = [
                    'list_items_category' => $listitemsCategory,
                    'item_category' => $trainingItemsData['item_category'][$index],
                    'item_type' => $trainingItemsData['item_type'][$index],
                    'item_supplier' => $trainingItemsData['item_supplier'][$index],
                    'item_quantity' => $trainingItemsData['item_quantity'][$index],
                    'item_price' => $trainingItemsData['item_price'][$index],
                    'item_total_price' => $trainingItemsData['item_total_price'][$index],
                    'item_notes' => $trainingItemsData['item_notes'][$index],
                    'item_vendor' => $trainingItemsData['item_vendor'][$index],
                    'vendor_cell' => $trainingItemsData['vendor_cell'][$index],
                    'vendor_floor' => $trainingItemsData['vendor_floor'][$index],
                    'vendor_building' => $trainingItemsData['vendor_building'][$index],
                    'vendor_block' => $trainingItemsData['vendor_block'][$index],
                    'vendor_area' => $trainingItemsData['vendor_area'][$index],
                    'vendor_city' => $trainingItemsData['vendor_city'][$index],
                    'vendor_email' => $trainingItemsData['vendor_email'][$index],
                    'vendor_website' => $trainingItemsData['vendor_website'][$index],
                    'vendor_gps' => $trainingItemsData['vendor_gps'][$index],
                    'vendor_notes' => $trainingItemsData['vendor_notes'][$index],
                ];

                $trainingItemsFields = [
                    'item_attach',
                    'vendor_attach',
                ];

                foreach ($trainingItemsFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('trains/images'), $file_name);
                        $trainingItemsDataRow[$field] = 'trains/images/' . $file_name;
                    }
                }

                $trainingItemsDataArray[] = $trainingItemsDataRow;
            }

            $training->trainingitems()->createMany($trainingItemsDataArray);

            //Training Emergency  Data

            $trainingEmergencyData = $request->only([
                'train_emer_ser',
                'train_emer_poc_name',
                'train_emer_poc_desig',
                'train_emer_poc_cell',
                'train_emer_poc_email',
                'train_emer_poc_notes',
                'train_emer_office',
                'train_emer_building',
                'train_emer_block',
                'train_emer_area',
                'train_emer_city',
                'train_emer_email',
                'train_emer_web',
                'train_emer_pin',
                'train_emer_app_rental',
                'train_emer_note',
            ]);

            $trainingEmergencyDataArray = [];
            foreach ($trainingEmergencyData['train_emer_ser'] as $index => $trainemerSer) {
                $trainingEmergencyDataRow = [
                    'train_emer_ser' => $trainemerSer,
                    'train_emer_poc_name' => $trainingEmergencyData['train_emer_poc_name'][$index],
                    'train_emer_poc_desig' => $trainingEmergencyData['train_emer_poc_desig'][$index],
                    'train_emer_poc_cell' => $trainingEmergencyData['train_emer_poc_cell'][$index],
                    'train_emer_poc_email' => $trainingEmergencyData['train_emer_poc_email'][$index],
                    'train_emer_poc_notes' => $trainingEmergencyData['train_emer_poc_notes'][$index],
                    'train_emer_office' => $trainingEmergencyData['train_emer_office'][$index],
                    'train_emer_building' => $trainingEmergencyData['train_emer_building'][$index],
                    'train_emer_block' => $trainingEmergencyData['train_emer_block'][$index],
                    'train_emer_area' => $trainingEmergencyData['train_emer_area'][$index],
                    'train_emer_city' => $trainingEmergencyData['train_emer_city'][$index],
                    'train_emer_email' => $trainingEmergencyData['train_emer_email'][$index],
                    'train_emer_web' => $trainingEmergencyData['train_emer_web'][$index],
                    'train_emer_pin' => $trainingEmergencyData['train_emer_pin'][$index],

                    'train_emer_app_rental' => $trainingEmergencyData['train_emer_app_rental'][$index],
                    'train_emer_note' => $trainingEmergencyData['train_emer_note'][$index],
                ];

                $trainingEmergencyFields = [
                    'train_emer_pic',
                    'train_emer_poc_attach',
                    'train_emer_buildphoto',
                    'train_emer_attach',
                ];

                foreach ($trainingEmergencyFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('trains/images'), $file_name);
                        $trainingEmergencyDataRow[$field] = 'trains/images/' . $file_name;
                    }
                }

                $trainingEmergencyDataArray[] = $trainingEmergencyDataRow;
            }

            $training->trainingemergencies()->createMany($trainingEmergencyDataArray);



            $guard_ids = $request->input('guards', []); // default to empty array if not provided

            $guards = Hrm::whereIn('id', $guard_ids)->get();

            foreach ($guards as $guard) {
                if (empty($guard->email)) {
                    Log::warning('Guard has no email', ['guard_id' => $guard->id]);
                } else {
                    Mail::to($guard->email)->send(new TrainingNotificationMail($training, $guard));

                    // Send WhatsApp Notification for Training
                    if ($guard->cell) {
                        app(\App\Services\WhatsApp\WhatsAppNotificationManager::class)->send(
                            phone: $guard->cell,
                            message: "Dear {$guard->name},\n\nYou have been assigned to a new Training session: " . ($training->training_no ?? 'N/A') . ".\n\nPlease check your email for the full schedule and details.\n\nRegards,\nPiffers Security System",
                            eventType: 'training_assignment',
                            user: $guard
                        );
                    }
                }

                if (!$guard->customer) {
                    Log::warning('Guard has no associated customer', ['guard_id' => $guard->id]);
                } elseif (empty($guard->customer->email)) {
                    Log::warning('Customer has no email', [
                        'guard_id' => $guard->id,
                        'customer_id' => $guard->customer->id
                    ]);
                } else {
                    if ($guard->customer->notification_status == 1) {
                        Mail::to($guard->customer->email)->send(new TrainingNotificationMail($training, $guard));
                    }
                }
            }


            DB::commit();

            $trainingId = $training->id;
            session()->flash('success', 'Training data successfully stored.');
            session()->flash('trainingId', $trainingId);

            Log::info('Training data successfully stored.');
            if ($request->has('save_and_email')) {
                $url = route('viewtrain', ['id' => $trainingId]);
                return redirect()->to($url)->with('success', 'Training data successfully stored.');
            } elseif ($request->has('save_and_new')) {
                return redirect()->route('posttrain')->with('success', 'Training data successfully stored.');
            } elseif ($request->has('save_and_share')) {
                return redirect()->route('posttrain')->with('success', 'Training data successfully stored.')->with('trainingId', $trainingId);
            } else {
                return redirect()->route('train')->with('success', 'Training data successfully stored.');
            }


        } catch (\Exception $e) {
            DB::rollback();

            Log::error('An error occurred while saving Training data: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while saving data.');
        }
    }

    public function viewtrain($id)
    {
        $trainings = Training::find($id);
        $types = Type::all();
        $trainemerser = TrainEmerser::all();
        $associatedGuards = $trainings->guards()->get();
        return view('training.viewtrain', compact('trainings', 'types', 'trainemerser', 'associatedGuards'));
    }



    public function sendMultipleEmails(Request $request)
    {
        $request->validate([
            'customers' => 'required|array',
            'subject' => 'required|string',
            'body' => 'required|string',
            'attachment' => 'nullable|file|max:2048', // Allow null for attachment, adjust max file size as needed
        ]);

        $customers = $request->input('customers');
        $emailCC = $request->input('cc');
        $emailBCC = $request->input('bcc');
        $emailSubject = $request->input('subject');
        $emailBody = $request->input('body');
        $attachment = $request->file('attachment');

        try {
            foreach ($customers as $customerData) {
                $customerId = $customerData['customerId'];
                $customerEmail = $customerData['email'];

                $customer = Customer::find($customerId);

                if (!$customer) {
                    Log::error('Customer not found for ID ' . $customerId);
                }

                if ($customer->notification_status != 1) {
                    continue;
                }

                Mail::raw($emailBody, function ($message) use ($customerEmail, $emailSubject, $attachment, $emailCC, $emailBCC) {
                    $message->to($customerEmail)
                        ->subject($emailSubject);

                    if ($emailCC) {
                        $message->cc($emailCC);
                    }


                    if ($emailBCC) {
                        $message->bcc($emailBCC);
                    }

                    if ($attachment) {
                        $message->attach($attachment->getRealPath(), [
                            'as' => $attachment->getClientOriginalName(),
                            'mime' => $attachment->getClientMimeType()
                        ]);
                    }
                });

                Log::info('Email sent successfully to ' . $customerEmail);
            }

            return response()->json(['status' => 'success', 'message' => 'Emails sent successfully.']);
        } catch (\Exception $e) {
            Log::error('Failed to send emails. Error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Failed to send emails.']);
        }
    }

    public function sendEditMultipleEmails(Request $request)
    {
        $request->validate([
            'customers' => 'required|array',
            'subject' => 'required|string',
            'body' => 'required|string',
            'attachment' => 'nullable|file|max:2048', // Allow null for attachment, adjust max file size as needed
        ]);

        $customers = $request->input('customers');
        $emailCC = $request->input('cc');
        $emailBCC = $request->input('bcc');
        $emailSubject = $request->input('subject');
        $emailBody = $request->input('body');
        $attachment = $request->file('attachment');

        try {
            foreach ($customers as $customerData) {
                $customerId = $customerData['customerId'];
                $customerEmail = $customerData['email'];

                $customer = Customer::find($customerId);

                if (!$customer) {
                    Log::error('Customer not found for ID ' . $customerId);
                    continue; // Skip to the next customer if not found
                }

                if ($customer->notification_status != 1) {
                    continue;
                }

                Mail::raw($emailBody, function ($message) use ($customerEmail, $emailSubject, $attachment, $emailCC, $emailBCC) {
                    $message->to($customerEmail)
                        ->subject($emailSubject);

                    if ($emailCC) {
                        $message->cc($emailCC);
                    }


                    if ($emailBCC) {
                        $message->bcc($emailBCC);
                    }

                    if ($attachment) {
                        $message->attach($attachment->getRealPath(), [
                            'as' => $attachment->getClientOriginalName(),
                            'mime' => $attachment->getClientMimeType()
                        ]);
                    }
                });

                Log::info('Email sent successfully to ' . $customerEmail);
            }

            return response()->json(['status' => 'success', 'message' => 'Emails sent successfully.']);
        } catch (\Exception $e) {
            Log::error('Failed to send emails. Error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Failed to send emails.']);
        }
    }

    public function sendInactiveEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'customerId' => 'required',
        ]);

        $customerId = $request->input('customerId');
        $customerEmail = $request->input('email');

        try {
            $customer = Customer::find($customerId);

            if ($customer->notification_status != 1) {
                return response()->json(['status' => 'error', 'message' => 'Failed to send inactive email. Customer notification disabled.']);
            }

            if (!$customer) {
                throw new \Exception('Customer not found');
            }

            try {
                Mail::to($customerEmail)->send(new InActiveEmailMailable($customer));
                Log::info('Inactive Email sent successfully to ' . $customerEmail);
                return response()->json(['status' => 'success', 'message' => 'Inactive Email sent successfully.']);
            } catch (\Exception $e) {
                Log::error('Failed to send inactive email. Error: ' . $e->getMessage());
                return response()->json(['status' => 'error', 'message' => 'Failed to send inactive email.']);
            }
        } catch (\Exception $e) {
            Log::error('Failed to send inactive email. Error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Failed to send inactive email.']);
        }
    }

    public function sendInactiveMultipleEmail(Request $request)
    {
        $request->validate([
            'customers' => 'required|array',
            'subject' => 'required|string',
            'body' => 'required|string',
            'attachment' => 'nullable|file|max:2048', // Allow null for attachment, adjust max file size as needed
        ]);

        $customers = $request->input('customers');
        $inactiveemailCC = $request->input('cc');
        $inactiveemailBCC = $request->input('bcc');
        $emailSubject = $request->input('subject');
        $emailBody = $request->input('body');
        $attachment = $request->file('attachment');

        try {
            foreach ($customers as $customerData) {
                $customerId = $customerData['customerId'];
                $customerEmail = $customerData['email'];

                $customer = Customer::find($customerId);

                if (!$customer) {
                    Log::error('Inactive Customer not found for ID ' . $customerId);
                    continue; // Skip to the next customer if not found
                }

                if ($customer->notification_status != 1) {
                    continue;
                }

                // Send email directly
                Mail::raw($emailBody, function ($message) use ($customerEmail, $emailSubject, $attachment, $inactiveemailCC, $inactiveemailBCC) {
                    $message->to($customerEmail)
                        ->subject($emailSubject);

                    if ($inactiveemailCC) {
                        $message->cc($inactiveemailCC);
                    }


                    if ($inactiveemailBCC) {
                        $message->bcc($inactiveemailBCC);
                    }


                    if ($attachment) {
                        $message->attach($attachment->getRealPath(), [
                            'as' => $attachment->getClientOriginalName(),
                            'mime' => $attachment->getClientMimeType()
                        ]);
                    }
                });

                Log::info('Inactive Email sent successfully to ' . $customerEmail);
            }

            return response()->json(['status' => 'success', 'message' => 'Inactive Emails sent successfully.']);
        } catch (\Exception $e) {
            Log::error('Failed to send inactive emails. Error: ' . $e->getMessage());

            return response()->json(['status' => 'error', 'message' => 'Failed to send inactive emails.']);
        }
    }

    public function sendEditInactiveMultipleEmail(Request $request)
    {
        $request->validate([
            'customers' => 'required|array',
            'subject' => 'required|string',
            'body' => 'required|string',
            'attachment' => 'nullable|file|max:2048', // Allow null for attachment, adjust max file size as needed
        ]);

        $customers = $request->input('customers');
        $inactiveemailCC = $request->input('cc');
        $inactiveemailBCC = $request->input('bcc');
        $emailSubject = $request->input('subject');
        $emailBody = $request->input('body');
        $attachment = $request->file('attachment');

        try {
            foreach ($customers as $customerData) {
                $customerId = $customerData['customerId'];
                $customerEmail = $customerData['email'];

                $customer = Customer::find($customerId);

                if (!$customer) {
                    Log::error('Inactive Customer not found for ID ' . $customerId);
                    continue; // Skip to the next customer if not found
                }

                if ($customer->notification_status != 1) {
                    continue;
                }

                // Send email directly
                Mail::raw($emailBody, function ($message) use ($customerEmail, $emailSubject, $attachment, $inactiveemailCC, $inactiveemailBCC) {
                    $message->to($customerEmail)
                        ->subject($emailSubject);

                    if ($inactiveemailCC) {
                        $message->cc($inactiveemailCC);
                    }


                    if ($inactiveemailBCC) {
                        $message->bcc($inactiveemailBCC);
                    }


                    if ($attachment) {
                        $message->attach($attachment->getRealPath(), [
                            'as' => $attachment->getClientOriginalName(),
                            'mime' => $attachment->getClientMimeType()
                        ]);
                    }
                });

                Log::info('Inactive Email sent successfully to ' . $customerEmail);
            }

            return response()->json(['status' => 'success', 'message' => 'Inactive Emails sent successfully.']);
        } catch (\Exception $e) {
            Log::error('Failed to send inactive emails. Error: ' . $e->getMessage());

            return response()->json(['status' => 'error', 'message' => 'Failed to send inactive emails.']);
        }
    }


    public function edittrain($id)
    {

        $trainings = Training::find($id);
        $types = Type::all();
        $trainemerser = TrainEmerser::all();
        $associatedGuards = $trainings->guards()->get();
        $activeCustomerRecords = Customer::where('customers_activation_check', '1')->get();
        $inactiveCustomerRecords = Customer::where('customers_activation_check', '0')->get();
        $hrmData = Hrm::all();
        $checklistItems = ChecklistItem::all();
        return view('training.edit', compact('trainings', 'types', 'trainemerser', 'associatedGuards', 'activeCustomerRecords', 'inactiveCustomerRecords', 'hrmData', 'checklistItems'));
    }

    public function update_train(Request $request, $id)
    {
        Log::info('Request data:', $request->all());
        Log::info('Files:', $request->allFiles());

        DB::beginTransaction();
        try {
            $trainData = $request->except('_token', '_method');

            // Handle checkbox fields (convert present to true, absent to false)
            $checkboxFields = [
                'email_active_check',
                'email_inactive_check',
                'email_all_check',
                'guards_respective',
                'general_check',
                'weapon_check',
                'frisking_check',
                'gatehouse_check',
                'optimum_check',
                'radio_check',
                'aid_check',
                'fire_check',
                'self_check',
                'close_check',
                'crime_check',
                'first_aid_check',
                'umbrella_check',
                'wireless_check',
                'mega_check',
                'sofa_check',
                'water_check',
                'point_one_check',
                'point_two_check',
                'point_three_check',
                'point_four_check',
                'point_five_check',
                'point_six_check',
                'point_seven_check',
                'point_eight_check',
                'point_nine_check',
                'point_ten_check',
                'point_eleven_check',
                'point_twelve_check',
                'point_thirteen_check',
                'point_forteen_check',
                'point_fifteen_check',
                'point_sixteen_check',
                'point_seventeen_check',
                'point_eighteen_check',
                'point_ninteen_check',
                'point_twenty_check',
                'point_twentyone_check',
                'point_twentytwo_check',
                'point_twentythree_check',
                'point_twentyfour_check',
                'point_twentyfive_check',
                'point_twentysix_check',
            ];

            foreach ($checkboxFields as $field) {
                $trainData[$field] = $request->has($field);
            }

            // Handle video uploads
            $trainVideoFields = [
                'demo',
                'general_video',
                'weapon_video',
                'frisking_video',
                'gatehouse_video',
                'optimum_video',
                'radio_video',
                'firstaid_video',
                'fire_video',
                'self_video',
                'close_video',
                'crime_video',
            ];

            foreach ($trainVideoFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('trains/videos'), $file_name);
                    $trainData[$field] = 'trains/videos/' . $file_name;
                }
            }

            // Handle image uploads
            $trainImageFields = [
                'photo',
                'booking_attach',
                'range_allocation_attach',
                'copy_booking_attach',
                'media_attach',
                'media_attach_2',
                'hospital_pic',
                'incident_attach',
                'suggestion_attach',
                'observation_attach',
                'remarks_attach',
                't_range_front',
                't_range_back',
                't_range_photo',
                'guard_resp_attach',
                'list_guard_attach',
                'general_literature',
                'weapon_literature',
                'frisking_literature',
                'gatehouse_literature',
                'optimum_literature',
                'radio_literature',
                'firstaid_literature',
                'fire_literature',
                'self_literature',
                'close_literature',
                'crime_literature',
                'expenses_proof_attach',
            ];

            foreach ($trainImageFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('trains/images'), $file_name);
                    $trainData[$field] = 'trains/images/' . $file_name;
                }
            }

            if ($request->has('training_activation')) {
                $trainData['training_activation'] = $request->input('training_activation');
            }

            $train = Training::findOrFail($id);
            $train->update($trainData);

            // === Training Budgets ===
            $trainingbudgetsData = $request->input('trainingbudgets', []);
            foreach ($trainingbudgetsData as $index => $trainingbudgetData) {
                $trainingbudgetId = $trainingbudgetData['b_id'] ?? null;

                // Handle nested file uploads
                if ($request->hasFile("trainingbudgets.{$index}.cheque_attach")) {
                    $file = $request->file("trainingbudgets.{$index}.cheque_attach");
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('trains/images'), $file_name);
                    $trainingbudgetData['cheque_attach'] = 'trains/images/' . $file_name;
                }

                if ($request->hasFile("trainingbudgets.{$index}.voucher_attach")) {
                    $file = $request->file("trainingbudgets.{$index}.voucher_attach");
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('trains/images'), $file_name);
                    $trainingbudgetData['voucher_attach'] = 'trains/images/' . $file_name;
                }

                if (empty($trainingbudgetId)) {
                    $train->trainingbudgets()->create($trainingbudgetData);
                } else {
                    $budget = TrainingBudget::find($trainingbudgetId);
                    if ($budget) {
                        $budget->update($trainingbudgetData);
                    }
                }
            }

            // === Helper function to process nested related data with file uploads ===
            $this->syncRelatedWithFiles($request, $train, 'trainingpocs', 'poc_id', []);
            $this->syncRelatedWithFiles($request, $train, 'trainingweapons', 'w_id', ['weapon_attach']);
            $this->syncRelatedWithFiles($request, $train, 'trainingammunitions', 'am_id', ['ammu_attach']);
            $this->syncRelatedWithFiles($request, $train, 'trainingarmourers', 'arm_id', ['armourer_attach']);
            $this->syncRelatedWithFiles($request, $train, 'trainingequipments', 'e_id', ['sec_equip_attach']);
            $this->syncRelatedWithFiles($request, $train, 'trainingitems', 'item_id', ['item_attach', 'vendor_attach']);
            $this->syncRelatedWithFiles($request, $train, 'trainingemergencies', 'te_id', ['train_emer_pic', 'train_emer_poc_attach', 'train_emer_buildphoto', 'train_emer_attach']);

            DB::commit();

            $trainingId = $train->id;
            session()->flash('success', 'Training data successfully updated.');
            session()->flash('trainingId', $trainingId);
            Log::info('Training data successfully updated.', ['id' => $trainingId]);

            if ($request->has('save_and_email')) {
                $url = route('viewtrain', ['id' => $trainingId]);
                return redirect()->to($url)->with('success', 'Training data successfully updated.');
            } elseif ($request->has('save_and_new')) {
                return redirect()->route('posttrain')->with('success', 'Training data successfully updated.');
            } elseif ($request->has('save_and_share')) {
                return redirect()->route('posttrain')
                    ->with('success', 'Training data successfully updated.')
                    ->with('trainingId', $trainingId);
            } else {
                return redirect()->route('train')->with('success', 'Training data successfully updated.');
            }

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Training update error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()->with('error', 'An error occurred while updating data: ' . $e->getMessage());
        }
    }

    // Helper method to avoid code duplication
    private function syncRelatedWithFiles($request, $train, $relation, $idField, $fileFields)
    {
        $data = $request->input($relation, []);

        foreach ($data as $index => $itemData) {
            $itemId = $itemData[$idField] ?? null;

            // Handle file uploads for this row
            foreach ($fileFields as $field) {
                $fileKey = "{$relation}.{$index}.{$field}";
                if ($request->hasFile($fileKey)) {
                    $file = $request->file($fileKey);
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('trains/images'), $file_name);
                    $itemData[$field] = 'trains/images/' . $file_name;
                }
            }

            if (empty($itemId)) {
                $train->{$relation}()->create($itemData);
            } else {
                $record = $train->{$relation}()->find($itemId);
                if ($record) {
                    $record->update($itemData);
                }
            }
        }
    }

    public function storechecklist(Request $request)
    {
        ChecklistItem::create([
            'checklist' => $request->input('checklist'),
        ]);

        return redirect()->back()->with('success', 'Checklist item saved!');

    }
    public function deleteChecklistItem($id)
    {
        $item = ChecklistItem::find($id);

        if ($item) {
            $item->delete();
            return response()->json(['success' => true, 'message' => 'Checklist item deleted.']);
        }

        return response()->json(['success' => false, 'message' => 'Item not found.'], 404);
    }


    public function sendPDFViaEmail(Request $request)
    {
        try {
            // Retrieve input values from the request
            $email = $request->input('email');
            $cc = $request->input('cc');
            $bcc = $request->input('bcc');
            $subject = $request->input('subject');
            $body = $request->input('body');
            $pdf = $request->file('pdf');

            // Ensure email address is not null before proceeding
            if ($email === null) {
                return response()->json(['error' => 'Email address is missing.'], 400);
            }
            // Ensure CC and BCC are not null
            if ($cc === null) {
                $cc = ''; // Set default value if null
            }
            if ($bcc === null) {
                $bcc = ''; // Set default value if null
            }

            // Log input data for debugging
            Log::info('Received email: ' . $email);
            Log::info('CC: ' . $cc);
            Log::info('BCC: ' . $bcc);
            Log::info('Subject: ' . $subject);
            Log::info('Body: ' . $body);

            // Construct and send the email
            Mail::send([], [], function ($message) use ($email, $cc, $bcc, $subject, $body, $pdf) {
                $message->to($email)
                    ->subject($subject)
                    ->cc($cc)
                    ->bcc($bcc)
                    ->attach($pdf->getRealPath(), [
                            'as' => 'training_information.pdf',
                            'mime' => 'application/pdf'
                        ])
                    ->text($body);
            });

            return response()->json(['message' => 'Email sent successfully!'], 200);
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error sending email: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to send email.'], 500);
        }
    }

    public function deletetrain($id)
    {
        DB::beginTransaction();

        try {
            $trainings = Training::find($id);

            if (!$trainings) {
                return redirect()->back()->with('error', 'HRM record not found.');
            }

            $trainings->trainingbudgets()->delete();
            $trainings->trainingweapons()->delete();
            $trainings->trainingammunitions()->delete();
            $trainings->trainingarmourers()->delete();
            $trainings->trainingequipments()->delete();
            $trainings->trainingitems()->delete();
            $trainings->delete();

            DB::commit();

            return redirect()->back()->with('success', 'Training record deleted successfully.');
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('An error occurred while deleting Training record: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while deleting the Training record.');
        }
    }

    //Types of Training
    public function type()
    {
        $types = Type::all();
        return view('training.type', compact('types'));
    }

    public function posttype(Request $request)
    {
        $types = new Type();
        $types->type_name = $request->input('type_name');
        $types->save();
        return redirect()->back();
    }

    public function destroytype($id)
    {
        $types = Type::find($id);

        if ($types) {
            $types->delete();
            return redirect()->back()->with('success', 'Type deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Type not found.');
        }
    }

    //Emergency Services
    public function trainemerser()
    {
        $trainemerser = TrainEmerser::all();
        return view('training.trainemerser', compact('trainemerser'));
    }

    public function posttrainemerser(Request $request)
    {
        $trainemerser = new TrainEmerser();
        $trainemerser->train_emerser_name = $request->input('train_emerser_name');
        $trainemerser->save();
        return redirect()->back();
    }

    public function destroytrainingemerser($id)
    {
        $trainemerser = TrainEmerser::find($id);

        if ($trainemerser) {
            $trainemerser->delete();
            return redirect()->back()->with('success', 'Category deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Category not found.');
        }
    }

    public function active()
    {
        return view('emails.active');
    }

    public function trashedTrainings()
    {
        $trashed = Training::onlyTrashed()->latest()->get();
        return view('trainings.trashed', compact('trashed'));
    }

    public function restoreTraining($id)
    {
        $training = Training::onlyTrashed()->findOrFail($id);
        $training->restore();

        return redirect()->back()->with('success', 'Training restored successfully.');
    }

    public function forceDeleteTraining($id)
    {
        $training = Training::onlyTrashed()->findOrFail($id);
        $training->forceDelete();

        return redirect()->back()->with('success', 'Training permanently deleted.');
    }

}