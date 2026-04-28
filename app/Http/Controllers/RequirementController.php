<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\SalesActivities;
use App\Models\Salescategory;
use App\Models\Salesrhq;
use App\Models\Saleslead;
use App\Models\Salesguard;
use App\Models\Salesgive;
use App\Models\Salesvehicle;
use App\Models\Requirement;
use App\Models\Salescanine;
use App\Models\Salesconsultancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RequirementController extends Controller
{
    public function requirements(){
        $requirements = Requirement::all();
        //  $admin = Admin::all();
        return view('Sales.requirements' , compact('requirements'));
    }

    public function postrequirements(){
         $admin = Admin::all();
        $salescategory = Salescategory::all();
        $salesrhq = Salesrhq::all();
        $salesgive = Salesgive::all();
        $saleslead = Saleslead::all();
        $salesguard = Salesguard::all();
        $salesvehicle = Salesvehicle::all();
        $salescanine = Salescanine::all();
        $salesconsultancy = Salesconsultancy::all();
        return view('Sales.postrequirements' , compact('admin','salescategory' , 'salesrhq' , 'salesgive' , 'saleslead' , 'salesguard' , 'salesvehicle', 'salescanine' , 'salesconsultancy'));
    }

    public function storeRequirement(Request $request)
    {
        // return $request->all();
        DB::beginTransaction();

        try {

            $requirementData = $this->normalizeRequirementPayload($request->except('_token'));

            // Handle file uploads
            $requirementImageFields = [
                'visitingCardFront', 'visitingCardBack', 'supportingRfqAttach',
                'rfqDocAttach', 'finPro', 'email_attachment', 'listComAttach', 'scanRecAttach',
                'grevAttach', 'bidAttach', 'competitorAttach',
            ];

            foreach ($requirementImageFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/requirements'), $file_name);
                    $requirementData[$field] = 'uploads/requirements/' . $file_name;
                }
            }

            // Create the requirement
            $requirement = Requirement::create($requirementData);

            //Requirements Addresses
            $requirementPocData = $request->only([
                'req_poc_name','req_poc_num','req_poc_desig','req_poc_email',
                'req_poc_org_name','req_poc_office_no', 'req_poc_floor',
                'req_poc_building','req_poc_block','req_poc_area','req_poc_city',
                'req_poc_pin'
            ]);

            $requirementPocDataArray = [];
            foreach ($this->iterableInput($requirementPocData['req_poc_name'] ?? null) as $index => $reqPocName) {
                $requirementPocDataRow = [
                    'req_poc_name' => $reqPocName,
                    'req_poc_num' => $requirementPocData['req_poc_num'][$index],
                    'req_poc_desig' => $requirementPocData['req_poc_desig'][$index],
                    'req_poc_email' => $requirementPocData['req_poc_email'][$index],
                    'req_poc_org_name' => $requirementPocData['req_poc_org_name'][$index],
                    'req_poc_office_no' => $requirementPocData['req_poc_office_no'][$index],
                    'req_poc_floor' => $requirementPocData['req_poc_floor'][$index],
                    'req_poc_building' => $requirementPocData['req_poc_building'][$index],
                    'req_poc_block' => $requirementPocData['req_poc_block'][$index],
                    'req_poc_area' => $requirementPocData['req_poc_area'][$index],
                    'req_poc_city' => $requirementPocData['req_poc_city'][$index],
                    'req_poc_pin' => $requirementPocData['req_poc_pin'][$index],
                ];

                $requirementPocFields = [
                    'req_poc_visiting_front', 'req_poc_visiting_back',
                    'req_poc_building_attach'
                ];

                foreach ($requirementPocFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementPocDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementPocDataArray[] = $requirementPocDataRow;
            }

            $requirement->requirementpocs()->createMany($requirementPocDataArray);

            //Requirements Addresses
            $requirementAddressData = $request->only([
                'office_no','floor','building','block','area','city',
                'pin_location','company','email','website', 'notes'
            ]);

            $requirementAddressDataArray = [];
            foreach ($this->iterableInput($requirementAddressData['office_no'] ?? null) as $index => $officeNo) {
                $requirementAddressDataRow = [
                    'office_no' => $officeNo,
                    'floor' => $requirementAddressData['floor'][$index],
                    'building' => $requirementAddressData['building'][$index],
                    'block' => $requirementAddressData['block'][$index],
                    'area' => $requirementAddressData['area'][$index],
                    'city' => $requirementAddressData['city'][$index],
                    'pin_location' => $requirementAddressData['pin_location'][$index],
                    'company' => $requirementAddressData['company'][$index],
                    'email' => $requirementAddressData['email'][$index],
                    'website' => $requirementAddressData['website'][$index],
                    'notes' => $requirementAddressData['notes'][$index],
                ];

                $requirementAddressFields = [
                    'builidng_attach', 'attachments'
                ];

                foreach ($requirementAddressFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementAddressDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementAddressDataArray[] = $requirementAddressDataRow;
            }

            $requirement->requirementaddress()->createMany($requirementAddressDataArray);

            //Men Guarding Services
            $requirementGuardData = $request->only([
                'guard_category','guard_quantity','guard_shift_timing','guard_food',
                'guard_accomodation','guard_transportation',
                'guard_required_monthly','guard_required_dialy',
                'no_of_days_guard_required','guard_notes'
            ]);

            $requirementGuardDataArray = [];
            foreach ($this->iterableInput($requirementGuardData['guard_category'] ?? null) as $index => $guardCategory) {
                $requirementGuardDataRow = [
                    'guard_category' => $guardCategory,
                    'guard_quantity' => $requirementGuardData['guard_quantity'][$index],
                    'guard_shift_timing' => $requirementGuardData['guard_shift_timing'][$index],
                    'guard_food' => $requirementGuardData['guard_food'][$index],
                    'guard_accomodation' => $requirementGuardData['guard_accomodation'][$index],
                    'guard_transportation' => $requirementGuardData['guard_transportation'][$index],
                    'guard_required_monthly' => $requirementGuardData['guard_required_monthly'][$index],
                    'guard_required_dialy' => $requirementGuardData['guard_required_dialy'][$index] ?? null,
                    'no_of_days_guard_required' => $requirementGuardData['no_of_days_guard_required'][$index],
                    'guard_notes' => $requirementGuardData['guard_notes'][$index],
                ];

                $requirementGuardFields = [
                    'financial_working_excel_attach', 'financial_working_word_attach' ,
                    'financial_working_pdf_attach' , 'guard_attach'
                ];

                foreach ($requirementGuardFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementGuardDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementGuardDataArray[] = $requirementGuardDataRow;
            }

            $requirement->requirementguard()->createMany($requirementGuardDataArray);


            //Vehicle Security
            $requirementVehicleData = $request->only([
                'vehicle_ownership','vehicle_type','vehicle_category','vehicle_required', 'vehicle_mantenance',
                'vehicle_fuel','vehicle_rate_per_km', 'vehicle_km_required', 'vehicle_toll', 'vehicle_tol',
                'vehicle_reporting_time','vehicle_rep_office_no', 'vehicle_rep_floor' , 'vehicle_rep_building',
                'vehicle_rep_block','vehicle_rep_area', 'vehicle_rep_city', 'vehicle_rep_location','vehicle_duty_start_date',
                'vehicle_duty_end_date','vehicle_duty_start_time','vehicle_duty_end_time','vehicle_shift_duration',
                'vehicle_no_of_shifts','vehicle_food_by_client','vehicle_guard_category','vehicle_guard_quantity',
                'vehicle_guard_shift_timing','vehicle_guard_food_by_client','vehicle_guard_accomodation','vehicle_guard_transportation',
                'vehicle_guard_req_monthly','vehicle_guard_req_dialy','vehicle_guard_no','vehicle_guard_notes'
            ]);

            $requirementVehicleDataArray = [];
            foreach ($this->iterableInput($requirementVehicleData['vehicle_ownership'] ?? null) as $index => $vehicleOwnership) {
                $requirementVehicleDataRow = [
                    'vehicle_ownership' => $vehicleOwnership,
                    'vehicle_type' => $requirementVehicleData['vehicle_type'][$index],
                    'vehicle_category' => $requirementVehicleData['vehicle_category'][$index],
                    'vehicle_mantenance' => $requirementVehicleData['vehicle_mantenance'][$index],
                    'vehicle_fuel' => $requirementVehicleData['vehicle_fuel'][$index],
                    'vehicle_rate_per_km' => $requirementVehicleData['vehicle_rate_per_km'][$index],
                    'vehicle_km_required' => $requirementVehicleData['vehicle_km_required'][$index],
                    'vehicle_toll' => $requirementVehicleData['vehicle_toll'][$index],
                    'vehicle_tol' => $requirementVehicleData['vehicle_tol'][$index],
                    'vehicle_reporting_time' => $requirementVehicleData['vehicle_reporting_time'][$index],
                    'vehicle_rep_office_no' => $requirementVehicleData['vehicle_rep_office_no'][$index],
                    'vehicle_rep_floor' => $requirementVehicleData['vehicle_rep_floor'][$index],
                    'vehicle_rep_building' => $requirementVehicleData['vehicle_rep_building'][$index],
                    'vehicle_rep_block' => $requirementVehicleData['vehicle_rep_block'][$index],
                    'vehicle_rep_area' => $requirementVehicleData['vehicle_rep_area'][$index],
                    'vehicle_rep_city' => $requirementVehicleData['vehicle_rep_city'][$index],
                    'vehicle_rep_location' => $requirementVehicleData['vehicle_rep_location'][$index],
                    'vehicle_duty_start_date' => $requirementVehicleData['vehicle_duty_start_date'][$index],
                    'vehicle_duty_end_date' => $requirementVehicleData['vehicle_duty_end_date'][$index],
                    'vehicle_duty_start_time' => $requirementVehicleData['vehicle_duty_start_time'][$index],
                    'vehicle_duty_end_time' => $requirementVehicleData['vehicle_duty_end_time'][$index],
                    'vehicle_no_of_shifts' => $requirementVehicleData['vehicle_no_of_shifts'][$index],
                    'vehicle_food_by_client' => $requirementVehicleData['vehicle_food_by_client'][$index],
                    'vehicle_guard_category' => $requirementVehicleData['vehicle_guard_category'][$index],
                    'vehicle_guard_quantity' => $requirementVehicleData['vehicle_guard_quantity'][$index],
                    'vehicle_guard_shift_timing' => $requirementVehicleData['vehicle_guard_shift_timing'][$index],
                    'vehicle_guard_food_by_client' => $requirementVehicleData['vehicle_guard_food_by_client'][$index],
                    'vehicle_guard_accomodation' => $requirementVehicleData['vehicle_guard_accomodation'][$index],
                    'vehicle_guard_transportation' => $requirementVehicleData['vehicle_guard_transportation'][$index],
                    'vehicle_guard_req_monthly' => $requirementVehicleData['vehicle_guard_req_monthly'][$index],
                    'vehicle_guard_req_dialy' => $requirementVehicleData['vehicle_guard_req_dialy'][$index],
                    'vehicle_guard_no' => $requirementVehicleData['vehicle_guard_no'][$index],
                    'vehicle_guard_notes' => $requirementVehicleData['vehicle_guard_notes'][$index],
                ];

                $requirementVehiclecheckboxFields = ['vehicle_reporting_address', 'vehicle_req_with_driver',
                                                    'vehicle_req_with_security'];

                foreach ($requirementVehiclecheckboxFields as $field) {
                    $requirementVehicleData[$field] = $request->has($field) ? true : false;
                }

                $requirementVehicleFields = [
                    'vehicle_meter_reading','vehicle_meter_picture', 'vehicle_rep_picture' ,
                    'vehicle_guard_attach' ,
                ];

                foreach ($requirementVehicleFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementVehicleDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementVehicleDataArray[] = $requirementVehicleDataRow;
            }

            $requirement->requirementvehicle()->createMany($requirementVehicleDataArray);

            //Canine Services
            $requirementCanineData = $request->only([
                'canine_req_for','canine_category','canine_req_for_days','canine_color',
                'canine_no','canine_req_handler', 'canine_handler_name' , 'canine_handler_cnic_no',
                'canine_handler_age','canine_handler_exp', 'canine_handler_cell', 'canine_duty_start_date',
                'canine_duty_end_date','canine_duty_start_time' , 'canine_duty_end_time','canine_shift_duration',
                'canine_no_of_shifts','canine_notes'
            ]);

            $requirementCanineDataArray = [];
            foreach ($this->iterableInput($requirementCanineData['canine_req_for'] ?? null) as $index => $canineReqfor) {
                $requirementCanineDataRow = [
                    'canine_req_for' => $canineReqfor,
                    'canine_category' => $requirementCanineData['canine_category'][$index],
                    'canine_req_for_days' => $requirementCanineData['canine_req_for_days'][$index],
                    'canine_color' => $requirementCanineData['canine_color'][$index],
                    'canine_no' => $requirementCanineData['canine_no'][$index],
                    'canine_req_handler' => $requirementCanineData['canine_req_handler'][$index],
                    'canine_handler_name' => $requirementCanineData['canine_handler_name'][$index],
                    'canine_handler_cnic_no' => $requirementCanineData['canine_handler_cnic_no'][$index],
                    'canine_handler_age' => $requirementCanineData['canine_handler_age'][$index],
                    'canine_handler_exp' => $requirementCanineData['canine_handler_exp'][$index],
                    'canine_handler_cell' => $requirementCanineData['canine_handler_cell'][$index],
                    'canine_duty_start_date' => $requirementCanineData['canine_duty_start_date'][$index],
                    'canine_duty_end_date' => $requirementCanineData['canine_duty_end_date'][$index],
                    'canine_duty_start_time' => $requirementCanineData['canine_duty_start_time'][$index],
                    'canine_duty_end_time' => $requirementCanineData['canine_duty_end_time'][$index],
                    'canine_shift_duration' => $requirementCanineData['canine_shift_duration'][$index],
                    'canine_no_of_shifts' => $requirementCanineData['canine_no_of_shifts'][$index],
                    'canine_notes' => $requirementCanineData['canine_notes'][$index],
                ];

                $requirementCanineFields = [
                    'canine_handler_cnic_front', 'canine_handler_cnic_back' ,
                    'canine_pic_of_dogs' , 'canine_attach'
                ];

                foreach ($requirementCanineFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementCanineDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementCanineDataArray[] = $requirementCanineDataRow;
            }

            $requirement->requirementcanine()->createMany($requirementCanineDataArray);


            //Facilitation Services
            $requirementFacilitationData = $request->only([
                'guest_arrival_time','security_reporting_time','nationality_of_guest', 'name_of_airline',
                'contact_of_airline','email_of_airline', 'web_of_airline', 'facility_poc_name',
                'facility_poc_desig','facility_poc_contact', 'facility_poc_email' , 'facility_poc_office',
                'facility_poc_floor','facility_poc_building', 'facility_poc_block', 'facility_poc_area',
                'facility_poc_city','facility_poc_loc','flight_number','flying_from', 'guest_number',
                'hand_carry','luggage_weight','tag_number','color_of_bags', 'weight_of_bags', 'facilitation_notes',
            ]);

            $requirementFacilitationDataArray = [];
            foreach ($this->iterableInput($requirementFacilitationData['guest_arrival_time'] ?? null) as $index => $guestArrivaltime) {
                $requirementFacilitationDataRow = [
                    'guest_arrival_time' => $guestArrivaltime,
                    'security_reporting_time' => $requirementFacilitationData['security_reporting_time'][$index],
                    'nationality_of_guest' => $requirementFacilitationData['nationality_of_guest'][$index],
                    'name_of_airline' => $requirementFacilitationData['name_of_airline'][$index],
                    'contact_of_airline' => $requirementFacilitationData['contact_of_airline'][$index],
                    'email_of_airline' => $requirementFacilitationData['email_of_airline'][$index],
                    'web_of_airline' => $requirementFacilitationData['web_of_airline'][$index],
                    'facility_poc_name' => $requirementFacilitationData['facility_poc_name'][$index],
                    'facility_poc_desig' => $requirementFacilitationData['facility_poc_desig'][$index],
                    'facility_poc_contact' => $requirementFacilitationData['facility_poc_contact'][$index],
                    'facility_poc_email' => $requirementFacilitationData['facility_poc_email'][$index],
                    'facility_poc_office' => $requirementFacilitationData['facility_poc_office'][$index],
                    'facility_poc_floor' => $requirementFacilitationData['facility_poc_floor'][$index],
                    'facility_poc_building' => $requirementFacilitationData['facility_poc_building'][$index],
                    'facility_poc_block' => $requirementFacilitationData['facility_poc_block'][$index],
                    'facility_poc_area' => $requirementFacilitationData['facility_poc_area'][$index],
                    'facility_poc_city' => $requirementFacilitationData['facility_poc_city'][$index],
                    'facility_poc_loc' => $requirementFacilitationData['facility_poc_loc'][$index],
                    'flight_number' => $requirementFacilitationData['flight_number'][$index],
                    'flying_from' => $requirementFacilitationData['flying_from'][$index],
                    'guest_number' => $requirementFacilitationData['guest_number'][$index],
                    'hand_carry' => $requirementFacilitationData['hand_carry'][$index],
                    'luggage_weight' => $requirementFacilitationData['luggage_weight'][$index],
                    'tag_number' => $requirementFacilitationData['tag_number'][$index],
                    'color_of_bags' => $requirementFacilitationData['color_of_bags'][$index],
                    'weight_of_bags' => $requirementFacilitationData['weight_of_bags'][$index],
                    'facilitation_notes' => $requirementFacilitationData['facilitation_notes'][$index],
                ];

                $requirementFacilitationcheckboxFields = ['security_staff_rep_loc', 'airline_details',
                                                    'poc_of_airline'];

                foreach ($requirementFacilitationcheckboxFields as $field) {
                    $requirementFacilitationData[$field] = $request->has($field) ? true : false;
                }

                $requirementFacilitationFields = [
                    'photograph_of_guest','photograph_of_passport', 'facility_poc_building' ,
                    'copy_of_guest_ticket' , 'copy_of_guest_visa' , 'guest_schedule' , 'picture_of_bags',
                    'facilitation_attach'
                ];

                foreach ($requirementFacilitationFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementFacilitationDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementFacilitationDataArray[] = $requirementFacilitationDataRow;
            }

            $requirement->requirementfacilitation()->createMany($requirementFacilitationDataArray);

             //Private Jet Services
             $requirementJetData = $request->only([
                'no_of_days_private_jet','fuel_for_private_jet','rate_of_fuel_for_jet'
            ]);

            $requirementJetDataArray = [];
            foreach ($this->iterableInput($requirementJetData['no_of_days_private_jet'] ?? null) as $index => $noOfaysPrivatejet) {
                $requirementJetDataRow = [
                    'no_of_days_private_jet' => $noOfaysPrivatejet,
                    'fuel_for_private_jet' => $requirementJetData['fuel_for_private_jet'][$index],
                    'rate_of_fuel_for_jet' => $requirementJetData['rate_of_fuel_for_jet'][$index],
                ];

                $requirementJetDataArray[] = $requirementJetDataRow;
            }

            $requirement->requirementjet()->createMany($requirementJetDataArray);

            //Event Security Services
            $requirementEventData = $request->only([
                'ownership_status','event_req_for','event_no_of_staff', 'event_duty_start_date',
                'event_duty_end_date','event_duty_start_time', 'event_duty_end_time', 'event_shift_duration',
                'event_shift_type','event_no_of_shifts', 'event_office_no' , 'event_floor', 'event_building',
                'event_block','event_area', 'event_city', 'event_loc', 'event_date','event_security_notes'
            ]);

            $requirementEventDataArray = [];
            foreach ($this->iterableInput($requirementEventData['ownership_status'] ?? null) as $index => $ownershipStatus) {
                $requirementEventDataRow = [
                    'ownership_status' => $ownershipStatus,
                    'event_req_for' => $requirementEventData['event_req_for'][$index],
                    'event_no_of_staff' => $requirementEventData['event_no_of_staff'][$index],
                    'event_duty_start_date' => $requirementEventData['event_duty_start_date'][$index],
                    'event_duty_end_date' => $requirementEventData['event_duty_end_date'][$index],
                    'event_duty_start_time' => $requirementEventData['event_duty_start_time'][$index],
                    'event_duty_end_time' => $requirementEventData['event_duty_end_time'][$index],
                    'event_shift_duration' => $requirementEventData['event_shift_duration'][$index],
                    'event_shift_type' => $requirementEventData['event_shift_type'][$index],
                    'event_no_of_shifts' => $requirementEventData['event_no_of_shifts'][$index],
                    'event_office_no' => $requirementEventData['event_office_no'][$index],
                    'event_floor' => $requirementEventData['event_floor'][$index],
                    'event_building' => $requirementEventData['event_building'][$index],
                    'event_block' => $requirementEventData['event_block'][$index],
                    'event_area' => $requirementEventData['event_area'][$index],
                    'event_city' => $requirementEventData['event_city'][$index],
                    'event_loc' => $requirementEventData['event_loc'][$index],
                    'event_date' => $requirementEventData['event_date'][$index],
                    'event_security_notes' => $requirementEventData['event_security_notes'][$index],
                ];

                $requirementEventcheckboxFields = ['event_reporting_location'];

                foreach ($requirementEventcheckboxFields as $field) {
                    $requirementEventData[$field] = $request->has($field) ? true : false;
                }

                $requirementEventFields = [
                    'event_photo','event_venue', 'event_deployment_plan' , 'event_security_attach'
                ];

                foreach ($requirementEventFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementEventDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementEventDataArray[] = $requirementEventDataRow;
            }

            $requirement->requirementevent()->createMany($requirementEventDataArray);

            //Security Consultancy
            $requirementConsultancyData = $request->only([
                'consultancy_category','internal_deadline','consultancy_date_of_submission',
                'consultancy_notes'
            ]);

            $requirementConsultancyDataArray = [];
            foreach ($this->iterableInput($requirementConsultancyData['consultancy_category'] ?? null) as $index => $consultancyCategory) {
                $requirementConsultancyDataRow = [
                    'consultancy_category' => $consultancyCategory,
                    'internal_deadline' => $requirementConsultancyData['internal_deadline'][$index],
                    'consultancy_date_of_submission' => $requirementConsultancyData['consultancy_date_of_submission'][$index],
                    'consultancy_notes' => $requirementConsultancyData['consultancy_notes'][$index],
                ];

                $requirementConsultancyFields = [
                    'scope_of_work', 'consultancy_attach'
                ];

                foreach ($requirementConsultancyFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementConsultancyDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementConsultancyDataArray[] = $requirementConsultancyDataRow;
            }

            $requirement->requirementconsultancy()->createMany($requirementConsultancyDataArray);


            //Fire Equipment Services
            $requirementFireData = $request->only([
                'fireClass','fire_equipment_name','fire_cylinder_type', 'fire_article_no',
                'fire_model','fire_year_of_manufacturing', 'fire_expiry_date', 'fire_warranty_period',
                'fire_color','fire_quantity', 'fire_notes'
            ]);

            $requirementFireDataArray = [];
            foreach ($this->iterableInput($requirementFireData['fireClass'] ?? null) as $index => $fireClass) {
                $requirementFireDataRow = [
                    'fireClass' => $fireClass,
                    'fire_equipment_name' => $requirementFireData['fire_equipment_name'][$index],
                    'fire_cylinder_type' => $requirementFireData['fire_cylinder_type'][$index],
                    'fire_article_no' => $requirementFireData['fire_article_no'][$index],
                    'fire_model' => $requirementFireData['fire_model'][$index],
                    'fire_year_of_manufacturing' => $requirementFireData['fire_year_of_manufacturing'][$index],
                    'fire_expiry_date' => $requirementFireData['fire_expiry_date'][$index],
                    'fire_warranty_period' => $requirementFireData['fire_warranty_period'][$index],
                    'fire_color' => $requirementFireData['fire_color'][$index],
                    'fire_quantity' => $requirementFireData['fire_quantity'][$index],
                    'fire_notes' => $requirementFireData['fire_notes'][$index],
                ];

                $requirementFirecheckboxFields = ['waterCylinder', 'dryChemical' , 'CoTwo' , 'foam' ,
                'wetChemical' , 'dryChemicalAbe' , 'dryChemicalBe', 'Co2', 'foam2' , 'dryChemicalPowderABE',
                'dryChemicalPowderBE', 'dryChemicalPowderABE1' , 'dryChemicalPowderBE1' , 'dryChemicalPowderABE2',
                'dryChemicalPowderBE2' , 'cd2' , 'dryChemicalPowderBE3' ,'foam3' , 'wetChemical2' ];

                foreach ($requirementFirecheckboxFields as $field) {
                    $requirementFireData[$field] = $request->has($field) ? true : false;
                }

                $requirementFireFields = [
                    'fire_attach', 'fire_specifications'
                ];

                foreach ($requirementFireFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementFireDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementFireDataArray[] = $requirementFireDataRow;
            }

            $requirement->requirementfire()->createMany($requirementFireDataArray);

            //Other Fire
            $requirementOtherData = $request->only([
                'other_fire_category','other_equip_name','other_article_no', 'other_model',
                'other_year_of_manufacture' , 'other_expiry_date' , 'other_warranty_period',
                'other_color' , 'other_quantity' , 'other_instruction' , 'other_complete_cost',
                'other_delivery_charges', 'other_installtion_cost' , 'other_fire_notes'
            ]);

            $requirementOtherDataArray = [];
            foreach ($this->iterableInput($requirementOtherData['other_fire_category'] ?? null) as $index => $otherfireCategory) {
                $requirementOtherDataRow = [
                    'other_fire_category' => $otherfireCategory,
                    'other_equip_name' => $requirementOtherData['other_equip_name'][$index],
                    'other_article_no' => $requirementOtherData['other_article_no'][$index],
                    'other_model' => $requirementOtherData['other_model'][$index],
                    'other_year_of_manufacture' => $requirementOtherData['other_year_of_manufacture'][$index],
                    'other_expiry_date' => $requirementOtherData['other_expiry_date'][$index],
                    'other_warranty_period' => $requirementOtherData['other_warranty_period'][$index],
                    'other_color' => $requirementOtherData['other_color'][$index],
                    'other_quantity' => $requirementOtherData['other_quantity'][$index],
                    'other_instruction' => $requirementOtherData['other_instruction'][$index],
                    'other_complete_cost' => $requirementOtherData['other_complete_cost'][$index],
                    'other_delivery_charges' => $requirementOtherData['other_delivery_charges'][$index],
                    'other_installtion_cost' => $requirementOtherData['other_installtion_cost'][$index],
                    'other_fire_notes' => $requirementOtherData['other_fire_notes'][$index],
                ];

                $requirementOtherFields = [
                    'other_specifications', 'other_scope_of_work' , 'other_picture_of_building',
                    'other_fire_attachment'
                ];

                foreach ($requirementOtherFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementOtherDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementOtherDataArray[] = $requirementOtherDataRow;
            }

            $requirement->requirementotherfire()->createMany($requirementOtherDataArray);


            //Passive Fire
            $requirementPassiveData = $request->only([
                'passive_category','passive_dimension','passive_width', 'passive_height',
                'passive_depth' , 'passive_quantity' , 'passive_material', 'passive_equipment',
                'passive_article' , 'passive_model' , 'passive_year_of_manufacture' , 'passive_expiry',
                'passive_warranty', 'passive_color' , 'passive_second_quantity', 'passive_instruction',
                'passive_complete_cost', 'passive_delivery_charges' , 'passive_cost' ,'passive_complete_equip_charges'
            ]);

            $requirementPassiveDataArray = [];
            foreach ($this->iterableInput($requirementPassiveData['passive_category'] ?? null) as $index => $passiveCategory) {
                $requirementPassiveDataRow = [
                    'passive_category' => $passiveCategory,
                    'passive_dimension' => $requirementPassiveData['passive_dimension'][$index],
                    'passive_width' => $requirementPassiveData['passive_width'][$index],
                    'passive_height' => $requirementPassiveData['passive_height'][$index],
                    'passive_depth' => $requirementPassiveData['passive_depth'][$index],
                    'passive_quantity' => $requirementPassiveData['passive_quantity'][$index],
                    'passive_material' => $requirementPassiveData['passive_material'][$index],
                    'passive_equipment' => $requirementPassiveData['passive_equipment'][$index],
                    'passive_article' => $requirementPassiveData['passive_article'][$index],
                    'passive_model' => $requirementPassiveData['passive_model'][$index],
                    'passive_year_of_manufacture' => $requirementPassiveData['passive_year_of_manufacture'][$index],
                    'passive_expiry' => $requirementPassiveData['passive_expiry'][$index],
                    'passive_warranty' => $requirementPassiveData['passive_warranty'][$index],
                    'passive_color' => $requirementPassiveData['passive_color'][$index],
                    'passive_second_quantity' => $requirementPassiveData['passive_second_quantity'][$index],
                    'passive_instruction' => $requirementPassiveData['passive_instruction'][$index],
                    'passive_complete_cost' => $requirementPassiveData['passive_complete_cost'][$index],
                    'passive_delivery_charges' => $requirementPassiveData['passive_delivery_charges'][$index],
                    'passive_cost' => $requirementPassiveData['passive_cost'][$index],
                    'passive_complete_equip_charges' => $requirementPassiveData['passive_complete_equip_charges'][$index],
                ];

                $requirementPassiveFields = [
                    'passive_scope_of_work', 'passive_building_picture' , 'passive_drawings',
                    'passive_pictures'
                ];

                foreach ($requirementPassiveFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementPassiveDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementPassiveDataArray[] = $requirementPassiveDataRow;
            }

            $requirement->requirementpassive()->createMany($requirementPassiveDataArray);

            //Security Equipment Services
            $requirementSecurityData = $request->only([
                'equipment_category','equipment_ownership','equipment_rental', 'equipment_no_of_days',
                'equipment_quality','equipment_training', 'equipment_delivery', 'equipment_del_office_no',
                'equipment_del_floor','equipment_del_building','equipment_del_block' , 'equipment_del_area',
                'equipment_del_city' , 'equipment_del_pin_loc' , 'equipment_installation_req',
                'equipment_ins_office_no' , 'equipment_ins_floor' , 'equipment_ins_building',
                'equipment_ins_block','equipment_ins_area','equipment_ins_city','equipment_ins_pin_location',
                'equipment_notes'
            ]);

            $requirementSecurityDataArray = [];
            foreach ($this->iterableInput($requirementSecurityData['equipment_category'] ?? null) as $index => $equipmentCategory) {
                $requirementSecurityDataRow = [
                    'equipment_category' => $equipmentCategory,
                    'equipment_ownership' => $requirementSecurityData['equipment_ownership'][$index],
                    'equipment_rental' => $requirementSecurityData['equipment_rental'][$index],
                    'equipment_no_of_days' => $requirementSecurityData['equipment_no_of_days'][$index],
                    'equipment_quality' => $requirementSecurityData['equipment_quality'][$index],
                    'equipment_training' => $requirementSecurityData['equipment_training'][$index],
                    'equipment_delivery' => $requirementSecurityData['equipment_delivery'][$index],
                    'equipment_del_office_no' => $requirementSecurityData['equipment_del_office_no'][$index],
                    'equipment_del_floor' => $requirementSecurityData['equipment_del_floor'][$index],
                    'equipment_del_building' => $requirementSecurityData['equipment_del_building'][$index],
                    'equipment_del_block' => $requirementSecurityData['equipment_del_block'][$index],
                    'equipment_del_area' => $requirementSecurityData['equipment_del_area'][$index],
                    'equipment_del_city' => $requirementSecurityData['equipment_del_city'][$index],
                    'equipment_del_pin_loc' => $requirementSecurityData['equipment_del_pin_loc'][$index],
                    'equipment_installation_req' => $requirementSecurityData['equipment_installation_req'][$index],
                    'equipment_ins_office_no' => $requirementSecurityData['equipment_ins_office_no'][$index],
                    'equipment_ins_building' => $requirementSecurityData['equipment_ins_building'][$index],
                    'equipment_ins_block' => $requirementSecurityData['equipment_ins_block'][$index],
                    'equipment_ins_area' => $requirementSecurityData['equipment_ins_area'][$index],
                    'equipment_ins_city' => $requirementSecurityData['equipment_ins_city'][$index],
                    'equipment_ins_pin_location' => $requirementSecurityData['equipment_ins_pin_location'][$index],
                    'equipment_notes' => $requirementSecurityData['equipment_notes'][$index],
                ];

                $requirementSecuritycheckboxFields = ['equipment_dilevery_loc', 'equipment_ins_loc'];

                foreach ($requirementSecuritycheckboxFields as $field) {
                    $requirementFireData[$field] = $request->has($field) ? true : false;
                }

                $requirementSecurityFields = [
                    'equipment_del_photo_building', 'equipment_ins_photo_building' , 'equipment_attachment'
                ];

                foreach ($requirementSecurityFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementSecurityDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementSecurityDataArray[] = $requirementSecurityDataRow;
            }

            $requirement->requirementequipment()->createMany($requirementSecurityDataArray);

            //Traffic Barrier
            $requirementBarrierData = $request->only([
                'barrier_ownership','barrier_rental','barrier_no_of_days', 'barrier_model',
                'barrier_brand','barrier_specifications', 'barrier_quantity', 'barrier_unit',
                'barrier_price','detector_model','detector_brand' , 'detector_specifications',
                'detector_quantity' , 'detector_unit' , 'detector_price', 'traffic_model',
                'traffic_brand' , 'traffic_specifications' , 'traffic_quantity', 'traffic_unit',
                'traffic_price','coupler_model','coupler_brand','coupler_specification',
                'coupler_quantity', 'coupler_unit' , 'coupler_price' , 'tag_model', 'tag_brand',
                'tag_specifications','tag_quantity','tag_unit','tag_price','Etag_model',
                'Etag_brand' , 'Etag_specifications' , 'Etag_quantity' ,'Etag_unit' ,'Etag_price' ,
                'pole_model' , 'pole_brand' ,'pole_specifications' , 'pole_quantity' , 'pole_unit' ,
                'pole_price' , 'breaker_model' , 'breaker_brand' , 'breaker_specifications' ,
                'breaker_quantity', 'breaker_unit' , 'breaker_price' , 'barrier_installation' ,
                'barrier_training', 'barrier_delivery' ,'barrier_office_no' , 'barrier_floor' ,
                'barrier_building' , 'barrier_block' ,'barrier_area' , 'barrier_city' ,
                'barrier_pin_loc' , 'barrier_ins_office' ,'barrier_ins_floor' , 'barrier_ins_building' , 'barrier_ins_block' ,
                'barrier_ins_area' , 'barrier_ins_city' , 'barrier_ins_pin_loc', 'barrier_notes'
            ]);

            $requirementBarrierDataArray = [];
            foreach ($this->iterableInput($requirementBarrierData['barrier_ownership'] ?? null) as $index => $barrierOwnership) {
                $requirementBarrierDataRow = [
                    'barrier_ownership' => $barrierOwnership,
                    'barrier_rental' => $requirementBarrierData['barrier_rental'][$index],
                    'barrier_no_of_days' => $requirementBarrierData['barrier_no_of_days'][$index],
                    'barrier_model' => $requirementBarrierData['barrier_model'][$index],
                    'barrier_brand' => $requirementBarrierData['barrier_brand'][$index],
                    'barrier_specifications' => $requirementBarrierData['barrier_specifications'][$index],
                    'barrier_quantity' => $requirementBarrierData['barrier_quantity'][$index],
                    'barrier_unit' => $requirementBarrierData['barrier_unit'][$index],
                    'barrier_price' => $requirementBarrierData['barrier_price'][$index],
                    'detector_model' => $requirementBarrierData['detector_model'][$index],
                    'detector_brand' => $requirementBarrierData['detector_brand'][$index],
                    'detector_specifications' => $requirementBarrierData['detector_specifications'][$index],
                    'detector_quantity' => $requirementBarrierData['detector_quantity'][$index],
                    'detector_unit' => $requirementBarrierData['detector_unit'][$index],
                    'detector_price' => $requirementBarrierData['detector_price'][$index],
                    'traffic_model' => $requirementBarrierData['traffic_model'][$index],
                    'traffic_brand' => $requirementBarrierData['traffic_brand'][$index],
                    'traffic_specifications' => $requirementBarrierData['traffic_specifications'][$index],
                    'traffic_quantity' => $requirementBarrierData['traffic_quantity'][$index],
                    'traffic_unit' => $requirementBarrierData['traffic_unit'][$index],
                    'traffic_price' => $requirementBarrierData['traffic_price'][$index],
                    'coupler_model' => $requirementBarrierData['coupler_model'][$index],
                    'coupler_brand' => $requirementBarrierData['coupler_brand'][$index],
                    'coupler_specification' => $requirementBarrierData['coupler_specification'][$index],
                    'coupler_quantity' => $requirementBarrierData['coupler_quantity'][$index],
                    'coupler_unit' => $requirementBarrierData['coupler_unit'][$index],
                    'coupler_price' => $requirementBarrierData['coupler_price'][$index],
                    'tag_model' => $requirementBarrierData['tag_model'][$index],
                    'tag_brand' => $requirementBarrierData['tag_brand'][$index],
                    'tag_specifications' => $requirementBarrierData['tag_specifications'][$index],
                    'tag_quantity' => $requirementBarrierData['tag_quantity'][$index],
                    'tag_unit' => $requirementBarrierData['tag_unit'][$index],
                    'tag_price' => $requirementBarrierData['tag_price'][$index],
                    'Etag_model' => $requirementBarrierData['Etag_model'][$index],
                    'Etag_brand' => $requirementBarrierData['Etag_brand'][$index],
                    'Etag_specifications' => $requirementBarrierData['Etag_specifications'][$index],
                    'Etag_quantity' => $requirementBarrierData['Etag_quantity'][$index],
                    'Etag_unit' => $requirementBarrierData['Etag_unit'][$index],
                    'Etag_price' => $requirementBarrierData['Etag_price'][$index],
                    'pole_model' => $requirementBarrierData['pole_model'][$index],
                    'pole_brand' => $requirementBarrierData['pole_brand'][$index],
                    'pole_specifications' => $requirementBarrierData['pole_specifications'][$index],
                    'pole_quantity' => $requirementBarrierData['pole_quantity'][$index],
                    'pole_unit' => $requirementBarrierData['pole_unit'][$index],
                    'pole_price' => $requirementBarrierData['pole_price'][$index],
                    'breaker_model' => $requirementBarrierData['breaker_model'][$index],
                    'breaker_brand' => $requirementBarrierData['breaker_brand'][$index],
                    'breaker_specifications' => $requirementBarrierData['breaker_specifications'][$index],
                    'breaker_quantity' => $requirementBarrierData['breaker_quantity'][$index],
                    'breaker_unit' => $requirementBarrierData['breaker_unit'][$index],
                    'breaker_price' => $requirementBarrierData['breaker_price'][$index],
                    'barrier_installation' => $requirementBarrierData['barrier_installation'][$index],
                    'barrier_training' => $requirementBarrierData['barrier_training'][$index],
                    'barrier_delivery' => $requirementBarrierData['barrier_delivery'][$index],
                    'barrier_office_no' => $requirementBarrierData['barrier_office_no'][$index],
                    'barrier_floor' => $requirementBarrierData['barrier_floor'][$index],
                    'barrier_building' => $requirementBarrierData['barrier_building'][$index],
                    'barrier_block' => $requirementBarrierData['barrier_block'][$index],
                    'barrier_area' => $requirementBarrierData['barrier_area'][$index],
                    'barrier_city' => $requirementBarrierData['barrier_city'][$index],
                    'barrier_pin_loc' => $requirementBarrierData['barrier_pin_loc'][$index],
                    'barrier_ins_office' => $requirementBarrierData['barrier_ins_office'][$index],
                    'barrier_ins_floor' => $requirementBarrierData['barrier_ins_floor'][$index],
                    'barrier_ins_building' => $requirementBarrierData['barrier_ins_building'][$index],
                    'barrier_ins_area' => $requirementBarrierData['barrier_ins_area'][$index],
                    'barrier_ins_city' => $requirementBarrierData['barrier_ins_city'][$index],
                    'barrier_ins_pin_loc' => $requirementBarrierData['barrier_ins_pin_loc'][$index],
                    'barrier_notes' => $requirementBarrierData['barrier_notes'][$index],
                ];

                $requirementBarriercheckboxFields = ['barrier_del_loc', 'barrier_ins_loc'];

                foreach ($requirementBarriercheckboxFields as $field) {
                    $requirementBarrierData[$field] = $request->has($field) ? true : false;
                }

                $requirementBarrierFields = [
                    'barrier_upload_training','barrier_photo_building', 'barrier_ins_photo_building' ,
                    'barrier_attachments'
                ];

                foreach ($requirementBarrierFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementBarrierDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementBarrierDataArray[] = $requirementBarrierDataRow;
            }

            $requirement->requirementbarrier()->createMany($requirementBarrierDataArray);

            //CCTV Services
            $requirementCctvData = $request->only([
                'cctv_category','cctv_brand','cctv_model', 'cctv_year_of_manu', 'cctv_pixels',
                'cctv_night_vision','cctv_type', 'cctv_backup', 'cctv_nvr', 'cctv_powercable' ,
                'cctv_poe','cctv_quantity','cctv_monthly_cost' , 'cctv_req_on', 'cctv_no_of_days',
                'cctv_del_office' , 'cctv_del_floor' , 'cctv_del_building', 'cctv_del_block',
                'cctv_del_area' , 'cctv_del_city' , 'cctv_ins_office', 'cctv_ins_floor',
                'cctv_ins_building','cctv_ins_block','cctv_ins_area','cctv_ins_city',
                'cctv_ins_pin_loc' , 'cctv_maintenance_req' ,'cctv_maintenance_req_basis',
                'cctv_notes'
            ]);

            $requirementCctvDataArray = [];
            foreach ($this->iterableInput($requirementCctvData['cctv_category'] ?? null) as $index => $cctvCategory) {
                $requirementCctvDataRow = [
                    'cctv_category' => $cctvCategory,
                    'cctv_brand' => $requirementCctvData['cctv_brand'][$index],
                    'cctv_model' => $requirementCctvData['cctv_model'][$index],
                    'cctv_year_of_manu' => $requirementCctvData['cctv_year_of_manu'][$index],
                    'cctv_pixels' => $requirementCctvData['cctv_pixels'][$index],
                    'cctv_night_vision' => $requirementCctvData['cctv_night_vision'][$index],
                    'cctv_type' => $requirementCctvData['cctv_type'][$index],
                    'cctv_backup' => $requirementCctvData['cctv_backup'][$index],
                    'cctv_nvr' => $requirementCctvData['cctv_nvr'][$index],
                    'cctv_powercable' => $requirementCctvData['cctv_powercable'][$index],
                    'cctv_poe' => $requirementCctvData['cctv_poe'][$index],
                    'cctv_quantity' => $requirementCctvData['cctv_quantity'][$index],
                    'cctv_monthly_cost' => $requirementCctvData['cctv_monthly_cost'][$index],
                    'cctv_req_on' => $requirementCctvData['cctv_req_on'][$index],
                    'cctv_no_of_days' => $requirementCctvData['cctv_no_of_days'][$index],
                    'cctv_del_office' => $requirementCctvData['cctv_del_office'][$index],
                    'cctv_del_floor' => $requirementCctvData['cctv_del_floor'][$index],
                    'cctv_del_building' => $requirementCctvData['cctv_del_building'][$index],
                    'cctv_del_block' => $requirementCctvData['cctv_del_block'][$index],
                    'cctv_del_area' => $requirementCctvData['cctv_del_area'][$index],
                    'cctv_del_city' => $requirementCctvData['cctv_del_city'][$index],
                    'cctv_ins_office' => $requirementCctvData['cctv_ins_office'][$index],
                    'cctv_ins_floor' => $requirementCctvData['cctv_ins_floor'][$index],
                    'cctv_ins_building' => $requirementCctvData['cctv_ins_building'][$index],
                    'cctv_ins_block' => $requirementCctvData['cctv_ins_block'][$index],
                    'cctv_ins_area' => $requirementCctvData['cctv_ins_area'][$index],
                    'cctv_ins_city' => $requirementCctvData['cctv_ins_city'][$index],
                    'cctv_ins_pin_loc' => $requirementCctvData['cctv_ins_pin_loc'][$index],
                    'cctv_maintenance_req' => $requirementCctvData['cctv_maintenance_req'][$index],
                    'cctv_maintenance_req_basis' => $requirementCctvData['cctv_maintenance_req_basis'][$index],
                    'cctv_notes' => $requirementCctvData['cctv_notes'][$index],
                ];

                $requirementCctvcheckboxFields = ['cctv_del_loc', 'cctv_ins_loc'];

                foreach ($requirementCctvcheckboxFields as $field) {
                    $requirementCctvData[$field] = $request->has($field) ? true : false;
                }

                $requirementCctvFields = [
                    'cctv_del_photo_building', 'cctv_ins_photo_building' , 'cctv_attachments'
                ];

                foreach ($requirementCctvFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementCctvDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementCctvDataArray[] = $requirementCctvDataRow;
            }

            $requirement->requirementcctv()->createMany($requirementCctvDataArray);

            //Attendance Machine
            $requirementAttendanceData = $request->only([
                'attendance_category','attendance_rate','attendance_specifications',
                'attendance_notes'
            ]);

            $requirementAttendanceDataArray = [];
            foreach ($this->iterableInput($requirementAttendanceData['attendance_category'] ?? null) as $index => $attendanceCategory) {
                $requirementAttendanceDataRow = [
                    'attendance_category' => $attendanceCategory,
                    'attendance_rate' => $requirementAttendanceData['attendance_rate'][$index],
                    'attendance_specifications' => $requirementAttendanceData['attendance_specifications'][$index],
                    'attendance_notes' => $requirementAttendanceData['attendance_notes'][$index],
                ];

                $requirementAttendanceFields = [
                    'attendance_sheet', 'attendance_attachment'
                ];

                foreach ($requirementAttendanceFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementAttendanceDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementAttendanceDataArray[] = $requirementAttendanceDataRow;
            }

            $requirement->requirementattendance()->createMany($requirementAttendanceDataArray);

            //Web Survillence
            $requirementWebData = $request->only([
                'web_category','web_date','web_sub_date',
                'web_notes'
            ]);

            $requirementWebDataArray = [];
            foreach ($this->iterableInput($requirementWebData['web_category'] ?? null) as $index => $webCategory) {
                $requirementWebDataRow = [
                    'web_category' => $webCategory,
                    'web_date' => $requirementWebData['web_date'][$index],
                    'web_sub_date' => $requirementWebData['web_sub_date'][$index],
                    'web_notes' => $requirementWebData['web_notes'][$index],
                ];

                $requirementWebFields = [
                    'web_scope', 'web_attachments'
                ];

                foreach ($requirementWebFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementWebDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementWebDataArray[] = $requirementWebDataRow;
            }

            $requirement->requirementweb()->createMany($requirementWebDataArray);

            //Alarm System
            $requirementAlarmData = $request->only([
                'alarm_category','alarm_equipment','alarm_voltage', 'alarm_ampere', 'alarm_article_no',
                'alarm_model' , 'alarm_year' , 'alarm_expiry' , 'alarm_warranty' , 'alarm_color' ,
                'alarm_quantity' , 'alarm_ins' , 'alarm_cost' ,'alarm_charges' , 'alarm_ins_cost' ,
                'alarm_length' , 'alarm_width' , 'alarm_height' , 'alarm_thickness' , 'alarm_diameter',
                'alarm_ins_smoke' , 'alarm_ins_cost_smoke' , 'alarm_internal_shifting' ,'alarm_internal_shifting_charges' ,
                'alarm_reinstall' ,'alarm_reinstall_charges' ,'alarm_qrf' ,'alarm_qrf_monthly_charges' ,
                'alarm_qrf_yearly_charges' ,'alarm_police_req' ,'alarm_police_monthly_charges' ,
                'alarm_police_yearly_charges' , 'alarm_visit_charges' , 'alarm_visit_city' ,'alarm_notes'
            ]);

            $requirementAlarmDataArray = [];
            foreach ($this->iterableInput($requirementAlarmData['alarm_category'] ?? null) as $index => $alarmCategory) {
                $requirementAlarmDataRow = [
                    'alarm_category' => $alarmCategory,
                    'alarm_equipment' => $requirementAlarmData['alarm_equipment'][$index],
                    'alarm_voltage' => $requirementAlarmData['alarm_voltage'][$index],
                    'alarm_ampere' => $requirementAlarmData['alarm_ampere'][$index],
                    'alarm_article_no' => $requirementAlarmData['alarm_article_no'][$index],
                    'alarm_model' => $requirementAlarmData['alarm_model'][$index],
                    'alarm_year' => $requirementAlarmData['alarm_year'][$index],
                    'alarm_expiry' => $requirementAlarmData['alarm_expiry'][$index],
                    'alarm_warranty' => $requirementAlarmData['alarm_warranty'][$index],
                    'alarm_color' => $requirementAlarmData['alarm_color'][$index],
                    'alarm_quantity' => $requirementAlarmData['alarm_quantity'][$index],
                    'alarm_ins' => $requirementAlarmData['alarm_ins'][$index],
                    'alarm_cost' => $requirementAlarmData['alarm_cost'][$index],
                    'alarm_charges' => $requirementAlarmData['alarm_charges'][$index],
                    'alarm_ins_cost' => $requirementAlarmData['alarm_ins_cost'][$index],
                    'alarm_length' => $requirementAlarmData['alarm_length'][$index],
                    'alarm_width' => $requirementAlarmData['alarm_width'][$index],
                    'alarm_height' => $requirementAlarmData['alarm_height'][$index],
                    'alarm_thickness' => $requirementAlarmData['alarm_thickness'][$index],
                    'alarm_diameter' => $requirementAlarmData['alarm_diameter'][$index],
                    'alarm_ins_smoke' => $requirementAlarmData['alarm_ins_smoke'][$index],
                    'alarm_ins_cost_smoke' => $requirementAlarmData['alarm_ins_cost_smoke'][$index],
                    'alarm_internal_shifting' => $requirementAlarmData['alarm_internal_shifting'][$index],
                    'alarm_internal_shifting_charges' => $requirementAlarmData['alarm_internal_shifting_charges'][$index],
                    'alarm_reinstall' => $requirementAlarmData['alarm_reinstall'][$index],
                    'alarm_reinstall_charges' => $requirementAlarmData['alarm_reinstall_charges'][$index],
                    'alarm_qrf' => $requirementAlarmData['alarm_qrf'][$index],
                    'alarm_qrf_monthly_charges' => $requirementAlarmData['alarm_qrf_monthly_charges'][$index],
                    'alarm_qrf_yearly_charges' => $requirementAlarmData['alarm_qrf_yearly_charges'][$index],
                    'alarm_police_req' => $requirementAlarmData['alarm_police_req'][$index],
                    'alarm_police_monthly_charges' => $requirementAlarmData['alarm_police_monthly_charges'][$index],
                    'alarm_police_yearly_charges' => $requirementAlarmData['alarm_police_yearly_charges'][$index],
                    'alarm_visit_charges' => $requirementAlarmData['alarm_visit_charges'][$index],
                    'alarm_visit_city' => $requirementAlarmData['alarm_visit_city'][$index],
                    'alarm_notes' => $requirementAlarmData['alarm_notes'][$index],
                ];

                $requirementAlarmFields = [
                    'alarm_scope', 'alarm_drawings' , 'alarm_pictures' , 'alarm_attachments'
                ];

                foreach ($requirementAlarmFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementAlarmDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementAlarmDataArray[] = $requirementAlarmDataRow;
            }

            $requirement->requirementalarm()->createMany($requirementAlarmDataArray);

            //With Complaines- Shown WHT
            $requirementCshownData = $request->only([
                'wc_sw_category','wc_sw_social_check','wc_sw_weapon', 'wc_sw_monthly_rate',
                'wc_sw_total_monthly_rate' , 'wc_sw_salary' , 'wc_sw_group' , 'wc_sw_training_cost',    'alarm_quantity' , 'alarm_ins' , 'alarm_cost' ,'alarm_charges' , 'alarm_ins_cost' ,'wc_sw_cur_min_wg_re', 'wc_sw_app_gst' , 'wc_sw_monthly_gst' , 'wc_sw_rel_allowance' , 'wc_sw_eobi' , 'wc_sw_uni_cost' , 'wc_sw_app_wht' , 'wc_sw_wht' , 'wc_sw_admin_cost','wc_sw_total_monthly_rate_without_tax','wc_sw_grandTotal', 'wc_sw_region','wc_sw_quantity','wc_sw_date'
            ]);

            $requirementCshownDataArray = [];
            foreach ($this->iterableInput($requirementCshownData['wc_sw_category'] ?? null) as $index => $wcSwCategory) {
                $requirementCshownDataRow = [
                    'wc_sw_category' => $wcSwCategory,
                    'wc_sw_social_check' => $requirementCshownData['wc_sw_social_check'][$index],
                    'wc_sw_weapon' => $requirementCshownData['wc_sw_weapon'][$index],
                    'wc_sw_monthly_rate' => $requirementCshownData['wc_sw_monthly_rate'][$index],
                    'wc_sw_total_monthly_rate' => $requirementCshownData['wc_sw_total_monthly_rate'][$index],
                    'wc_sw_salary' => $requirementCshownData['wc_sw_salary'][$index],
                    'wc_sw_group' => $requirementCshownData['wc_sw_group'][$index],
                    'wc_sw_training_cost' => $requirementCshownData['wc_sw_training_cost'][$index],
                    'wc_sw_app_gst' => $requirementCshownData['wc_sw_app_gst'][$index],
                    'wc_sw_monthly_gst' => $requirementCshownData['wc_sw_monthly_gst'][$index],
                    'wc_sw_rel_allowance' => $requirementCshownData['wc_sw_rel_allowance'][$index],
                    'wc_sw_eobi' => $requirementCshownData['wc_sw_eobi'][$index],
                    'wc_sw_uni_cost' => $requirementCshownData['wc_sw_uni_cost'][$index],
                    'wc_sw_app_wht' => $requirementCshownData['wc_sw_app_wht'][$index],
                    'wc_sw_wht' => $requirementCshownData['wc_sw_wht'][$index],
                    'wc_sw_admin_cost' => $requirementCshownData['wc_sw_admin_cost'][$index],
                    'wc_sw_cur_min_wg_re' => $requirementCshownData['wc_sw_cur_min_wg_re'][$index],
                    'wc_sw_total_monthly_rate_without_tax' => $requirementCshownData['wc_sw_total_monthly_rate_without_tax'][$index],
                    'wc_sw_grandTotal' => $requirementCshownData['wc_sw_grandTotal'][$index],
                    'wc_sw_region' => $requirementCshownData['wc_sw_region'][$index],
                    'wc_sw_quantity' => $requirementCshownData['wc_sw_quantity'][$index],
                    'wc_sw_date' => $requirementCshownData['wc_sw_date'][$index],
                ];
                $requirementCshownDataArray[] = $requirementCshownDataRow;
            }

            $requirement->complainesshownwht()->createMany($requirementCshownDataArray);

            //With Complaines- Hidden WHT
            $requirementCohiddenData = $request->only([
                'wc_hw_category','wc_hw_social','wc_hw_weapon', 'wc_hw_monthly_rate',
                'wc_hw_total_monthly_rate_with_tax' , 'wc_hw_wht' , 'wc_hw_salary' , 'wc_hw_group',
                'wc_hw_training_cost' , 'wc_hw_app_gst' , 'wc_hw_gst' , 'wc_hw_admin_cost' ,
                'wc_hw_rel_allowance' , 'wc_hw_eobi' , 'wc_hw_uni_cost' , 'wc_hw_hidden_admin_cost',
                'wc_hw_app_wht_per' , 'wc_hw_total_admin_cost','wc_hw_res_region','wc_hw_total_quantity','wc_hw_total_grand','wc_hw_date','wc_hw_total_monthly_rate_withouttax'
            ]);

            $requirementCohiddenDataArray = [];
            foreach ($this->iterableInput($requirementCohiddenData['wc_hw_category'] ?? null) as $index => $wcHwCategory) {
                $requirementCohiddenDataRow = [
                    'wc_hw_category' => $wcHwCategory,
                    'wc_hw_social' => $requirementCohiddenData['wc_hw_social'][$index],
                    'wc_hw_weapon' => $requirementCohiddenData['wc_hw_weapon'][$index],
                    'wc_hw_monthly_rate' => $requirementCohiddenData['wc_hw_monthly_rate'][$index],
                    'wc_hw_total_monthly_rate_with_tax' => $requirementCohiddenData['wc_hw_total_monthly_rate_with_tax'][$index],
                    'wc_hw_total_monthly_rate_withouttax' => $requirementCohiddenData['wc_hw_total_monthly_rate_withouttax'][$index],
                    'wc_hw_wht' => $requirementCohiddenData['wc_hw_wht'][$index],
                    'wc_hw_salary' => $requirementCohiddenData['wc_hw_salary'][$index],
                    'wc_hw_group' => $requirementCohiddenData['wc_hw_group'][$index],
                    'wc_hw_training_cost' => $requirementCohiddenData['wc_hw_training_cost'][$index],
                    'wc_hw_app_gst' => $requirementCohiddenData['wc_hw_app_gst'][$index],
                    'wc_hw_gst' => $requirementCohiddenData['wc_hw_gst'][$index],
                    'wc_hw_admin_cost' => $requirementCohiddenData['wc_hw_admin_cost'][$index],
                    'wc_hw_rel_allowance' => $requirementCohiddenData['wc_hw_rel_allowance'][$index],
                    'wc_hw_eobi' => $requirementCohiddenData['wc_hw_eobi'][$index],
                    'wc_hw_uni_cost' => $requirementCohiddenData['wc_hw_uni_cost'][$index],
                    'wc_hw_hidden_admin_cost' => $requirementCohiddenData['wc_hw_hidden_admin_cost'][$index],
                    'wc_hw_app_wht_per' => $requirementCohiddenData['wc_hw_app_wht_per'][$index],
                    'wc_hw_total_admin_cost' => $requirementCohiddenData['wc_hw_total_admin_cost'][$index],
                    'wc_hw_res_region' => $requirementCohiddenData['wc_hw_res_region'][$index],
                    'wc_hw_total_quantity' => $requirementCohiddenData['wc_hw_total_quantity'][$index],
                    'wc_hw_total_grand' => $requirementCohiddenData['wc_hw_total_grand'][$index],
                    'wc_hw_date' => $requirementCohiddenData['wc_hw_date'][$index],
                ];


                $requirementCohiddenDataArray[] = $requirementCohiddenDataRow;
            }

            $requirement->complaineshiddenwht()->createMany($requirementCohiddenDataArray);


            //Lump Sum- Shown WHT
            $requirementLshownData = $request->only([
                'ls_sw_category','ls_sw_social','ls_sw_weapon_cost', 'ls_sw_monthly_rate',
                'ls_sw_total_monthly_rate' , 'ls_sw_salary' , 'ls_sw_group_life' , 'ls_sw_training_cost',                'alarm_quantity' , 'alarm_ins' , 'alarm_cost' ,'alarm_charges' , 'alarm_ins_cost' ,
                'ls_sw_app_gst' , 'ls_sw_gst' , 'ls_sw_eobi' , 'ls_sw_uni_cost' ,
                'ls_sw_admin_cost' , 'ls_sw_app_wht' , 'ls_sw_wht','ls_sw_min_wage_region','ls_sw_total_monthly_rate_without_tax','ls_sw_quantity','ls_sw_grandtotal','ls_sw_date'
            ]);

            $requirementLshownDataArray = [];
            foreach ($this->iterableInput($requirementLshownData['ls_sw_category'] ?? null) as $index => $lsSwCategory) {
                $requirementLshownDataRow = [
                    'ls_sw_category' => $lsSwCategory,
                    'ls_sw_social' => $requirementLshownData['ls_sw_social'][$index],
                    'ls_sw_weapon_cost' => $requirementLshownData['ls_sw_weapon_cost'][$index],
                    'ls_sw_monthly_rate' => $requirementLshownData['ls_sw_monthly_rate'][$index],
                    'ls_sw_total_monthly_rate' => $requirementLshownData['ls_sw_total_monthly_rate'][$index],
                    'ls_sw_salary' => $requirementLshownData['ls_sw_salary'][$index],
                    'ls_sw_group_life' => $requirementLshownData['ls_sw_group_life'][$index],
                    'ls_sw_training_cost' => $requirementLshownData['ls_sw_training_cost'][$index],
                    'ls_sw_app_gst' => $requirementLshownData['ls_sw_app_gst'][$index],
                    'ls_sw_gst' => $requirementLshownData['ls_sw_gst'][$index],
                    'ls_sw_eobi' => $requirementLshownData['ls_sw_eobi'][$index],
                    'ls_sw_uni_cost' => $requirementLshownData['ls_sw_uni_cost'][$index],
                    'ls_sw_admin_cost' => $requirementLshownData['ls_sw_admin_cost'][$index],
                    'ls_sw_app_wht' => $requirementLshownData['ls_sw_app_wht'][$index],
                    'ls_sw_wht' => $requirementLshownData['ls_sw_wht'][$index],
                    'ls_sw_min_wage_region' => $requirementLshownData['ls_sw_min_wage_region'][$index],
                    'ls_sw_total_monthly_rate_without_tax' => $requirementLshownData['ls_sw_total_monthly_rate_without_tax'][$index],
                    'ls_sw_quantity' => $requirementLshownData['ls_sw_quantity'][$index],
                    'ls_sw_grandtotal' => $requirementLshownData['ls_sw_grandtotal'][$index],
                    'ls_sw_date' => $requirementLshownData['ls_sw_date'][$index],
                ];


                $requirementLshownDataArray[] = $requirementLshownDataRow;
            }

            $requirement->lumpsumshownwht()->createMany($requirementLshownDataArray);

            //Lump Sum- Hidden WHT
            $requirementLhiddenData = $request->only([
                'ls_hw_category','ls_hw_uni_cost','ls_hw_weapon_cost', 'ls_hw_monthly_rate',
                'ls_hw_total_monthly_rate' , 'ls_hw_salary' , 'ls_hw_social' , 'ls_hw_training_cost',  'ls_hw_quantity',              'alarm_quantity' , 'alarm_ins' , 'alarm_cost' ,'alarm_charges' , 'alarm_ins_cost' ,
                'ls_hw_app_gst' , 'ls_hw_gst' , 'ls_hw_admin_cost' , 'ls_hw_eobi' ,
                'ls_hw_group_life' , 'ls_hw_hidden_admin_cost' , 'ls_hw_app_wht_per' , 'ls_hw_wht',
                'ls_hw_total_admin_cost','ls_hw_current_min_wage_region','ls_hw_total_monthly_rate_witout_tax','ls_hw_grand_total'
            ]);

            $requirementLhiddenDataArray = [];
            foreach ($this->iterableInput($requirementLhiddenData['ls_hw_category'] ?? null) as $index => $lsHwCategory) {
                $requirementLhiddenDataRow = [
                    'ls_hw_category' => $lsHwCategory,
                    'ls_hw_uni_cost' => $requirementLhiddenData['ls_hw_uni_cost'][$index],
                    'ls_hw_weapon_cost' => $requirementLhiddenData['ls_hw_weapon_cost'][$index],
                    'ls_hw_monthly_rate' => $requirementLhiddenData['ls_hw_monthly_rate'][$index],
                    'ls_hw_total_monthly_rate' => $requirementLhiddenData['ls_hw_total_monthly_rate'][$index],
                    'ls_hw_salary' => $requirementLhiddenData['ls_hw_salary'][$index],
                    'ls_hw_social' => $requirementLhiddenData['ls_hw_social'][$index],
                    'ls_hw_training_cost' => $requirementLhiddenData['ls_hw_training_cost'][$index],
                    'ls_hw_app_gst' => $requirementLhiddenData['ls_hw_app_gst'][$index],
                    'ls_hw_gst' => $requirementLhiddenData['ls_hw_gst'][$index],
                    'ls_hw_admin_cost' => $requirementLhiddenData['ls_hw_admin_cost'][$index],
                    'ls_hw_eobi' => $requirementLhiddenData['ls_hw_eobi'][$index],
                    'ls_hw_group_life' => $requirementLhiddenData['ls_hw_group_life'][$index],
                    'ls_hw_hidden_admin_cost' => $requirementLhiddenData['ls_hw_hidden_admin_cost'][$index],
                    'ls_hw_app_wht_per' => $requirementLhiddenData['ls_hw_app_wht_per'][$index],
                    'ls_hw_wht' => $requirementLhiddenData['ls_hw_wht'][$index],
                    'ls_hw_total_admin_cost' => $requirementLhiddenData['ls_hw_total_admin_cost'][$index],
                    'ls_hw_current_min_wage_region' => $requirementLhiddenData['ls_hw_current_min_wage_region'][$index],
                    'ls_hw_total_monthly_rate_witout_tax' => $requirementLhiddenData['ls_hw_total_monthly_rate_witout_tax'][$index],
                    'ls_hw_grand_total' => $requirementLhiddenData['ls_hw_grand_total'][$index],
                ];


                $requirementLhiddenDataArray[] = $requirementLshownDataRow;
            }

            $requirement->lumpsumhiddenwht()->createMany($requirementLhiddenDataArray);

            $requirementreverseworkingData = $request->only([
                'reverseCategory','reverseapplicablepercentageGst','reverseAfterWht', 'reverseSalary',
                'reverseTotalProfit' , 'reverseapplicablewhtpercent' , 'reverseRate' , 'reverseGst', 'reverseProfit' , 'reverseWht' , 'reverseAfterGst' ,'reverseQuantity'
            ]);

            $requirementreverseworkingDataArray = [];
            foreach ($this->iterableInput($requirementreverseworkingData['reverseCategory'] ?? null) as $index => $reverseworkingCategory) {
                $requirementreverseworkingDataRow = [
                    'reverseCategory' => $reverseworkingCategory,
                    'reverseapplicablepercentageGst' => $requirementreverseworkingData['reverseapplicablepercentageGst'][$index],
                    'reverseAfterWht' => $requirementreverseworkingData['reverseAfterWht'][$index],
                    'reverseSalary' => $requirementreverseworkingData['reverseSalary'][$index],
                    'reverseTotalProfit' => $requirementreverseworkingData['reverseTotalProfit'][$index],
                    'reverseapplicablewhtpercent' => $requirementreverseworkingData['reverseapplicablewhtpercent'][$index],
                    'reverseRate' => $requirementreverseworkingData['reverseRate'][$index],
                    'reverseGst' => $requirementreverseworkingData['reverseGst'][$index],
                    'reverseProfit' => $requirementreverseworkingData['reverseProfit'][$index],
                    'reverseWht' => $requirementreverseworkingData['reverseWht'][$index],
                    'reverseAfterGst' => $requirementreverseworkingData['reverseAfterGst'][$index],
                    'reverseQuantity' => $requirementreverseworkingData['reverseQuantity'][$index],
                ];


                $requirementreverseworkingDataArray[] = $requirementreverseworkingDataRow;
            }
            $requirement->complainwithreverseworking()->createMany($requirementreverseworkingDataArray);

            DB::commit();

            return redirect()->back()->with('success', 'Requirement saved successfully.');
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('An error occurred while saving Requirements data: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while saving data.');
        }
    }

    public function viewrequirements($id)
    {
        $requirements = Requirement::with('requirementpocs')->find($id);

        if (!$requirements) {
            return back()->with('error', 'Requirement not found.');
        }

        return view('Sales.viewrequirements', compact('requirements'));
    }

    public function editrequirements($id)
    {
        $requirements = Requirement::with('requirementpocs')->find($id);

        if (!$requirements) {
            return back()->with('error', 'Requirement not found.');
        }

        return view('Sales.editrequirements', compact('requirements'));
    }
    public function updateRequirements(Request $request, $id)
{    
    // return $request->all();
    DB::beginTransaction();

    try {
        $requirement = Requirement::findOrFail($id);
         $requirementData = $this->normalizeRequirementPayload($request->except('_token'));

            // Handle file uploads
            $requirementImageFields = [
                'visitingCardFront', 'visitingCardBack', 'supportingRfqAttach',
                'rfqDocAttach', 'finPro', 'email_attachment', 'listComAttach', 'scanRecAttach',
                'grevAttach', 'bidAttach', 'competitorAttach',
            ];

            foreach ($requirementImageFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/requirements'), $file_name);
                    $requirementData[$field] = 'uploads/requirements/' . $file_name;
                }
            }

            // Create the requirement
            $requirement = Requirement::create($requirementData);

            //Requirements Addresses
            $requirementPocData = $request->only([
                'req_poc_name','req_poc_num','req_poc_desig','req_poc_email',
                'req_poc_org_name','req_poc_office_no', 'req_poc_floor',
                'req_poc_building','req_poc_block','req_poc_area','req_poc_city',
                'req_poc_pin'
            ]);

            $requirementPocDataArray = [];
            foreach ($this->iterableInput($requirementPocData['req_poc_name'] ?? null) as $index => $reqPocName) {
                $requirementPocDataRow = [
                    'req_poc_name' => $reqPocName?? null,
                    'req_poc_num' => $requirementPocData['req_poc_num'][$index]?? null,
                    'req_poc_desig' => $requirementPocData['req_poc_desig'][$index]?? null,
                    'req_poc_email' => $requirementPocData['req_poc_email'][$index]?? null,
                    'req_poc_org_name' => $requirementPocData['req_poc_org_name'][$index]?? null,
                    'req_poc_office_no' => $requirementPocData['req_poc_office_no'][$index]?? null,
                    'req_poc_floor' => $requirementPocData['req_poc_floor'][$index]?? null,
                    'req_poc_building' => $requirementPocData['req_poc_building'][$index]?? null,
                    'req_poc_block' => $requirementPocData['req_poc_block'][$index]?? null,
                    'req_poc_area' => $requirementPocData['req_poc_area'][$index]?? null,
                    'req_poc_city' => $requirementPocData['req_poc_city'][$index]?? null,
                    'req_poc_pin' => $requirementPocData['req_poc_pin'][$index]?? null,
                ];

                $requirementPocFields = [
                    'req_poc_visiting_front', 'req_poc_visiting_back',
                    'req_poc_building_attach'
                ];

                foreach ($requirementPocFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementPocDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementPocDataArray[] = $requirementPocDataRow;
            }

            $requirement->requirementpocs()->createMany($requirementPocDataArray);

            //Requirements Addresses
            $requirementAddressData = $request->only([
    'office_no', 'floor', 'building', 'block', 'area', 'city', 'pin_location',
    'company', 'email', 'website', 'notes'
]);
$requirementAddressDataArray = [];
foreach ($this->iterableInput($requirementAddressData['office_no'] ?? null) as $index => $officeNo) {
    $requirementAddressDataRow = [
        'office_no' => $officeNo ?? null,
        'floor' => $requirementAddressData['floor'][$index] ?? null,
                    'building' => $requirementAddressData['building'][$index]?? null,
                    'block' => $requirementAddressData['block'][$index]?? null,
                    'area' => $requirementAddressData['area'][$index]?? null,
                    'city' => $requirementAddressData['city'][$index]?? null,
                    'pin_location' => $requirementAddressData['pin_location'][$index]?? null,
                    'company' => $requirementAddressData['company'][$index]?? null,
                    'email' => $requirementAddressData['email'][$index]?? null,
                    'website' => $requirementAddressData['website'][$index]?? null,
                    'notes' => $requirementAddressData['notes'][$index]?? null,
            ];
            


                $requirementAddressFields = [
                    'builidng_attach', 'attachments'
                ];

                foreach ($requirementAddressFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementAddressDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementAddressDataArray[] = $requirementAddressDataRow;
            }

            $requirement->requirementaddress()->createMany($requirementAddressDataArray);

            //Men Guarding Services
            $requirementGuardData = $request->only([
                'guard_category','guard_quantity','guard_shift_timing','guard_food',
                'guard_accomodation','guard_transportation',
                'guard_required_monthly','guard_required_dialy',
                'no_of_days_guard_required','guard_notes'
            ]);
            $requirementGuardDataArray = [];
            foreach ($this->iterableInput($requirementGuardData['guard_category'] ?? null) as $index => $guardCategory) {
                $requirementGuardDataRow = [
                    'guard_category' => $guardCategory?? null,
                    'guard_quantity' => $requirementGuardData['guard_quantity'][$index]?? null,
                    'guard_shift_timing' => $requirementGuardData['guard_shift_timing'][$index]?? null,
                    'guard_food' => $requirementGuardData['guard_food'][$index]?? null,
                    'guard_accomodation' => $requirementGuardData['guard_accomodation'][$index]?? null,
                    'guard_transportation' => $requirementGuardData['guard_transportation'][$index]?? null,
                    'guard_required_monthly' => $requirementGuardData['guard_required_monthly'][$index]?? null,
                    'guard_required_dialy' => $requirementGuardData['guard_required_dialy'][$index] ?? null,
                    'no_of_days_guard_required' => $requirementGuardData['no_of_days_guard_required'][$index]?? null,
                    'guard_notes' => $requirementGuardData['guard_notes'][$index]?? null,
                ];
                $requirementGuardFields = [
                    'financial_working_excel_attach', 'financial_working_word_attach' ,
                    'financial_working_pdf_attach' , 'guard_attach'
                ];

                foreach ($requirementGuardFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementGuardDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementGuardDataArray[] = $requirementGuardDataRow;
            }

            $requirement->requirementguard()->createMany($requirementGuardDataArray);


            //Vehicle Security
            $requirementVehicleData = $request->only([
                'vehicle_ownership','vehicle_type','vehicle_category','vehicle_required', 'vehicle_mantenance',
                'vehicle_fuel','vehicle_rate_per_km', 'vehicle_km_required', 'vehicle_toll', 'vehicle_tol',
                'vehicle_reporting_time','vehicle_rep_office_no', 'vehicle_rep_floor' , 'vehicle_rep_building',
                'vehicle_rep_block','vehicle_rep_area', 'vehicle_rep_city', 'vehicle_rep_location','vehicle_duty_start_date',
                'vehicle_duty_end_date','vehicle_duty_start_time','vehicle_duty_end_time','vehicle_shift_duration',
                'vehicle_no_of_shifts','vehicle_food_by_client','vehicle_guard_category','vehicle_guard_quantity',
                'vehicle_guard_shift_timing','vehicle_guard_food_by_client','vehicle_guard_accomodation','vehicle_guard_transportation',
                'vehicle_guard_req_monthly','vehicle_guard_req_dialy','vehicle_guard_no','vehicle_guard_notes'
            ]);

            $requirementVehicleDataArray = [];
            foreach ($this->iterableInput($requirementVehicleData['vehicle_ownership'] ?? null) as $index => $vehicleOwnership) {
                $requirementVehicleDataRow = [
                    'vehicle_ownership' => $vehicleOwnership?? null,
                    'vehicle_type' => $requirementVehicleData['vehicle_type'][$index]?? null,
                    'vehicle_category' => $requirementVehicleData['vehicle_category'][$index]?? null,
                    'vehicle_mantenance' => $requirementVehicleData['vehicle_mantenance'][$index]?? null,
                    'vehicle_fuel' => $requirementVehicleData['vehicle_fuel'][$index]?? null,
                    'vehicle_rate_per_km' => $requirementVehicleData['vehicle_rate_per_km'][$index]?? null,
                    'vehicle_km_required' => $requirementVehicleData['vehicle_km_required'][$index]?? null,
                    'vehicle_toll' => $requirementVehicleData['vehicle_toll'][$index]?? null,
                    'vehicle_tol' => $requirementVehicleData['vehicle_tol'][$index]?? null,
                    'vehicle_reporting_time' => $requirementVehicleData['vehicle_reporting_time'][$index]?? null,
                    'vehicle_rep_office_no' => $requirementVehicleData['vehicle_rep_office_no'][$index]?? null,
                    'vehicle_rep_floor' => $requirementVehicleData['vehicle_rep_floor'][$index]?? null,
                    'vehicle_rep_building' => $requirementVehicleData['vehicle_rep_building'][$index]?? null,
                    'vehicle_rep_block' => $requirementVehicleData['vehicle_rep_block'][$index]?? null,
                    'vehicle_rep_area' => $requirementVehicleData['vehicle_rep_area'][$index]?? null,
                    'vehicle_rep_city' => $requirementVehicleData['vehicle_rep_city'][$index]?? null,
                    'vehicle_rep_location' => $requirementVehicleData['vehicle_rep_location'][$index]?? null,
                    'vehicle_duty_start_date' => $requirementVehicleData['vehicle_duty_start_date'][$index]?? null,
                    'vehicle_duty_end_date' => $requirementVehicleData['vehicle_duty_end_date'][$index]?? null,
                    'vehicle_duty_start_time' => $requirementVehicleData['vehicle_duty_start_time'][$index]?? null,
                    'vehicle_duty_end_time' => $requirementVehicleData['vehicle_duty_end_time'][$index]?? null,
                    'vehicle_no_of_shifts' => $requirementVehicleData['vehicle_no_of_shifts'][$index]?? null,
                    'vehicle_food_by_client' => $requirementVehicleData['vehicle_food_by_client'][$index]?? null,
                    'vehicle_guard_category' => $requirementVehicleData['vehicle_guard_category'][$index]?? null,
                    'vehicle_guard_quantity' => $requirementVehicleData['vehicle_guard_quantity'][$index]?? null,
                    'vehicle_guard_shift_timing' => $requirementVehicleData['vehicle_guard_shift_timing'][$index]?? null,
                    'vehicle_guard_food_by_client' => $requirementVehicleData['vehicle_guard_food_by_client'][$index]?? null,
                    'vehicle_guard_accomodation' => $requirementVehicleData['vehicle_guard_accomodation'][$index]?? null,
                    'vehicle_guard_transportation' => $requirementVehicleData['vehicle_guard_transportation'][$index]?? null,
                    'vehicle_guard_req_monthly' => $requirementVehicleData['vehicle_guard_req_monthly'][$index]?? null,
                    'vehicle_guard_req_dialy' => $requirementVehicleData['vehicle_guard_req_dialy'][$index]?? null,
                    'vehicle_guard_no' => $requirementVehicleData['vehicle_guard_no'][$index]?? null,
                    'vehicle_guard_notes' => $requirementVehicleData['vehicle_guard_notes'][$index]?? null,
                ];

                $requirementVehiclecheckboxFields = ['vehicle_reporting_address', 'vehicle_req_with_driver',
                                                    'vehicle_req_with_security'];

                foreach ($requirementVehiclecheckboxFields as $field) {
                    $requirementVehicleData[$field] = $request->has($field) ? true : false;
                }

                $requirementVehicleFields = [
                    'vehicle_meter_reading','vehicle_meter_picture', 'vehicle_rep_picture' ,
                    'vehicle_guard_attach' ,
                ];

                foreach ($requirementVehicleFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementVehicleDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementVehicleDataArray[] = $requirementVehicleDataRow;
            }

            $requirement->requirementvehicle()->createMany($requirementVehicleDataArray);

            //Canine Services
            $requirementCanineData = $request->only([
                'canine_req_for','canine_category','canine_req_for_days','canine_color',
                'canine_no','canine_req_handler', 'canine_handler_name' , 'canine_handler_cnic_no',
                'canine_handler_age','canine_handler_exp', 'canine_handler_cell', 'canine_duty_start_date',
                'canine_duty_end_date','canine_duty_start_time' , 'canine_duty_end_time','canine_shift_duration',
                'canine_no_of_shifts','canine_notes'
            ]);

            $requirementCanineDataArray = [];
            foreach ($this->iterableInput($requirementCanineData['canine_req_for'] ?? null) as $index => $canineReqfor) {
                $requirementCanineDataRow = [
                    'canine_req_for' => $canineReqfor?? null,
                    'canine_category' => $requirementCanineData['canine_category'][$index]?? null,
                    'canine_req_for_days' => $requirementCanineData['canine_req_for_days'][$index]?? null,
                    'canine_color' => $requirementCanineData['canine_color'][$index]?? null,
                    'canine_no' => $requirementCanineData['canine_no'][$index]?? null,
                    'canine_req_handler' => $requirementCanineData['canine_req_handler'][$index]?? null,
                    'canine_handler_name' => $requirementCanineData['canine_handler_name'][$index]?? null,
                    'canine_handler_cnic_no' => $requirementCanineData['canine_handler_cnic_no'][$index]?? null,
                    'canine_handler_age' => $requirementCanineData['canine_handler_age'][$index]?? null,
                    'canine_handler_exp' => $requirementCanineData['canine_handler_exp'][$index]?? null,
                    'canine_handler_cell' => $requirementCanineData['canine_handler_cell'][$index]?? null,
                    'canine_duty_start_date' => $requirementCanineData['canine_duty_start_date'][$index]?? null,
                    'canine_duty_end_date' => $requirementCanineData['canine_duty_end_date'][$index]?? null,
                    'canine_duty_start_time' => $requirementCanineData['canine_duty_start_time'][$index]?? null,
                    'canine_duty_end_time' => $requirementCanineData['canine_duty_end_time'][$index]?? null,
                    'canine_shift_duration' => $requirementCanineData['canine_shift_duration'][$index]?? null,
                    'canine_no_of_shifts' => $requirementCanineData['canine_no_of_shifts'][$index]?? null,
                    'canine_notes' => $requirementCanineData['canine_notes'][$index]?? null,
                ];

                $requirementCanineFields = [
                    'canine_handler_cnic_front', 'canine_handler_cnic_back' ,
                    'canine_pic_of_dogs' , 'canine_attach'
                ];

                foreach ($requirementCanineFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementCanineDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementCanineDataArray[] = $requirementCanineDataRow;
            }

            $requirement->requirementcanine()->createMany($requirementCanineDataArray);


            //Facilitation Services
            $requirementFacilitationData = $request->only([
                'guest_arrival_time','security_reporting_time','nationality_of_guest', 'name_of_airline',
                'contact_of_airline','email_of_airline', 'web_of_airline', 'facility_poc_name',
                'facility_poc_desig','facility_poc_contact', 'facility_poc_email' , 'facility_poc_office',
                'facility_poc_floor','facility_poc_building', 'facility_poc_block', 'facility_poc_area',
                'facility_poc_city','facility_poc_loc','flight_number','flying_from', 'guest_number',
                'hand_carry','luggage_weight','tag_number','color_of_bags', 'weight_of_bags', 'facilitation_notes',
            ]);

            $requirementFacilitationDataArray = [];
            foreach ($this->iterableInput($requirementFacilitationData['guest_arrival_time'] ?? null) as $index => $guestArrivaltime) {
                $requirementFacilitationDataRow = [
                    'guest_arrival_time' => $guestArrivaltime?? null,
                    'security_reporting_time' => $requirementFacilitationData['security_reporting_time'][$index]?? null,
                    'nationality_of_guest' => $requirementFacilitationData['nationality_of_guest'][$index]?? null,
                    'name_of_airline' => $requirementFacilitationData['name_of_airline'][$index]?? null,
                    'contact_of_airline' => $requirementFacilitationData['contact_of_airline'][$index]?? null,
                    'email_of_airline' => $requirementFacilitationData['email_of_airline'][$index]?? null,
                    'web_of_airline' => $requirementFacilitationData['web_of_airline'][$index]?? null,
                    'facility_poc_name' => $requirementFacilitationData['facility_poc_name'][$index]?? null,
                    'facility_poc_desig' => $requirementFacilitationData['facility_poc_desig'][$index]?? null,
                    'facility_poc_contact' => $requirementFacilitationData['facility_poc_contact'][$index]?? null,
                    'facility_poc_email' => $requirementFacilitationData['facility_poc_email'][$index]?? null,
                    'facility_poc_office' => $requirementFacilitationData['facility_poc_office'][$index]?? null,
                    'facility_poc_floor' => $requirementFacilitationData['facility_poc_floor'][$index]?? null,
                    'facility_poc_building' => $requirementFacilitationData['facility_poc_building'][$index]?? null,
                    'facility_poc_block' => $requirementFacilitationData['facility_poc_block'][$index]?? null,
                    'facility_poc_area' => $requirementFacilitationData['facility_poc_area'][$index]?? null,
                    'facility_poc_city' => $requirementFacilitationData['facility_poc_city'][$index]?? null,
                    'facility_poc_loc' => $requirementFacilitationData['facility_poc_loc'][$index]?? null,
                    'flight_number' => $requirementFacilitationData['flight_number'][$index]?? null,
                    'flying_from' => $requirementFacilitationData['flying_from'][$index]?? null,
                    'guest_number' => $requirementFacilitationData['guest_number'][$index]?? null,
                    'hand_carry' => $requirementFacilitationData['hand_carry'][$index]?? null,
                    'luggage_weight' => $requirementFacilitationData['luggage_weight'][$index]?? null,
                    'tag_number' => $requirementFacilitationData['tag_number'][$index]?? null,
                    'color_of_bags' => $requirementFacilitationData['color_of_bags'][$index]?? null,
                    'weight_of_bags' => $requirementFacilitationData['weight_of_bags'][$index]?? null,
                    'facilitation_notes' => $requirementFacilitationData['facilitation_notes'][$index]?? null,
                ];

                $requirementFacilitationcheckboxFields = ['security_staff_rep_loc', 'airline_details',
                                                    'poc_of_airline'];

                foreach ($requirementFacilitationcheckboxFields as $field) {
                    $requirementFacilitationData[$field] = $request->has($field) ? true : false;
                }

                $requirementFacilitationFields = [
                    'photograph_of_guest','photograph_of_passport', 'facility_poc_building' ,
                    'copy_of_guest_ticket' , 'copy_of_guest_visa' , 'guest_schedule' , 'picture_of_bags',
                    'facilitation_attach'
                ];

                foreach ($requirementFacilitationFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementFacilitationDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementFacilitationDataArray[] = $requirementFacilitationDataRow;
            }

            $requirement->requirementfacilitation()->createMany($requirementFacilitationDataArray);

             //Private Jet Services
             $requirementJetData = $request->only([
                'no_of_days_private_jet','fuel_for_private_jet','rate_of_fuel_for_jet'
            ]);

            $requirementJetDataArray = [];
            foreach ($this->iterableInput($requirementJetData['no_of_days_private_jet'] ?? null) as $index => $noOfaysPrivatejet) {
                $requirementJetDataRow = [
                    'no_of_days_private_jet' => $noOfaysPrivatejet,
                    'fuel_for_private_jet' => $requirementJetData['fuel_for_private_jet'][$index]?? null,
                    'rate_of_fuel_for_jet' => $requirementJetData['rate_of_fuel_for_jet'][$index]?? null,
                ];

                $requirementJetDataArray[] = $requirementJetDataRow;
            }

            $requirement->requirementjet()->createMany($requirementJetDataArray);

            //Event Security Services
            $requirementEventData = $request->only([
                'ownership_status','event_req_for','event_no_of_staff', 'event_duty_start_date',
                'event_duty_end_date','event_duty_start_time', 'event_duty_end_time', 'event_shift_duration',
                'event_shift_type','event_no_of_shifts', 'event_office_no' , 'event_floor', 'event_building',
                'event_block','event_area', 'event_city', 'event_loc', 'event_date','event_security_notes'
            ]);

            $requirementEventDataArray = [];
            foreach ($this->iterableInput($requirementEventData['ownership_status'] ?? null) as $index => $ownershipStatus) {
                $requirementEventDataRow = [
                    'ownership_status' => $ownershipStatus?? null,
                    'event_req_for' => $requirementEventData['event_req_for'][$index]?? null,
                    'event_no_of_staff' => $requirementEventData['event_no_of_staff'][$index]?? null,
                    'event_duty_start_date' => $requirementEventData['event_duty_start_date'][$index]?? null,
                    'event_duty_end_date' => $requirementEventData['event_duty_end_date'][$index]?? null,
                    'event_duty_start_time' => $requirementEventData['event_duty_start_time'][$index]?? null,
                    'event_duty_end_time' => $requirementEventData['event_duty_end_time'][$index]?? null,
                    'event_shift_duration' => $requirementEventData['event_shift_duration'][$index]?? null,
                    'event_shift_type' => $requirementEventData['event_shift_type'][$index]?? null,
                    'event_no_of_shifts' => $requirementEventData['event_no_of_shifts'][$index]?? null,
                    'event_office_no' => $requirementEventData['event_office_no'][$index]?? null,
                    'event_floor' => $requirementEventData['event_floor'][$index]?? null,
                    'event_building' => $requirementEventData['event_building'][$index]?? null,
                    'event_block' => $requirementEventData['event_block'][$index]?? null,
                    'event_area' => $requirementEventData['event_area'][$index]?? null,
                    'event_city' => $requirementEventData['event_city'][$index]?? null,
                    'event_loc' => $requirementEventData['event_loc'][$index]?? null,
                    'event_date' => $requirementEventData['event_date'][$index]?? null,
                    'event_security_notes' => $requirementEventData['event_security_notes'][$index]?? null,
                ];

                $requirementEventcheckboxFields = ['event_reporting_location'];

                foreach ($requirementEventcheckboxFields as $field) {
                    $requirementEventData[$field] = $request->has($field) ? true : false;
                }

                $requirementEventFields = [
                    'event_photo','event_venue', 'event_deployment_plan' , 'event_security_attach'
                ];

                foreach ($requirementEventFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementEventDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementEventDataArray[] = $requirementEventDataRow;
            }

            $requirement->requirementevent()->createMany($requirementEventDataArray);

            //Security Consultancy
            $requirementConsultancyData = $request->only([
                'consultancy_category','internal_deadline','consultancy_date_of_submission',
                'consultancy_notes'
            ]);

            $requirementConsultancyDataArray = [];
            foreach ($this->iterableInput($requirementConsultancyData['consultancy_category'] ?? null) as $index => $consultancyCategory) {
                $requirementConsultancyDataRow = [
                    'consultancy_category' => $consultancyCategory?? null,
                    'internal_deadline' => $requirementConsultancyData['internal_deadline'][$index]?? null,
                    'consultancy_date_of_submission' => $requirementConsultancyData['consultancy_date_of_submission'][$index]?? null,
                    'consultancy_notes' => $requirementConsultancyData['consultancy_notes'][$index]?? null,
                ];

                $requirementConsultancyFields = [
                    'scope_of_work', 'consultancy_attach'
                ];

                foreach ($requirementConsultancyFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementConsultancyDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementConsultancyDataArray[] = $requirementConsultancyDataRow;
            }

            $requirement->requirementconsultancy()->createMany($requirementConsultancyDataArray);


            //Fire Equipment Services
            $requirementFireData = $request->only([
                'fireClass','fire_equipment_name','fire_cylinder_type', 'fire_article_no',
                'fire_model','fire_year_of_manufacturing', 'fire_expiry_date', 'fire_warranty_period',
                'fire_color','fire_quantity', 'fire_notes'
            ]);

            $requirementFireDataArray = [];
            foreach ($this->iterableInput($requirementFireData['fireClass'] ?? null) as $index => $fireClass) {
                $requirementFireDataRow = [
                    'fireClass' => $fireClass?? null,
                    'fire_equipment_name' => $requirementFireData['fire_equipment_name'][$index]?? null,
                    'fire_cylinder_type' => $requirementFireData['fire_cylinder_type'][$index]?? null,
                    'fire_article_no' => $requirementFireData['fire_article_no'][$index]?? null,
                    'fire_model' => $requirementFireData['fire_model'][$index]?? null,
                    'fire_year_of_manufacturing' => $requirementFireData['fire_year_of_manufacturing'][$index]?? null,
                    'fire_expiry_date' => $requirementFireData['fire_expiry_date'][$index]?? null,
                    'fire_warranty_period' => $requirementFireData['fire_warranty_period'][$index]?? null,
                    'fire_color' => $requirementFireData['fire_color'][$index]?? null,
                    'fire_quantity' => $requirementFireData['fire_quantity'][$index]?? null,
                    'fire_notes' => $requirementFireData['fire_notes'][$index]?? null,
                ];

                $requirementFirecheckboxFields = ['waterCylinder', 'dryChemical' , 'CoTwo' , 'foam' ,
                'wetChemical' , 'dryChemicalAbe' , 'dryChemicalBe', 'Co2', 'foam2' , 'dryChemicalPowderABE',
                'dryChemicalPowderBE', 'dryChemicalPowderABE1' , 'dryChemicalPowderBE1' , 'dryChemicalPowderABE2',
                'dryChemicalPowderBE2' , 'cd2' , 'dryChemicalPowderBE3' ,'foam3' , 'wetChemical2' ];

                foreach ($requirementFirecheckboxFields as $field) {
                    $requirementFireData[$field] = $request->has($field) ? true : false;
                }

                $requirementFireFields = [
                    'fire_attach', 'fire_specifications'
                ];

                foreach ($requirementFireFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementFireDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementFireDataArray[] = $requirementFireDataRow;
            }

            $requirement->requirementfire()->createMany($requirementFireDataArray);

            //Other Fire
            $requirementOtherData = $request->only([
                'other_fire_category','other_equip_name','other_article_no', 'other_model',
                'other_year_of_manufacture' , 'other_expiry_date' , 'other_warranty_period',
                'other_color' , 'other_quantity' , 'other_instruction' , 'other_complete_cost',
                'other_delivery_charges', 'other_installtion_cost' , 'other_fire_notes'
            ]);

            $requirementOtherDataArray = [];
            foreach ($this->iterableInput($requirementOtherData['other_fire_category'] ?? null) as $index => $otherfireCategory) {
                $requirementOtherDataRow = [
                    'other_fire_category' => $otherfireCategory?? null,
                    'other_equip_name' => $requirementOtherData['other_equip_name'][$index]?? null,
                    'other_article_no' => $requirementOtherData['other_article_no'][$index]?? null,
                    'other_model' => $requirementOtherData['other_model'][$index]?? null,
                    'other_year_of_manufacture' => $requirementOtherData['other_year_of_manufacture'][$index]?? null,
                    'other_expiry_date' => $requirementOtherData['other_expiry_date'][$index]?? null,
                    'other_warranty_period' => $requirementOtherData['other_warranty_period'][$index]?? null,
                    'other_color' => $requirementOtherData['other_color'][$index]?? null,
                    'other_quantity' => $requirementOtherData['other_quantity'][$index]?? null,
                    'other_instruction' => $requirementOtherData['other_instruction'][$index]?? null,
                    'other_complete_cost' => $requirementOtherData['other_complete_cost'][$index]?? null,
                    'other_delivery_charges' => $requirementOtherData['other_delivery_charges'][$index]?? null,
                    'other_installtion_cost' => $requirementOtherData['other_installtion_cost'][$index]?? null,
                    'other_fire_notes' => $requirementOtherData['other_fire_notes'][$index]?? null,
                ];

                $requirementOtherFields = [
                    'other_specifications', 'other_scope_of_work' , 'other_picture_of_building',
                    'other_fire_attachment'
                ];

                foreach ($requirementOtherFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementOtherDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementOtherDataArray[] = $requirementOtherDataRow;
            }

            $requirement->requirementotherfire()->createMany($requirementOtherDataArray);


            //Passive Fire
            $requirementPassiveData = $request->only([
                'passive_category','passive_dimension','passive_width', 'passive_height',
                'passive_depth' , 'passive_quantity' , 'passive_material', 'passive_equipment',
                'passive_article' , 'passive_model' , 'passive_year_of_manufacture' , 'passive_expiry',
                'passive_warranty', 'passive_color' , 'passive_second_quantity', 'passive_instruction',
                'passive_complete_cost', 'passive_delivery_charges' , 'passive_cost' ,'passive_complete_equip_charges'
            ]);

            $requirementPassiveDataArray = [];
            foreach ($this->iterableInput($requirementPassiveData['passive_category'] ?? null) as $index => $passiveCategory) {
                $requirementPassiveDataRow = [
                    'passive_category' => $passiveCategory?? null,
                    'passive_dimension' => $requirementPassiveData['passive_dimension'][$index]?? null,
                    'passive_width' => $requirementPassiveData['passive_width'][$index]?? null,
                    'passive_height' => $requirementPassiveData['passive_height'][$index]?? null,
                    'passive_depth' => $requirementPassiveData['passive_depth'][$index]?? null,
                    'passive_quantity' => $requirementPassiveData['passive_quantity'][$index]?? null,
                    'passive_material' => $requirementPassiveData['passive_material'][$index]?? null,
                    'passive_equipment' => $requirementPassiveData['passive_equipment'][$index]?? null,
                    'passive_article' => $requirementPassiveData['passive_article'][$index]?? null,
                    'passive_model' => $requirementPassiveData['passive_model'][$index]?? null,
                    'passive_year_of_manufacture' => $requirementPassiveData['passive_year_of_manufacture'][$index]?? null,
                    'passive_expiry' => $requirementPassiveData['passive_expiry'][$index]?? null,
                    'passive_warranty' => $requirementPassiveData['passive_warranty'][$index]?? null,
                    'passive_color' => $requirementPassiveData['passive_color'][$index]?? null,
                    'passive_second_quantity' => $requirementPassiveData['passive_second_quantity'][$index]?? null,
                    'passive_instruction' => $requirementPassiveData['passive_instruction'][$index]?? null,
                    'passive_complete_cost' => $requirementPassiveData['passive_complete_cost'][$index]?? null,
                    'passive_delivery_charges' => $requirementPassiveData['passive_delivery_charges'][$index]?? null,
                    'passive_cost' => $requirementPassiveData['passive_cost'][$index]?? null,
                    'passive_complete_equip_charges' => $requirementPassiveData['passive_complete_equip_charges'][$index]?? null,
                ];

                $requirementPassiveFields = [
                    'passive_scope_of_work', 'passive_building_picture' , 'passive_drawings',
                    'passive_pictures'
                ];

                foreach ($requirementPassiveFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementPassiveDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementPassiveDataArray[] = $requirementPassiveDataRow;
            }

            $requirement->requirementpassive()->createMany($requirementPassiveDataArray);

            //Security Equipment Services
            $requirementSecurityData = $request->only([
                'equipment_category','equipment_ownership','equipment_rental', 'equipment_no_of_days',
                'equipment_quality','equipment_training', 'equipment_delivery', 'equipment_del_office_no',
                'equipment_del_floor','equipment_del_building','equipment_del_block' , 'equipment_del_area',
                'equipment_del_city' , 'equipment_del_pin_loc' , 'equipment_installation_req',
                'equipment_ins_office_no' , 'equipment_ins_floor' , 'equipment_ins_building',
                'equipment_ins_block','equipment_ins_area','equipment_ins_city','equipment_ins_pin_location',
                'equipment_notes'
            ]);

            $requirementSecurityDataArray = [];
            foreach ($this->iterableInput($requirementSecurityData['equipment_category'] ?? null) as $index => $equipmentCategory) {
                $requirementSecurityDataRow = [
                    'equipment_category' => $equipmentCategory?? null,
                    'equipment_ownership' => $requirementSecurityData['equipment_ownership'][$index]?? null,
                    'equipment_rental' => $requirementSecurityData['equipment_rental'][$index]?? null,
                    'equipment_no_of_days' => $requirementSecurityData['equipment_no_of_days'][$index]?? null,
                    'equipment_quality' => $requirementSecurityData['equipment_quality'][$index]?? null,
                    'equipment_training' => $requirementSecurityData['equipment_training'][$index]?? null,
                    'equipment_delivery' => $requirementSecurityData['equipment_delivery'][$index]?? null,
                    'equipment_del_office_no' => $requirementSecurityData['equipment_del_office_no'][$index]?? null,
                    'equipment_del_floor' => $requirementSecurityData['equipment_del_floor'][$index]?? null,
                    'equipment_del_building' => $requirementSecurityData['equipment_del_building'][$index]?? null,
                    'equipment_del_block' => $requirementSecurityData['equipment_del_block'][$index]?? null,
                    'equipment_del_area' => $requirementSecurityData['equipment_del_area'][$index]?? null,
                    'equipment_del_city' => $requirementSecurityData['equipment_del_city'][$index]?? null,
                    'equipment_del_pin_loc' => $requirementSecurityData['equipment_del_pin_loc'][$index]?? null,
                    'equipment_installation_req' => $requirementSecurityData['equipment_installation_req'][$index]?? null,
                    'equipment_ins_office_no' => $requirementSecurityData['equipment_ins_office_no'][$index]?? null,
                    'equipment_ins_building' => $requirementSecurityData['equipment_ins_building'][$index]?? null,
                    'equipment_ins_block' => $requirementSecurityData['equipment_ins_block'][$index]?? null,
                    'equipment_ins_area' => $requirementSecurityData['equipment_ins_area'][$index]?? null,
                    'equipment_ins_city' => $requirementSecurityData['equipment_ins_city'][$index]?? null,
                    'equipment_ins_pin_location' => $requirementSecurityData['equipment_ins_pin_location'][$index]?? null,
                    'equipment_notes' => $requirementSecurityData['equipment_notes'][$index]?? null,
                ];

                $requirementSecuritycheckboxFields = ['equipment_dilevery_loc', 'equipment_ins_loc'];

                foreach ($requirementSecuritycheckboxFields as $field) {
                    $requirementFireData[$field] = $request->has($field) ? true : false;
                }

                $requirementSecurityFields = [
                    'equipment_del_photo_building', 'equipment_ins_photo_building' , 'equipment_attachment'
                ];

                foreach ($requirementSecurityFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementSecurityDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementSecurityDataArray[] = $requirementSecurityDataRow;
            }

            $requirement->requirementequipment()->createMany($requirementSecurityDataArray);

            //Traffic Barrier
            $requirementBarrierData = $request->only([
                'barrier_ownership','barrier_rental','barrier_no_of_days', 'barrier_model',
                'barrier_brand','barrier_specifications', 'barrier_quantity', 'barrier_unit',
                'barrier_price','detector_model','detector_brand' , 'detector_specifications',
                'detector_quantity' , 'detector_unit' , 'detector_price', 'traffic_model',
                'traffic_brand' , 'traffic_specifications' , 'traffic_quantity', 'traffic_unit',
                'traffic_price','coupler_model','coupler_brand','coupler_specification',
                'coupler_quantity', 'coupler_unit' , 'coupler_price' , 'tag_model', 'tag_brand',
                'tag_specifications','tag_quantity','tag_unit','tag_price','Etag_model',
                'Etag_brand' , 'Etag_specifications' , 'Etag_quantity' ,'Etag_unit' ,'Etag_price' ,
                'pole_model' , 'pole_brand' ,'pole_specifications' , 'pole_quantity' , 'pole_unit' ,
                'pole_price' , 'breaker_model' , 'breaker_brand' , 'breaker_specifications' ,
                'breaker_quantity', 'breaker_unit' , 'breaker_price' , 'barrier_installation' ,
                'barrier_training', 'barrier_delivery' ,'barrier_office_no' , 'barrier_floor' ,
                'barrier_building' , 'barrier_block' ,'barrier_area' , 'barrier_city' ,
                'barrier_pin_loc' , 'barrier_ins_office' ,'barrier_ins_floor' , 'barrier_ins_building' , 'barrier_ins_block' ,
                'barrier_ins_area' , 'barrier_ins_city' , 'barrier_ins_pin_loc', 'barrier_notes'
            ]);

            $requirementBarrierDataArray = [];
            foreach ($this->iterableInput($requirementBarrierData['barrier_ownership'] ?? null) as $index => $barrierOwnership) {
                $requirementBarrierDataRow = [
                    'barrier_ownership' => $barrierOwnership?? null,
                    'barrier_rental' => $requirementBarrierData['barrier_rental'][$index]?? null,
                    'barrier_no_of_days' => $requirementBarrierData['barrier_no_of_days'][$index]?? null,
                    'barrier_model' => $requirementBarrierData['barrier_model'][$index]?? null,
                    'barrier_brand' => $requirementBarrierData['barrier_brand'][$index]?? null,
                    'barrier_specifications' => $requirementBarrierData['barrier_specifications'][$index]?? null,
                    'barrier_quantity' => $requirementBarrierData['barrier_quantity'][$index]?? null,
                    'barrier_unit' => $requirementBarrierData['barrier_unit'][$index]?? null,
                    'barrier_price' => $requirementBarrierData['barrier_price'][$index]?? null,
                    'detector_model' => $requirementBarrierData['detector_model'][$index]?? null,
                    'detector_brand' => $requirementBarrierData['detector_brand'][$index]?? null,
                    'detector_specifications' => $requirementBarrierData['detector_specifications'][$index]?? null,
                    'detector_quantity' => $requirementBarrierData['detector_quantity'][$index]?? null,
                    'detector_unit' => $requirementBarrierData['detector_unit'][$index]?? null,
                    'detector_price' => $requirementBarrierData['detector_price'][$index]?? null,
                    'traffic_model' => $requirementBarrierData['traffic_model'][$index]?? null,
                    'traffic_brand' => $requirementBarrierData['traffic_brand'][$index]?? null,
                    'traffic_specifications' => $requirementBarrierData['traffic_specifications'][$index]?? null,
                    'traffic_quantity' => $requirementBarrierData['traffic_quantity'][$index]?? null,
                    'traffic_unit' => $requirementBarrierData['traffic_unit'][$index]?? null,
                    'traffic_price' => $requirementBarrierData['traffic_price'][$index]?? null,
                    'coupler_model' => $requirementBarrierData['coupler_model'][$index]?? null,
                    'coupler_brand' => $requirementBarrierData['coupler_brand'][$index]?? null,
                    'coupler_specification' => $requirementBarrierData['coupler_specification'][$index]?? null,
                    'coupler_quantity' => $requirementBarrierData['coupler_quantity'][$index]?? null,
                    'coupler_unit' => $requirementBarrierData['coupler_unit'][$index]?? null,
                    'coupler_price' => $requirementBarrierData['coupler_price'][$index]?? null,
                    'tag_model' => $requirementBarrierData['tag_model'][$index]?? null,
                    'tag_brand' => $requirementBarrierData['tag_brand'][$index]?? null,
                    'tag_specifications' => $requirementBarrierData['tag_specifications'][$index]?? null,
                    'tag_quantity' => $requirementBarrierData['tag_quantity'][$index]?? null,
                    'tag_unit' => $requirementBarrierData['tag_unit'][$index]?? null,
                    'tag_price' => $requirementBarrierData['tag_price'][$index]?? null,
                    'Etag_model' => $requirementBarrierData['Etag_model'][$index]?? null,
                    'Etag_brand' => $requirementBarrierData['Etag_brand'][$index]?? null,
                    'Etag_specifications' => $requirementBarrierData['Etag_specifications'][$index]?? null,
                    'Etag_quantity' => $requirementBarrierData['Etag_quantity'][$index]?? null,
                    'Etag_unit' => $requirementBarrierData['Etag_unit'][$index]?? null,
                    'Etag_price' => $requirementBarrierData['Etag_price'][$index]?? null,
                    'pole_model' => $requirementBarrierData['pole_model'][$index]?? null,
                    'pole_brand' => $requirementBarrierData['pole_brand'][$index]?? null,
                    'pole_specifications' => $requirementBarrierData['pole_specifications'][$index]?? null,
                    'pole_quantity' => $requirementBarrierData['pole_quantity'][$index]?? null,
                    'pole_unit' => $requirementBarrierData['pole_unit'][$index]?? null,
                    'pole_price' => $requirementBarrierData['pole_price'][$index]?? null,
                    'breaker_model' => $requirementBarrierData['breaker_model'][$index]?? null,
                    'breaker_brand' => $requirementBarrierData['breaker_brand'][$index]?? null,
                    'breaker_specifications' => $requirementBarrierData['breaker_specifications'][$index]?? null,
                    'breaker_quantity' => $requirementBarrierData['breaker_quantity'][$index]?? null,
                    'breaker_unit' => $requirementBarrierData['breaker_unit'][$index]?? null,
                    'breaker_price' => $requirementBarrierData['breaker_price'][$index]?? null,
                    'barrier_installation' => $requirementBarrierData['barrier_installation'][$index]?? null,
                    'barrier_training' => $requirementBarrierData['barrier_training'][$index]?? null,
                    'barrier_delivery' => $requirementBarrierData['barrier_delivery'][$index]?? null,
                    'barrier_office_no' => $requirementBarrierData['barrier_office_no'][$index]?? null,
                    'barrier_floor' => $requirementBarrierData['barrier_floor'][$index]?? null,
                    'barrier_building' => $requirementBarrierData['barrier_building'][$index]?? null,
                    'barrier_block' => $requirementBarrierData['barrier_block'][$index]?? null,
                    'barrier_area' => $requirementBarrierData['barrier_area'][$index]?? null,
                    'barrier_city' => $requirementBarrierData['barrier_city'][$index]?? null,
                    'barrier_pin_loc' => $requirementBarrierData['barrier_pin_loc'][$index]?? null,
                    'barrier_ins_office' => $requirementBarrierData['barrier_ins_office'][$index]?? null,
                    'barrier_ins_floor' => $requirementBarrierData['barrier_ins_floor'][$index]?? null,
                    'barrier_ins_building' => $requirementBarrierData['barrier_ins_building'][$index]?? null,
                    'barrier_ins_area' => $requirementBarrierData['barrier_ins_area'][$index]?? null,
                    'barrier_ins_city' => $requirementBarrierData['barrier_ins_city'][$index]?? null,
                    'barrier_ins_pin_loc' => $requirementBarrierData['barrier_ins_pin_loc'][$index]?? null,
                    'barrier_notes' => $requirementBarrierData['barrier_notes'][$index]?? null,
                ];

                $requirementBarriercheckboxFields = ['barrier_del_loc', 'barrier_ins_loc'];

                foreach ($requirementBarriercheckboxFields as $field) {
                    $requirementBarrierData[$field] = $request->has($field) ? true : false;
                }

                $requirementBarrierFields = [
                    'barrier_upload_training','barrier_photo_building', 'barrier_ins_photo_building' ,
                    'barrier_attachments'
                ];

                foreach ($requirementBarrierFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementBarrierDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementBarrierDataArray[] = $requirementBarrierDataRow;
            }

            $requirement->requirementbarrier()->createMany($requirementBarrierDataArray);

            //CCTV Services
            $requirementCctvData = $request->only([
                'cctv_category','cctv_brand','cctv_model', 'cctv_year_of_manu', 'cctv_pixels',
                'cctv_night_vision','cctv_type', 'cctv_backup', 'cctv_nvr', 'cctv_powercable' ,
                'cctv_poe','cctv_quantity','cctv_monthly_cost' , 'cctv_req_on', 'cctv_no_of_days',
                'cctv_del_office' , 'cctv_del_floor' , 'cctv_del_building', 'cctv_del_block',
                'cctv_del_area' , 'cctv_del_city' , 'cctv_ins_office', 'cctv_ins_floor',
                'cctv_ins_building','cctv_ins_block','cctv_ins_area','cctv_ins_city',
                'cctv_ins_pin_loc' , 'cctv_maintenance_req' ,'cctv_maintenance_req_basis',
                'cctv_notes'
            ]);

            $requirementCctvDataArray = [];
            foreach ($this->iterableInput($requirementCctvData['cctv_category'] ?? null) as $index => $cctvCategory) {
                $requirementCctvDataRow = [
                    'cctv_category' => $cctvCategory?? null,
                    'cctv_brand' => $requirementCctvData['cctv_brand'][$index]?? null,
                    'cctv_model' => $requirementCctvData['cctv_model'][$index]?? null,
                    'cctv_year_of_manu' => $requirementCctvData['cctv_year_of_manu'][$index]?? null,
                    'cctv_pixels' => $requirementCctvData['cctv_pixels'][$index]?? null,
                    'cctv_night_vision' => $requirementCctvData['cctv_night_vision'][$index]?? null,
                    'cctv_type' => $requirementCctvData['cctv_type'][$index]?? null,
                    'cctv_backup' => $requirementCctvData['cctv_backup'][$index]?? null,
                    'cctv_nvr' => $requirementCctvData['cctv_nvr'][$index]?? null,
                    'cctv_powercable' => $requirementCctvData['cctv_powercable'][$index]?? null,
                    'cctv_poe' => $requirementCctvData['cctv_poe'][$index]?? null,
                    'cctv_quantity' => $requirementCctvData['cctv_quantity'][$index]?? null,
                    'cctv_monthly_cost' => $requirementCctvData['cctv_monthly_cost'][$index]?? null,
                    'cctv_req_on' => $requirementCctvData['cctv_req_on'][$index]?? null,
                    'cctv_no_of_days' => $requirementCctvData['cctv_no_of_days'][$index]?? null,
                    'cctv_del_office' => $requirementCctvData['cctv_del_office'][$index]?? null,
                    'cctv_del_floor' => $requirementCctvData['cctv_del_floor'][$index]?? null,
                    'cctv_del_building' => $requirementCctvData['cctv_del_building'][$index]?? null,
                    'cctv_del_block' => $requirementCctvData['cctv_del_block'][$index]?? null,
                    'cctv_del_area' => $requirementCctvData['cctv_del_area'][$index]?? null,
                    'cctv_del_city' => $requirementCctvData['cctv_del_city'][$index]?? null,
                    'cctv_ins_office' => $requirementCctvData['cctv_ins_office'][$index]?? null,
                    'cctv_ins_floor' => $requirementCctvData['cctv_ins_floor'][$index]?? null,
                    'cctv_ins_building' => $requirementCctvData['cctv_ins_building'][$index]?? null,
                    'cctv_ins_block' => $requirementCctvData['cctv_ins_block'][$index]?? null,
                    'cctv_ins_area' => $requirementCctvData['cctv_ins_area'][$index]?? null,
                    'cctv_ins_city' => $requirementCctvData['cctv_ins_city'][$index]?? null,
                    'cctv_ins_pin_loc' => $requirementCctvData['cctv_ins_pin_loc'][$index]?? null,
                    'cctv_maintenance_req' => $requirementCctvData['cctv_maintenance_req'][$index]?? null,
                    'cctv_maintenance_req_basis' => $requirementCctvData['cctv_maintenance_req_basis'][$index]?? null,
                    'cctv_notes' => $requirementCctvData['cctv_notes'][$index]?? null,
                ];

                $requirementCctvcheckboxFields = ['cctv_del_loc', 'cctv_ins_loc'];

                foreach ($requirementCctvcheckboxFields as $field) {
                    $requirementCctvData[$field] = $request->has($field) ? true : false;
                }

                $requirementCctvFields = [
                    'cctv_del_photo_building', 'cctv_ins_photo_building' , 'cctv_attachments'
                ];

                foreach ($requirementCctvFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementCctvDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementCctvDataArray[] = $requirementCctvDataRow;
            }

            $requirement->requirementcctv()->createMany($requirementCctvDataArray);

            //Attendance Machine
            $requirementAttendanceData = $request->only([
                'attendance_category','attendance_rate','attendance_specifications',
                'attendance_notes'
            ]);

            $requirementAttendanceDataArray = [];
            foreach ($this->iterableInput($requirementAttendanceData['attendance_category'] ?? null) as $index => $attendanceCategory) {
                $requirementAttendanceDataRow = [
                    'attendance_category' => $attendanceCategory?? null,
                    'attendance_rate' => $requirementAttendanceData['attendance_rate'][$index]?? null,
                    'attendance_specifications' => $requirementAttendanceData['attendance_specifications'][$index]?? null,
                    'attendance_notes' => $requirementAttendanceData['attendance_notes'][$index]?? null,
                ];

                $requirementAttendanceFields = [
                    'attendance_sheet', 'attendance_attachment'
                ];

                foreach ($requirementAttendanceFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementAttendanceDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementAttendanceDataArray[] = $requirementAttendanceDataRow;
            }

            $requirement->requirementattendance()->createMany($requirementAttendanceDataArray);

            //Web Survillence
            $requirementWebData = $request->only([
                'web_category','web_date','web_sub_date',
                'web_notes'
            ]);

            $requirementWebDataArray = [];
            foreach ($this->iterableInput($requirementWebData['web_category'] ?? null) as $index => $webCategory) {
                $requirementWebDataRow = [
                    'web_category' => $webCategory?? null,
                    'web_date' => $requirementWebData['web_date'][$index]?? null,
                    'web_sub_date' => $requirementWebData['web_sub_date'][$index]?? null,
                    'web_notes' => $requirementWebData['web_notes'][$index]?? null,
                ];

                $requirementWebFields = [
                    'web_scope', 'web_attachments'
                ];

                foreach ($requirementWebFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementWebDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementWebDataArray[] = $requirementWebDataRow;
            }

            $requirement->requirementweb()->createMany($requirementWebDataArray);

            //Alarm System
            $requirementAlarmData = $request->only([
                'alarm_category','alarm_equipment','alarm_voltage', 'alarm_ampere', 'alarm_article_no',
                'alarm_model' , 'alarm_year' , 'alarm_expiry' , 'alarm_warranty' , 'alarm_color' ,
                'alarm_quantity' , 'alarm_ins' , 'alarm_cost' ,'alarm_charges' , 'alarm_ins_cost' ,
                'alarm_length' , 'alarm_width' , 'alarm_height' , 'alarm_thickness' , 'alarm_diameter',
                'alarm_ins_smoke' , 'alarm_ins_cost_smoke' , 'alarm_internal_shifting' ,'alarm_internal_shifting_charges' ,
                'alarm_reinstall' ,'alarm_reinstall_charges' ,'alarm_qrf' ,'alarm_qrf_monthly_charges' ,
                'alarm_qrf_yearly_charges' ,'alarm_police_req' ,'alarm_police_monthly_charges' ,
                'alarm_police_yearly_charges' , 'alarm_visit_charges' , 'alarm_visit_city' ,'alarm_notes'
            ]);

            $requirementAlarmDataArray = [];
            foreach ($this->iterableInput($requirementAlarmData['alarm_category'] ?? null) as $index => $alarmCategory) {
                $requirementAlarmDataRow = [
                    'alarm_category' => $alarmCategory?? null,
                    'alarm_equipment' => $requirementAlarmData['alarm_equipment'][$index]?? null,
                    'alarm_voltage' => $requirementAlarmData['alarm_voltage'][$index]?? null,
                    'alarm_ampere' => $requirementAlarmData['alarm_ampere'][$index]?? null,
                    'alarm_article_no' => $requirementAlarmData['alarm_article_no'][$index]?? null,
                    'alarm_model' => $requirementAlarmData['alarm_model'][$index]?? null,
                    'alarm_year' => $requirementAlarmData['alarm_year'][$index]?? null,
                    'alarm_expiry' => $requirementAlarmData['alarm_expiry'][$index]?? null,
                    'alarm_warranty' => $requirementAlarmData['alarm_warranty'][$index]?? null,
                    'alarm_color' => $requirementAlarmData['alarm_color'][$index]?? null,
                    'alarm_quantity' => $requirementAlarmData['alarm_quantity'][$index]?? null,
                    'alarm_ins' => $requirementAlarmData['alarm_ins'][$index]?? null,
                    'alarm_cost' => $requirementAlarmData['alarm_cost'][$index]?? null,
                    'alarm_charges' => $requirementAlarmData['alarm_charges'][$index]?? null,
                    'alarm_ins_cost' => $requirementAlarmData['alarm_ins_cost'][$index]?? null,
                    'alarm_length' => $requirementAlarmData['alarm_length'][$index]?? null,
                    'alarm_width' => $requirementAlarmData['alarm_width'][$index]?? null,
                    'alarm_height' => $requirementAlarmData['alarm_height'][$index]?? null,
                    'alarm_thickness' => $requirementAlarmData['alarm_thickness'][$index]?? null,
                    'alarm_diameter' => $requirementAlarmData['alarm_diameter'][$index]?? null,
                    'alarm_ins_smoke' => $requirementAlarmData['alarm_ins_smoke'][$index]?? null,
                    'alarm_ins_cost_smoke' => $requirementAlarmData['alarm_ins_cost_smoke'][$index]?? null,
                    'alarm_internal_shifting' => $requirementAlarmData['alarm_internal_shifting'][$index]?? null,
                    'alarm_internal_shifting_charges' => $requirementAlarmData['alarm_internal_shifting_charges'][$index]?? null,
                    'alarm_reinstall' => $requirementAlarmData['alarm_reinstall'][$index]?? null,
                    'alarm_reinstall_charges' => $requirementAlarmData['alarm_reinstall_charges'][$index]?? null,
                    'alarm_qrf' => $requirementAlarmData['alarm_qrf'][$index]?? null,
                    'alarm_qrf_monthly_charges' => $requirementAlarmData['alarm_qrf_monthly_charges'][$index]?? null,
                    'alarm_qrf_yearly_charges' => $requirementAlarmData['alarm_qrf_yearly_charges'][$index]?? null,
                    'alarm_police_req' => $requirementAlarmData['alarm_police_req'][$index]?? null,
                    'alarm_police_monthly_charges' => $requirementAlarmData['alarm_police_monthly_charges'][$index]?? null,
                    'alarm_police_yearly_charges' => $requirementAlarmData['alarm_police_yearly_charges'][$index]?? null,
                    'alarm_visit_charges' => $requirementAlarmData['alarm_visit_charges'][$index]?? null,
                    'alarm_visit_city' => $requirementAlarmData['alarm_visit_city'][$index]?? null,
                    'alarm_notes' => $requirementAlarmData['alarm_notes'][$index]?? null,
                ];

                $requirementAlarmFields = [
                    'alarm_scope', 'alarm_drawings' , 'alarm_pictures' , 'alarm_attachments'
                ];

                foreach ($requirementAlarmFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/requirements'), $file_name);
                        $requirementAlarmDataRow[$field] = 'uploads/requirements/' . $file_name;
                    }
                }

                $requirementAlarmDataArray[] = $requirementAlarmDataRow;
            }

            $requirement->requirementalarm()->createMany($requirementAlarmDataArray);

            //With Complaines- Shown WHT
            $requirementCshownData = $request->only([
                'wc_sw_category','wc_sw_social_check','wc_sw_weapon', 'wc_sw_monthly_rate',
                'wc_sw_total_monthly_rate' , 'wc_sw_salary' , 'wc_sw_group' , 'wc_sw_training_cost',    'alarm_quantity' , 'alarm_ins' , 'alarm_cost' ,'alarm_charges' , 'alarm_ins_cost' ,'wc_sw_cur_min_wg_re', 'wc_sw_app_gst' , 'wc_sw_monthly_gst' , 'wc_sw_rel_allowance' , 'wc_sw_eobi' , 'wc_sw_uni_cost' , 'wc_sw_app_wht' , 'wc_sw_wht' , 'wc_sw_admin_cost','wc_sw_total_monthly_rate_without_tax','wc_sw_grandTotal', 'wc_sw_region','wc_sw_quantity','wc_sw_date'
            ]);

            $requirementCshownDataArray = [];
            foreach ($this->iterableInput($requirementCshownData['wc_sw_category'] ?? null) as $index => $wcSwCategory) {
                $requirementCshownDataRow = [
                    'wc_sw_category' => $wcSwCategory?? null,
                    'wc_sw_social_check' => $requirementCshownData['wc_sw_social_check'][$index]?? null,
                    'wc_sw_weapon' => $requirementCshownData['wc_sw_weapon'][$index]?? null,
                    'wc_sw_monthly_rate' => $requirementCshownData['wc_sw_monthly_rate'][$index]?? null,
                    'wc_sw_total_monthly_rate' => $requirementCshownData['wc_sw_total_monthly_rate'][$index]?? null,
                    'wc_sw_salary' => $requirementCshownData['wc_sw_salary'][$index]?? null,
                    'wc_sw_group' => $requirementCshownData['wc_sw_group'][$index]?? null,
                    'wc_sw_training_cost' => $requirementCshownData['wc_sw_training_cost'][$index]?? null,
                    'wc_sw_app_gst' => $requirementCshownData['wc_sw_app_gst'][$index]?? null,
                    'wc_sw_monthly_gst' => $requirementCshownData['wc_sw_monthly_gst'][$index]?? null,
                    'wc_sw_rel_allowance' => $requirementCshownData['wc_sw_rel_allowance'][$index]?? null,
                    'wc_sw_eobi' => $requirementCshownData['wc_sw_eobi'][$index]?? null,
                    'wc_sw_uni_cost' => $requirementCshownData['wc_sw_uni_cost'][$index]?? null,
                    'wc_sw_app_wht' => $requirementCshownData['wc_sw_app_wht'][$index]?? null,
                    'wc_sw_wht' => $requirementCshownData['wc_sw_wht'][$index]?? null,
                    'wc_sw_admin_cost' => $requirementCshownData['wc_sw_admin_cost'][$index]?? null,
                    'wc_sw_cur_min_wg_re' => $requirementCshownData['wc_sw_cur_min_wg_re'][$index]?? null,
                    'wc_sw_total_monthly_rate_without_tax' => $requirementCshownData['wc_sw_total_monthly_rate_without_tax'][$index]?? null,
                    'wc_sw_grandTotal' => $requirementCshownData['wc_sw_grandTotal'][$index]?? null,
                    'wc_sw_region' => $requirementCshownData['wc_sw_region'][$index]?? null,
                    'wc_sw_quantity' => $requirementCshownData['wc_sw_quantity'][$index]?? null,
                    'wc_sw_date' => $requirementCshownData['wc_sw_date'][$index]?? null,
                ];
                $requirementCshownDataArray[] = $requirementCshownDataRow;
            }

            $requirement->complainesshownwht()->createMany($requirementCshownDataArray);

            //With Complaines- Hidden WHT
            $requirementCohiddenData = $request->only([
                'wc_hw_category','wc_hw_social','wc_hw_weapon', 'wc_hw_monthly_rate',
                'wc_hw_total_monthly_rate_with_tax' , 'wc_hw_wht' , 'wc_hw_salary' , 'wc_hw_group',
                'wc_hw_training_cost' , 'wc_hw_app_gst' , 'wc_hw_gst' , 'wc_hw_admin_cost' ,
                'wc_hw_rel_allowance' , 'wc_hw_eobi' , 'wc_hw_uni_cost' , 'wc_hw_hidden_admin_cost',
                'wc_hw_app_wht_per' , 'wc_hw_total_admin_cost','wc_hw_res_region','wc_hw_total_quantity','wc_hw_total_grand','wc_hw_date','wc_hw_total_monthly_rate_withouttax'
            ]);

            $requirementCohiddenDataArray = [];
            foreach ($this->iterableInput($requirementCohiddenData['wc_hw_category'] ?? null) as $index => $wcHwCategory) {
                $requirementCohiddenDataRow = [
                    'wc_hw_category' => $wcHwCategory?? null,
                    'wc_hw_social' => $requirementCohiddenData['wc_hw_social'][$index]?? null,
                    'wc_hw_weapon' => $requirementCohiddenData['wc_hw_weapon'][$index]?? null,
                    'wc_hw_monthly_rate' => $requirementCohiddenData['wc_hw_monthly_rate'][$index]?? null,
                    'wc_hw_total_monthly_rate_with_tax' => $requirementCohiddenData['wc_hw_total_monthly_rate_with_tax'][$index]?? null,
                    'wc_hw_total_monthly_rate_withouttax' => $requirementCohiddenData['wc_hw_total_monthly_rate_withouttax'][$index]?? null,
                    'wc_hw_wht' => $requirementCohiddenData['wc_hw_wht'][$index]?? null,
                    'wc_hw_salary' => $requirementCohiddenData['wc_hw_salary'][$index]?? null,
                    'wc_hw_group' => $requirementCohiddenData['wc_hw_group'][$index]?? null,
                    'wc_hw_training_cost' => $requirementCohiddenData['wc_hw_training_cost'][$index]?? null,
                    'wc_hw_app_gst' => $requirementCohiddenData['wc_hw_app_gst'][$index]?? null,
                    'wc_hw_gst' => $requirementCohiddenData['wc_hw_gst'][$index]?? null,
                    'wc_hw_admin_cost' => $requirementCohiddenData['wc_hw_admin_cost'][$index]?? null,
                    'wc_hw_rel_allowance' => $requirementCohiddenData['wc_hw_rel_allowance'][$index]?? null,
                    'wc_hw_eobi' => $requirementCohiddenData['wc_hw_eobi'][$index]?? null,
                    'wc_hw_uni_cost' => $requirementCohiddenData['wc_hw_uni_cost'][$index]?? null,
                    'wc_hw_hidden_admin_cost' => $requirementCohiddenData['wc_hw_hidden_admin_cost'][$index]?? null,
                    'wc_hw_app_wht_per' => $requirementCohiddenData['wc_hw_app_wht_per'][$index]?? null,
                    'wc_hw_total_admin_cost' => $requirementCohiddenData['wc_hw_total_admin_cost'][$index]?? null,
                    'wc_hw_res_region' => $requirementCohiddenData['wc_hw_res_region'][$index]?? null,
                    'wc_hw_total_quantity' => $requirementCohiddenData['wc_hw_total_quantity'][$index]?? null,
                    'wc_hw_total_grand' => $requirementCohiddenData['wc_hw_total_grand'][$index]?? null,
                    'wc_hw_date' => $requirementCohiddenData['wc_hw_date'][$index]?? null,
                ];


                $requirementCohiddenDataArray[] = $requirementCohiddenDataRow;
            }

            $requirement->complaineshiddenwht()->createMany($requirementCohiddenDataArray);


            //Lump Sum- Shown WHT
            $requirementLshownData = $request->only([
                'ls_sw_category','ls_sw_social','ls_sw_weapon_cost', 'ls_sw_monthly_rate',
                'ls_sw_total_monthly_rate' , 'ls_sw_salary' , 'ls_sw_group_life' , 'ls_sw_training_cost',                'alarm_quantity' , 'alarm_ins' , 'alarm_cost' ,'alarm_charges' , 'alarm_ins_cost' ,
                'ls_sw_app_gst' , 'ls_sw_gst' , 'ls_sw_eobi' , 'ls_sw_uni_cost' ,
                'ls_sw_admin_cost' , 'ls_sw_app_wht' , 'ls_sw_wht','ls_sw_min_wage_region','ls_sw_total_monthly_rate_without_tax','ls_sw_quantity','ls_sw_grandtotal','ls_sw_date'
            ]);

            $requirementLshownDataArray = [];
            foreach ($this->iterableInput($requirementLshownData['ls_sw_category'] ?? null) as $index => $lsSwCategory) {
                $requirementLshownDataRow = [
                    'ls_sw_category' => $lsSwCategory?? null,
                    'ls_sw_social' => $requirementLshownData['ls_sw_social'][$index]?? null,
                    'ls_sw_weapon_cost' => $requirementLshownData['ls_sw_weapon_cost'][$index]?? null,
                    'ls_sw_monthly_rate' => $requirementLshownData['ls_sw_monthly_rate'][$index]?? null,
                    'ls_sw_total_monthly_rate' => $requirementLshownData['ls_sw_total_monthly_rate'][$index]?? null,
                    'ls_sw_salary' => $requirementLshownData['ls_sw_salary'][$index]?? null,
                    'ls_sw_group_life' => $requirementLshownData['ls_sw_group_life'][$index]?? null,
                    'ls_sw_training_cost' => $requirementLshownData['ls_sw_training_cost'][$index]?? null,
                    'ls_sw_app_gst' => $requirementLshownData['ls_sw_app_gst'][$index]?? null,
                    'ls_sw_gst' => $requirementLshownData['ls_sw_gst'][$index]?? null,
                    'ls_sw_eobi' => $requirementLshownData['ls_sw_eobi'][$index]?? null,
                    'ls_sw_uni_cost' => $requirementLshownData['ls_sw_uni_cost'][$index]?? null,
                    'ls_sw_admin_cost' => $requirementLshownData['ls_sw_admin_cost'][$index]?? null,
                    'ls_sw_app_wht' => $requirementLshownData['ls_sw_app_wht'][$index]?? null,
                    'ls_sw_wht' => $requirementLshownData['ls_sw_wht'][$index]?? null,
                    'ls_sw_min_wage_region' => $requirementLshownData['ls_sw_min_wage_region'][$index]?? null,
                    'ls_sw_total_monthly_rate_without_tax' => $requirementLshownData['ls_sw_total_monthly_rate_without_tax'][$index]?? null,
                    'ls_sw_quantity' => $requirementLshownData['ls_sw_quantity'][$index]?? null,
                    'ls_sw_grandtotal' => $requirementLshownData['ls_sw_grandtotal'][$index]?? null,
                    'ls_sw_date' => $requirementLshownData['ls_sw_date'][$index]?? null,
                ];


                $requirementLshownDataArray[] = $requirementLshownDataRow;
            }

            $requirement->lumpsumshownwht()->createMany($requirementLshownDataArray);

            //Lump Sum- Hidden WHT
            $requirementLhiddenData = $request->only([
                'ls_hw_category','ls_hw_uni_cost','ls_hw_weapon_cost', 'ls_hw_monthly_rate',
                'ls_hw_total_monthly_rate' , 'ls_hw_salary' , 'ls_hw_social' , 'ls_hw_training_cost',  'ls_hw_quantity',              'alarm_quantity' , 'alarm_ins' , 'alarm_cost' ,'alarm_charges' , 'alarm_ins_cost' ,
                'ls_hw_app_gst' , 'ls_hw_gst' , 'ls_hw_admin_cost' , 'ls_hw_eobi' ,
                'ls_hw_group_life' , 'ls_hw_hidden_admin_cost' , 'ls_hw_app_wht_per' , 'ls_hw_wht',
                'ls_hw_total_admin_cost','ls_hw_current_min_wage_region','ls_hw_total_monthly_rate_witout_tax','ls_hw_grand_total'
            ]);

            $requirementLhiddenDataArray = [];
            foreach ($this->iterableInput($requirementLhiddenData['ls_hw_category'] ?? null) as $index => $lsHwCategory) {
                $requirementLhiddenDataRow = [
                    'ls_hw_category' => $lsHwCategory?? null,
                    'ls_hw_uni_cost' => $requirementLhiddenData['ls_hw_uni_cost'][$index]?? null,
                    'ls_hw_weapon_cost' => $requirementLhiddenData['ls_hw_weapon_cost'][$index]?? null,
                    'ls_hw_monthly_rate' => $requirementLhiddenData['ls_hw_monthly_rate'][$index]?? null,
                    'ls_hw_total_monthly_rate' => $requirementLhiddenData['ls_hw_total_monthly_rate'][$index]?? null,
                    'ls_hw_salary' => $requirementLhiddenData['ls_hw_salary'][$index]?? null,
                    'ls_hw_social' => $requirementLhiddenData['ls_hw_social'][$index]?? null,
                    'ls_hw_training_cost' => $requirementLhiddenData['ls_hw_training_cost'][$index]?? null,
                    'ls_hw_app_gst' => $requirementLhiddenData['ls_hw_app_gst'][$index]?? null,
                    'ls_hw_gst' => $requirementLhiddenData['ls_hw_gst'][$index],
                    'ls_hw_admin_cost' => $requirementLhiddenData['ls_hw_admin_cost'][$index]?? null,
                    'ls_hw_eobi' => $requirementLhiddenData['ls_hw_eobi'][$index]?? null,
                    'ls_hw_group_life' => $requirementLhiddenData['ls_hw_group_life'][$index]?? null,
                    'ls_hw_hidden_admin_cost' => $requirementLhiddenData['ls_hw_hidden_admin_cost'][$index]?? null,
                    'ls_hw_app_wht_per' => $requirementLhiddenData['ls_hw_app_wht_per'][$index]?? null,
                    'ls_hw_wht' => $requirementLhiddenData['ls_hw_wht'][$index]?? null,
                    'ls_hw_total_admin_cost' => $requirementLhiddenData['ls_hw_total_admin_cost'][$index]?? null,
                    'ls_hw_current_min_wage_region' => $requirementLhiddenData['ls_hw_current_min_wage_region'][$index]?? null,
                    'ls_hw_total_monthly_rate_witout_tax' => $requirementLhiddenData['ls_hw_total_monthly_rate_witout_tax'][$index]?? null,
                    'ls_hw_grand_total' => $requirementLhiddenData['ls_hw_grand_total'][$index]?? null,
                ];


                $requirementLhiddenDataArray[] = $requirementLhiddenDataRow;
            }

            $requirement->lumpsumhiddenwht()->createMany($requirementLhiddenDataArray);

            $requirementreverseworkingData = $request->only([
                'reverseCategory','reverseapplicablepercentageGst','reverseAfterWht', 'reverseSalary',
                'reverseTotalProfit' , 'reverseapplicablewhtpercent' , 'reverseRate' , 'reverseGst', 'reverseProfit' , 'reverseWht' , 'reverseAfterGst' ,'reverseQuantity'
            ]);

            $requirementreverseworkingDataArray = [];
            foreach ($this->iterableInput($requirementreverseworkingData['reverseCategory'] ?? null) as $index => $reverseworkingCategory) {
                $requirementreverseworkingDataRow = [
                    'reverseCategory' => $reverseworkingCategory?? null,
                    'reverseapplicablepercentageGst' => $requirementreverseworkingData['reverseapplicablepercentageGst'][$index]?? null,
                    'reverseAfterWht' => $requirementreverseworkingData['reverseAfterWht'][$index]?? null,
                    'reverseSalary' => $requirementreverseworkingData['reverseSalary'][$index]?? null,
                    'reverseTotalProfit' => $requirementreverseworkingData['reverseTotalProfit'][$index]?? null,
                    'reverseapplicablewhtpercent' => $requirementreverseworkingData['reverseapplicablewhtpercent'][$index]?? null,
                    'reverseRate' => $requirementreverseworkingData['reverseRate'][$index]?? null,
                    'reverseGst' => $requirementreverseworkingData['reverseGst'][$index]?? null,
                    'reverseProfit' => $requirementreverseworkingData['reverseProfit'][$index]?? null,
                    'reverseWht' => $requirementreverseworkingData['reverseWht'][$index]?? null,
                    'reverseAfterGst' => $requirementreverseworkingData['reverseAfterGst'][$index]?? null,
                    'reverseQuantity' => $requirementreverseworkingData['reverseQuantity'][$index]?? null,
                ];


                $requirementreverseworkingDataArray[] = $requirementreverseworkingDataRow;
            }
            $requirement->complainwithreverseworking()->createMany($requirementreverseworkingDataArray);

            DB::commit();

            return redirect()->back()->with('success', 'Requirement Update successfully.');
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('An error occurred while saving Requirements data: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while saving data.');
        }
    }
    public function deleterequirements($id)
    {
        $requirements = Requirement::find($id);
         $requirements->delete();
         return redirect()->back()->with('success','requirments deleted successfully');
    }
    //Add more Buttons Started :-

    // First Category Option

    public function salescategory()
    {
         $salescategory = Salescategory::all();
         return view('Sales.salescategories', compact('salescategory'));
    }

    public function postsalescategory(Request $request)
    {
         $salescategory = new Salescategory();
         $salescategory->salesCategoryName = $request->input('salesCategoryName');
         $salescategory->save();
         return redirect()->back();
    }

    public function destroysalescategory($id)
    {
         $salescategory = Salescategory::find($id);

         if ($salescategory) {
             $salescategory->delete();
             return redirect()->back()->with('success', 'Category deleted successfully');
         } else {
             return redirect()->back()->with('error', 'Category not found.');
         }
    }

    //Second Option Sales RHQ

    public function salesrhq()
     {
         $salesrhq = Salesrhq::all();
         return view('Sales.salesrhq', compact('salesrhq'));
     }

     public function postsalesrhq(Request $request)
     {
         $salesrhq = new Salesrhq();
         $salesrhq->salesRhq = $request->input('salesRhq');
         $salesrhq->save();
         return redirect()->back();
     }

     public function destroysalesrhq($id)
     {
         $salesrhq = SalesRhq::find($id);

         if ($salesrhq) {
             $salesrhq->delete();
             return redirect()->back()->with('success', 'RHQ deleted successfully');
         } else {
             return redirect()->back()->with('error', 'RHQ not found.');
         }
     }


    //Third Option Sales List of Giveaways

    public function salesgive()
     {
         $salesgive = Salesgive::all();
         return view('Sales.salesgive', compact('salesgive'));
     }

     public function postsalesgive(Request $request)
     {
         $salesgive = new Salesgive();
         $salesgive->salesGive = $request->input('salesGive');
         $salesgive->save();
         return redirect()->back();
     }

     public function destroysalesgive($id)
     {
         $salesgive = Salesgive::find($id);

         if ($salesgive) {
             $salesgive->delete();
             return redirect()->back()->with('success', 'Giveaway deleted successfully');
         } else {
             return redirect()->back()->with('error', 'Giveaway not found.');
         }
     }

    //Forth Option Sales Types of Leads

    public function saleslead()
     {
         $saleslead = Saleslead::all();
         return view('Sales.saleslead', compact('saleslead'));
     }

     public function postsaleslead(Request $request)
     {
         $saleslead = new Saleslead();
         $saleslead->salesLead = $request->input('salesLead');
         $saleslead->save();
         return redirect()->back();
     }

     public function destroysaleslead($id)
     {
         $saleslead = Saleslead::find($id);

         if ($saleslead) {
             $saleslead->delete();
             return redirect()->back()->with('success', 'Giveaway deleted successfully');
         } else {
             return redirect()->back()->with('error', 'Giveaway not found.');
         }
     }

      //Fifth Option Customer Requirements Guards

    public function salesguard()
     {
         $salesguard = Salesguard::all();
         return view('Sales.salesguard', compact('salesguard'));
     }

     public function postsalesguard(Request $request)
     {
         $salesguard = new Salesguard();
         $salesguard->salesGuard = $request->input('salesGuard');
         $salesguard->save();
         return redirect()->back();
     }

     public function destroysalesguard($id)
     {
         $salesguard = Salesguard::find($id);

         if ($salesguard) {
             $salesguard->delete();
             return redirect()->back()->with('success', 'Giveaway deleted successfully');
         } else {
             return redirect()->back()->with('error', 'Giveaway not found.');
         }
     }

    //Fifth Option Customer Requirements Guards

    public function salesvehicle()
    {
        $salesvehicle = Salesvehicle::all();
        return view('Sales.salesvehicle', compact('salesvehicle'));
    }

    public function postsalesvehicle(Request $request)
    {
        $salesvehicle = new Salesvehicle();
        $salesvehicle->salesVehicle = $request->input('salesVehicle');
        $salesvehicle->save();
        return redirect()->back();
    }

    public function destroysalesvehicle($id)
    {
         $salesvehicle = Salesvehicle::find($id);

         if ($salesvehicle) {
             $salesvehicle->delete();
             return redirect()->back()->with('success', 'Vehicle deleted successfully');
         } else {
             return redirect()->back()->with('error', 'Vehicle not found.');
         }
    }

    //Canine Requirements

    public function salescanine()
    {
        $salescanine = Salescanine::all();
        return view('Sales.salescanine', compact('salescanine'));
    }

    public function postsalescanine(Request $request)
    {
        $salescanine = new Salescanine();
        $salescanine->salesCanine = $request->input('salesCanine');
        $salescanine->save();
        return redirect()->back();
    }

    public function destroysalescanine($id)
    {
         $salescanine = Salescanine::find($id);

         if ($salescanine) {
             $salescanine->delete();
             return redirect()->back()->with('success', 'Canine deleted successfully');
         } else {
             return redirect()->back()->with('error', 'Canine not found.');
         }
    }

    //Security Consultancy

    public function salesconsultancy()
    {
        $salesconsultancy = Salesconsultancy::all();
        return view('Sales.salesconsultancy', compact('salesconsultancy'));
    }

    public function postsalesconsultancy(Request $request)
    {
        $salesconsultancy = new Salesconsultancy();
        $salesconsultancy->salesConsultancy = $request->input('salesConsultancy');
        $salesconsultancy->save();
        return redirect()->back();
    }

    public function destroysalesconsultancy($id)
    {
         $salesconsultancy = Salesconsultancy::find($id);

         if ($salesconsultancy) {
             $salesconsultancy->delete();
             return redirect()->back()->with('success', 'Consultancy deleted successfully');
         } else {
             return redirect()->back()->with('error', 'Consultancy not found.');
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

                $message->attach($pdf, ['as' => 'sales_information.pdf'])
                    ->text($body);
            });

            return response()->json(['message' => 'Email sent successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to send email.'], 500);
        }
    }

    private function normalizeRequirementPayload(array $payload): array
    {
        foreach ($payload as $key => $value) {
            $payload[$key] = $this->normalizeRequirementValue($value);
        }

        return $payload;
    }

    private function normalizeRequirementValue($value)
    {
        if (!is_array($value)) {
            return $value;
        }

        $flattened = [];

        array_walk_recursive($value, function ($item) use (&$flattened) {
            if ($item !== null && $item !== '') {
                $flattened[] = $item;
            }
        });

        return $flattened ? implode(', ', $flattened) : null;
    }

    private function iterableInput($value): array
    {
        return is_array($value) ? $value : [];
    }



}
