<?php

namespace App\Http\Controllers;

use App\Models\Regulator;
use App\Models\RegOperatingConsultant;
use App\Models\RegOperatingIssuing;
use App\Models\RegOperatingRenewals;
use App\Models\RegWeaponConsultant;
use App\Models\RegWeaponIssuing;
use App\Models\RegWeaponLegal;
use App\Models\RegWeaponRenewals;
use App\Models\RegWeaponLicense;
use App\Models\RegOtherConsultant;
use App\Models\RegOtherIssuing;
use App\Models\RegOtherRenewals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegulatoryController extends Controller
{
    
    public function regulator_delete($id){
        $delete_requelator = Regulator::find($id);
        $delete_requelator->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }
    public function regulator()
    {
        $regulatorData = Regulator::all();
         $activeregulatorData = Regulator::where('regulator_activation',1)->get();
          $inactiveregulatorData = Regulator::where('regulator_activation',0)->get();
        return view('regulatory.regulator' , compact('regulatorData','activeregulatorData','inactiveregulatorData'));
    }

    public function postregulator()
    {
        return view('regulatory.postregulator');
    }



    public function submit_regulator(Request $request)
    {
        DB::beginTransaction();
        try {
            // Create HRM record
            $regulatorData = $request->except('_token');

            // Define the HRM image fields
            $regulatorImageFields = [
                'license_attach', 'attachments', 'oper_home_photo', 'oper_home_attach', 'oper_ra_letter', 'oper_ra_doc',
                'oper_ra_attach', 'oper_rc_letter', 'oper_rc_doc', 'oper_rc_attach', 'oper_rap_letter', 'oper_rap_doc',
                'oper_rap_attach', 'oper_laws_attach', 'wep_home_photo', 'wep_home_attach', 'wep_ra_letter', 'wep_ra_doc',
                'wep_ra_attach', 'wep_rc_letter', 'wep_rc_docs', 'wep_rc_attach', 'wep_rap_letter', 'wep_rap_docs',
                'wep_rap_attach', 'wep_laws_attach', 'any_a_photo', 'any_a_attach', 'any_ra_letter', 'any_ra_docs',
                'any_ra_attach', 'any_rc_letter', 'any_rc_docs', 'any_rc_attach', 'any_rap_letter', 'any_rap_docs',
                'any_rap_attach', 'any_laws_attach',
            ];

            foreach ($regulatorImageFields as $field) {
                if ($request->hasFile($field)) {
                    $files = $request->file($field);
                    $filePaths = [];
                    foreach ($files as $file) {
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $filePaths[] = 'uploads/images/' . $file_name;
                    }
                    $regulatorData[$field] = implode(',', $filePaths); // Convert array to string
                } else {
                    $regulatorData[$field] = ''; // Set empty string if no files are present
                }
            }

            if ($request->has('regulator_activation')) {
                $regulatorData['regulator_activation'] = $request->input('regulator_activation');
            }

            $regulator = Regulator::create($regulatorData);

            //Regulatory Operating Consultants

            $operatingconsultantData = $request->only([
                'oper_name', 'oper_desig', 'oper_org', 'oper_cell', 'oper_email', 'oper_fee',
                'oper_bank', 'oper_account', 'oper_acc_no', 'oper_notes',
                'oper_office', 'oper_build', 'oper_block', 'oper_area', 'oper_city',
                'oper_a_email', 'oper_web', 'oper_pin', 'oper_gps', 'oper_ex_notes',
            ]);

            $operatingconsultantDataArray = [];
            foreach ($operatingconsultantData['oper_name'] as $index => $operName) {
                $operatingconsultantDataRow = [
                    'oper_name' => $operName,
                    'oper_desig' => $operatingconsultantData['oper_desig'][$index],
                    'oper_org' => $operatingconsultantData['oper_org'][$index],
                    'oper_cell' => $operatingconsultantData['oper_cell'][$index],
                    'oper_email' => $operatingconsultantData['oper_email'][$index],
                    'oper_fee' => $operatingconsultantData['oper_fee'][$index],
                    'oper_bank' => $operatingconsultantData['oper_bank'][$index],
                    'oper_account' => $operatingconsultantData['oper_account'][$index],
                    'oper_acc_no' => $operatingconsultantData['oper_acc_no'][$index],
                    'oper_notes' => $operatingconsultantData['oper_notes'][$index],
                    'oper_office' => $operatingconsultantData['oper_office'][$index],
                    'oper_build' => $operatingconsultantData['oper_build'][$index],
                    'oper_block' => $operatingconsultantData['oper_block'][$index],
                    'oper_area' => $operatingconsultantData['oper_area'][$index],
                    'oper_city' => $operatingconsultantData['oper_city'][$index],
                    'oper_a_email' => $operatingconsultantData['oper_a_email'][$index],
                    'oper_web' => $operatingconsultantData['oper_web'][$index],
                    'oper_pin' => $operatingconsultantData['oper_pin'][$index],
                    'oper_gps' => $operatingconsultantData['oper_gps'][$index],
                    'oper_ex_notes' => $operatingconsultantData['oper_ex_notes'][$index],
                ];

                // Define the Guarantor image fields
                $operatingconsultantFields = [
                    'oper_front', 'oper_back', 'oper_fin', 'oper_attachments', 'oper_photo', 'oper_ex_attach',
                ];

                foreach ($operatingconsultantFields as $field) {
                    if ($request->hasFile($field)) {
                        $files = $request->file($field);
                        $filePaths = [];
                        foreach ($files as $file) {
                            $extension = $file->getClientOriginalExtension();
                            $file_name = time() . '_' . $file->getClientOriginalName();
                            $file->move(public_path('uploads/images'), $file_name);
                            $filePaths[] = 'uploads/images/' . $file_name;
                        }
                        $operatingconsultantDataRow[$field] = implode(',', $filePaths); // Convert array to string
                    } else {
                        $operatingconsultantDataRow[$field] = ''; // Set empty string if no files are present
                    }
                }


                $operatingconsultantArray[] = $operatingconsultantDataRow;
            }

            $regulator->operatingconsultants()->createMany($operatingconsultantArray);

            //Regulatory Operating Issuing Authority

            $operatingissuingData = $request->only([
                'oper_iss_co_name', 'oper_iss_co_desig', 'oper_iss_co_dept',
                'oper_iss_co_section', 'oper_iss_co_ptcl', 'oper_iss_co_cell',
                'oper_iss_co_email', 'oper_iss_co_web', 'oper_iss_co_notes',
            ]);

            $operatingissuingDataArray = [];
            foreach ($operatingissuingData['oper_iss_co_name'] as $index => $operisscoName) {
                $operatingissuingDataRow = [
                    'oper_iss_co_name' => $operisscoName,
                    'oper_iss_co_desig' => $operatingissuingData['oper_iss_co_desig'][$index],
                    'oper_iss_co_dept' => $operatingissuingData['oper_iss_co_dept'][$index],
                    'oper_iss_co_section' => $operatingissuingData['oper_iss_co_section'][$index],
                    'oper_iss_co_ptcl' => $operatingissuingData['oper_iss_co_ptcl'][$index],
                    'oper_iss_co_cell' => $operatingissuingData['oper_iss_co_cell'][$index],
                    'oper_iss_co_email' => $operatingissuingData['oper_iss_co_email'][$index],
                    'oper_iss_co_web' => $operatingissuingData['oper_iss_co_web'][$index],
                    'oper_iss_co_notes' => $operatingissuingData['oper_iss_co_notes'][$index],
                ];

                // Define the Guarantor image fields
                $operatingissuingFields = [
                    'oper_iss_co_front', 'oper_iss_co_back', 'oper_iss_co_attach',
                ];

                foreach ($operatingissuingFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $operatingissuingDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $operatingissuingArray[] = $operatingissuingDataRow;
            }

            $regulator->operatingissuings()->createMany($operatingissuingArray);

            //Regulatory Operating Renewals

            $operatingrenewalData = $request->only([
                'oper_fee_category', 'oper_finance_bank', 'oper_finance_cheque',
                'oper_finance_amount', 'oper_finance_notes', 'oper_finance_wb_name',
                'oper_finance_wb_id', 'oper_finance_wb_desig', 'oper_finance_wb_cell',
                'oper_finance_wb_email', 'oper_finance_wb_notes', 'oper_finance_fee',
                'oper_finance_fee_date', 'oper_finance_fee_bank', 'oper_finance_fee_ins',
                'oper_finance_fee_notes', 'oper_finance_db_name', 'oper_finance_db_id',
                'oper_finance_db_desig', 'oper_finance_db_cell', 'oper_finance_db_email',
                'oper_finance_db_notes',
            ]);

            $operatingrenewalDataArray = [];
            foreach ($operatingrenewalData['oper_fee_category'] as $index => $operfeeCategory) {
                $operatingrenewalDataRow = [
                    'oper_fee_category' => $operfeeCategory,
                    'oper_finance_bank' => $operatingrenewalData['oper_finance_bank'][$index],
                    'oper_finance_cheque' => $operatingrenewalData['oper_finance_cheque'][$index],
                    'oper_finance_amount' => $operatingrenewalData['oper_finance_amount'][$index],
                    'oper_finance_notes' => $operatingrenewalData['oper_finance_notes'][$index],
                    'oper_finance_wb_name' => $operatingrenewalData['oper_finance_wb_name'][$index],
                    'oper_finance_wb_id' => $operatingrenewalData['oper_finance_wb_id'][$index],
                    'oper_finance_wb_desig' => $operatingrenewalData['oper_finance_wb_desig'][$index],
                    'oper_finance_wb_cell' => $operatingrenewalData['oper_finance_wb_cell'][$index],
                    'oper_finance_wb_email' => $operatingrenewalData['oper_finance_wb_email'][$index],
                    'oper_finance_wb_notes' => $operatingrenewalData['oper_finance_wb_notes'][$index],
                    'oper_finance_fee' => $operatingrenewalData['oper_finance_fee'][$index],
                    'oper_finance_fee_date' => $operatingrenewalData['oper_finance_fee_date'][$index],
                    'oper_finance_fee_bank' => $operatingrenewalData['oper_finance_fee_bank'][$index],
                    'oper_finance_fee_ins' => $operatingrenewalData['oper_finance_fee_ins'][$index],
                    'oper_finance_fee_notes' => $operatingrenewalData['oper_finance_fee_notes'][$index],
                    'oper_finance_db_name' => $operatingrenewalData['oper_finance_db_name'][$index],
                    'oper_finance_db_id' => $operatingrenewalData['oper_finance_db_id'][$index],
                    'oper_finance_db_desig' => $operatingrenewalData['oper_finance_db_desig'][$index],
                    'oper_finance_db_cell' => $operatingrenewalData['oper_finance_db_cell'][$index],
                    'oper_finance_db_email' => $operatingrenewalData['oper_finance_db_email'][$index],
                    'oper_finance_db_notes' => $operatingrenewalData['oper_finance_db_notes'][$index],
                ];

                // Define the Guarantor image fields
                $operatingrenewalFields = [
                    'oper_finance_copy', 'oper_finance_attach', 'oper_finance_wb_attach', 'oper_finance_slip_attach',
                    'oper_finance_fee_attach', 'oper_finance_db_attach',
                ];

                foreach ($operatingrenewalFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $operatingrenewalDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $operatingrenewalArray[] = $operatingrenewalDataRow;
            }

            $regulator->operatingrenewals()->createMany($operatingrenewalArray);

            //Regulatory Weapon Consultants

            $weaponconsultantData = $request->only([
                'wep_name', 'wep_desig', 'wep_org', 'wep_cell', 'wep_email', 'wep_fee',
                'wep_bank', 'wep_acc', 'wep_acc_no', 'wep_fin', 'wep_notes',
                'wep_office', 'wep_build', 'wep_block', 'wep_area', 'wep_city',
                'wep_a_email', 'wep_web', 'wep_pin', 'wep_gps', 'wep_ex_notes',
            ]);

            $weaponconsultantDataArray = [];
            foreach ($weaponconsultantData['wep_name'] as $index => $wepName) {
                $weaponconsultantDataRow = [
                    'wep_name' => $wepName,
                    'wep_desig' => $weaponconsultantData['wep_desig'][$index],
                    'wep_org' => $weaponconsultantData['wep_org'][$index],
                    'wep_cell' => $weaponconsultantData['wep_cell'][$index],
                    'wep_email' => $weaponconsultantData['wep_email'][$index],
                    'wep_fee' => $weaponconsultantData['wep_fee'][$index],
                    'wep_bank' => $weaponconsultantData['wep_bank'][$index],
                    'wep_acc' => $weaponconsultantData['wep_acc'][$index],
                    'wep_acc_no' => $weaponconsultantData['wep_acc_no'][$index],
                    'wep_notes' => $weaponconsultantData['wep_notes'][$index],
                    'wep_office' => $weaponconsultantData['wep_office'][$index],
                    'wep_build' => $weaponconsultantData['wep_build'][$index],
                    'wep_block' => $weaponconsultantData['wep_block'][$index],
                    'wep_area' => $weaponconsultantData['wep_area'][$index],
                    'wep_city' => $weaponconsultantData['wep_city'][$index],
                    'wep_a_email' => $weaponconsultantData['wep_a_email'][$index],
                    'wep_web' => $weaponconsultantData['wep_web'][$index],
                    'wep_pin' => $weaponconsultantData['wep_pin'][$index],
                    'wep_gps' => $weaponconsultantData['wep_gps'][$index],
                    'wep_ex_notes' => $weaponconsultantData['wep_ex_notes'][$index],
                ];

                // Define the Guarantor image fields
                $weaponconsultantFields = [
                    'wep_front', 'wep_back', 'wep_fin', 'wep_attachments', 'wep_photo', 'wep_ex_attach',
                ];

                foreach ($weaponconsultantFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $weaponconsultantDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $weaponconsultantArray[] = $weaponconsultantDataRow;
            }

            $regulator->weaponconsultants()->createMany($weaponconsultantArray);

            //Regulatory Weapon Issuings

            $weaponissuingData = $request->only([
                'wep_iss_co_name', 'wep_iss_co_desig', 'wep_iss_co_dept', 'wep_iss_co_sec',
                'wep_iss_co_ptcl', 'wep_iss_co_cell', 'wep_iss_co_email', 'wep_iss_co_web',
                'wep_iss_co_notes', 'wep_p_co_name', 'wep_co_p_desig', 'wep_co_p_dept',
                'wep_co_p_sec', 'wep_co_p_ptcl', 'wep_co_p_cell', 'wep_co_p_email',
                'wep_co_p_web', 'wep_co_p_notes',
            ]);

            $weaponissuingDataArray = [];
            foreach ($weaponissuingData['wep_iss_co_name'] as $index => $wepisscoName) {
                $weaponissuingDataRow = [
                    'wep_iss_co_name' => $wepisscoName,
                    'wep_iss_co_desig' => $weaponissuingData['wep_iss_co_desig'][$index],
                    'wep_iss_co_dept' => $weaponissuingData['wep_iss_co_dept'][$index],
                    'wep_iss_co_sec' => $weaponissuingData['wep_iss_co_sec'][$index],
                    'wep_iss_co_ptcl' => $weaponissuingData['wep_iss_co_ptcl'][$index],
                    'wep_iss_co_cell' => $weaponissuingData['wep_iss_co_cell'][$index],
                    'wep_iss_co_email' => $weaponissuingData['wep_iss_co_email'][$index],
                    'wep_iss_co_web' => $weaponissuingData['wep_iss_co_web'][$index],
                    'wep_iss_co_notes' => $weaponissuingData['wep_iss_co_notes'][$index],
                    'wep_p_co_name' => $weaponissuingData['wep_p_co_name'][$index],
                    'wep_co_p_desig' => $weaponissuingData['wep_co_p_desig'][$index],
                    'wep_co_p_dept' => $weaponissuingData['wep_co_p_dept'][$index],
                    'wep_co_p_sec' => $weaponissuingData['wep_co_p_sec'][$index],
                    'wep_co_p_ptcl' => $weaponissuingData['wep_co_p_ptcl'][$index],
                    'wep_co_p_cell' => $weaponissuingData['wep_co_p_cell'][$index],
                    'wep_co_p_email' => $weaponissuingData['wep_co_p_email'][$index],
                    'wep_co_p_web' => $weaponissuingData['wep_co_p_web'][$index],
                    'wep_co_p_notes' => $weaponissuingData['wep_co_p_notes'][$index],
                ];

                // Define the Guarantor image fields
                $weaponissuingFields = [
                    'wep_iss_co_front', 'wep_iss_co_back', 'wep_iss_co_attach', 'wep_co_p_front', 'wep_co_p_back', 'wep_co_p_attach',
                ];

                foreach ($weaponissuingFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $weaponissuingDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $weaponissuingArray[] = $weaponissuingDataRow;
            }

            $regulator->weaponissuings()->createMany($weaponissuingArray);

            //Regulatory Weapon Renewals

            $weaponrenewalData = $request->only([
                'wep_fee_category', 'wep_finance_bank', 'wep_finance_cheque',
                'wep_finance_amount', 'wep_finance_notes', 'wep_finance_wb_name',
                'wep_finance_wb_id', 'wep_finance_wb_desig', 'wep_finance_wb_cell',
                'wep_finance_wb_email', 'wep_finance_wb_notes', 'wep_finance_fee',
                'wep_finance_fee_date', 'wep_finance_fee_bank', 'wep_finance_fee_ins',
                'wep_finance_fee_notes', 'wep_finance_db_name', 'wep_finance_db_id',
                'wep_finance_db_desig', 'wep_finance_db_cell', 'wep_finance_db_email',
                'wep_finance_db_notes',
            ]);

            $weaponrenewalDataArray = [];
            foreach ($weaponrenewalData['wep_fee_category'] as $index => $wepfeeCategory) {
                $weaponrenewalDataRow = [
                    'wep_fee_category' => $wepfeeCategory,
                    'wep_finance_bank' => $weaponrenewalData['wep_finance_bank'][$index],
                    'wep_finance_cheque' => $weaponrenewalData['wep_finance_cheque'][$index],
                    'wep_finance_amount' => $weaponrenewalData['wep_finance_amount'][$index],
                    'wep_finance_notes' => $weaponrenewalData['wep_finance_notes'][$index],
                    'wep_finance_wb_name' => $weaponrenewalData['wep_finance_wb_name'][$index],
                    'wep_finance_wb_id' => $weaponrenewalData['wep_finance_wb_id'][$index],
                    'wep_finance_wb_desig' => $weaponrenewalData['wep_finance_wb_desig'][$index],
                    'wep_finance_wb_cell' => $weaponrenewalData['wep_finance_wb_cell'][$index],
                    'wep_finance_wb_email' => $weaponrenewalData['wep_finance_wb_email'][$index],
                    'wep_finance_wb_notes' => $weaponrenewalData['wep_finance_wb_notes'][$index],
                    'wep_finance_fee' => $weaponrenewalData['wep_finance_fee'][$index],
                    'wep_finance_fee_date' => $weaponrenewalData['wep_finance_fee_date'][$index],
                    'wep_finance_fee_bank' => $weaponrenewalData['wep_finance_fee_bank'][$index],
                    'wep_finance_fee_ins' => $weaponrenewalData['wep_finance_fee_ins'][$index],
                    'wep_finance_fee_notes' => $weaponrenewalData['wep_finance_fee_notes'][$index],
                    'wep_finance_db_name' => $weaponrenewalData['wep_finance_db_name'][$index],
                    'wep_finance_db_id' => $weaponrenewalData['wep_finance_db_id'][$index],
                    'wep_finance_db_desig' => $weaponrenewalData['wep_finance_db_desig'][$index],
                    'wep_finance_db_cell' => $weaponrenewalData['wep_finance_db_cell'][$index],
                    'wep_finance_db_email' => $weaponrenewalData['wep_finance_db_email'][$index],
                    'wep_finance_db_notes' => $weaponrenewalData['wep_finance_db_notes'][$index],
                ];

                // Define the Guarantor image fields
                $weaponrenewalFields = [
                    'wep_finance_copy', 'wep_finance_attach', 'wep_finance_wb_attach', 'wep_finance_slip_attach',
                    'wep_finance_fee_attach', 'wep_finance_db_attach',
                ];

                foreach ($weaponrenewalFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $weaponrenewalDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $weaponrenewalArray[] = $weaponrenewalDataRow;
            }

            $regulator->weaponrenewals()->createMany($weaponrenewalArray);

            //Regulatory Weapon Legal Fees

            $weaponlegalData = $request->only([
                'wep_legal_bank', 'wep_legal_cheque', 'wep_legal_amount', 'wep_legal_notes',
                'wep_legal_wb_name', 'wep_legal_wb_id', 'wep_legal_wb_desig', 'wep_legal_wb_cell',
                'wep_legal_wb_email', 'wep_legal_wb_notes', 'wep_legal_fee_a', 'wep_legal_fee_b',
                'wep_legal_fee_t', 'wep_legal_fee_date', 'wep_legal_fee_bank', 'wep_legal_fee_ins',
                'wep_legal_fee_notes', 'wep_legal_db_name', 'wep_legal_db_id', 'wep_legal_db_desig',
                'wep_legal_db_cell', 'wep_legal_db_email', 'wep_legal_db_notes',
            ]);

            $weaponlegalDataArray = [];
            foreach ($weaponlegalData['wep_legal_bank'] as $index => $weplegalBank) {
                $weaponlegalDataRow = [
                    'wep_legal_bank' => $weplegalBank,
                    'wep_legal_cheque' => $weaponlegalData['wep_legal_cheque'][$index],
                    'wep_legal_amount' => $weaponlegalData['wep_legal_amount'][$index],
                    'wep_legal_notes' => $weaponlegalData['wep_legal_notes'][$index],
                    'wep_legal_wb_name' => $weaponlegalData['wep_legal_wb_name'][$index],
                    'wep_legal_wb_id' => $weaponlegalData['wep_legal_wb_id'][$index],
                    'wep_legal_wb_desig' => $weaponlegalData['wep_legal_wb_desig'][$index],
                    'wep_legal_wb_cell' => $weaponlegalData['wep_legal_wb_cell'][$index],
                    'wep_legal_wb_email' => $weaponlegalData['wep_legal_wb_email'][$index],
                    'wep_legal_wb_notes' => $weaponlegalData['wep_legal_wb_notes'][$index],
                    'wep_legal_fee_a' => $weaponlegalData['wep_legal_fee_a'][$index],
                    'wep_legal_fee_b' => $weaponlegalData['wep_legal_fee_b'][$index],
                    'wep_legal_fee_t' => $weaponlegalData['wep_legal_fee_t'][$index],
                    'wep_legal_fee_date' => $weaponlegalData['wep_legal_fee_date'][$index],
                    'wep_legal_fee_bank' => $weaponlegalData['wep_legal_fee_bank'][$index],
                    'wep_legal_fee_ins' => $weaponlegalData['wep_legal_fee_ins'][$index],
                    'wep_legal_fee_notes' => $weaponlegalData['wep_legal_fee_notes'][$index],
                    'wep_legal_db_name' => $weaponlegalData['wep_legal_db_name'][$index],
                    'wep_legal_db_id' => $weaponlegalData['wep_legal_db_id'][$index],
                    'wep_legal_db_desig' => $weaponlegalData['wep_legal_db_desig'][$index],
                    'wep_legal_db_cell' => $weaponlegalData['wep_legal_db_cell'][$index],
                    'wep_legal_db_email' => $weaponlegalData['wep_legal_db_email'][$index],
                    'wep_legal_db_notes' => $weaponlegalData['wep_legal_db_notes'][$index],
                ];

                // Define the Guarantor image fields
                $weaponlegalFields = [
                    'wep_legal_copy', 'wep_legal_attach', 'wep_legal_wb_attach', 'wep_legal_fee_slip', 'wep_legal_fee_attach',
                    'wep_legal_db_attach',
                ];

                foreach ($weaponlegalFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $weaponlegalDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $weaponlegalArray[] = $weaponlegalDataRow;
            }

            $regulator->weaponlegals()->createMany($weaponlegalArray);

            // Regulatory Weapon Division

            $weapondivisionData = $request->only([
                'division_category', 'division_quantity', 'division_caliber', 'division_juris',
                'division_sanc', 'division_notes',
            ]);

            $weapondivisionDataArray = [];
            foreach ($weapondivisionData['division_category'] as $index => $divisionCategory) {
                $weapondivisionDataRow = [
                    'division_category' => $divisionCategory,
                    'division_quantity' => $weapondivisionData['division_quantity'][$index],
                    'division_caliber' => $weapondivisionData['division_caliber'][$index],
                    'division_juris' => $weapondivisionData['division_juris'][$index],
                    'division_sanc' => $weapondivisionData['division_sanc'][$index],
                    'division_notes' => $weapondivisionData['division_notes'][$index],
                    'division_book' => $request->has('division_book') ? true : false,
                    'division_card' => $request->has('division_card') ? true : false,
                    'division_nbp' => $request->has('division_nbp') ? true : false,
                    'division_pb' => $request->has('division_pb') ? true : false,
                ];

                $weapondivisionImageFields = ['division_attach', 'division_sanc_copy'];

                foreach ($weapondivisionImageFields as $field) {
                    if ($request->hasFile($field)) {
                        $file = $request->file($field);
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $weapondivisionDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $weapondivisionDataArray[] = $weapondivisionDataRow;
            }

            $regulator->weapondivisions()->createMany($weapondivisionDataArray);


            //Regulatory Weapon License Details

            $weaponlicenseData = $request->only([
                'wep_license', 'wep_lic_no', 'wep_lic_type',
                'wep_lic_caliber', 'wep_lic_juris', 'wep_lic_tenure',
                'wep_lic_cost', 'wep_lic_expiry', 'wep_lic_sancdate',
                'wep_lic_dealername', 'wep_lic_vendorid', 'wep_lic_endate',
                'wep_lic_category' , 'wep_lic_ex_notes',
            ]);

            $weaponlicenseDataArray = [];
            foreach ($weaponlicenseData['wep_license'] as $index => $wepLicense) {
                $weaponlicenseDataRow = [
                    'wep_license' => $wepLicense,
                    'wep_lic_no' => $weaponlicenseData['wep_lic_no'][$index],
                    'wep_lic_type' => $weaponlicenseData['wep_lic_type'][$index],
                    'wep_lic_caliber' => $weaponlicenseData['wep_lic_caliber'][$index],
                    'wep_lic_juris' => $weaponlicenseData['wep_lic_juris'][$index],
                    'wep_lic_tenure' => $weaponlicenseData['wep_lic_tenure'][$index],
                    'wep_lic_cost' => $weaponlicenseData['wep_lic_cost'][$index],
                    'wep_lic_expiry' => $weaponlicenseData['wep_lic_expiry'][$index],
                    'wep_lic_sancdate' => $weaponlicenseData['wep_lic_sancdate'][$index],
                    'wep_lic_dealername' => $weaponlicenseData['wep_lic_dealername'][$index],
                    'wep_lic_vendorid' => $weaponlicenseData['wep_lic_vendorid'][$index],
                    'wep_lic_category' => $weaponlicenseData['wep_lic_category'][$index],
                    'wep_lic_endate' => $weaponlicenseData['wep_lic_endate'][$index],
                    'wep_lic_ex_notes' => $weaponlicenseData['wep_lic_ex_notes'][$index],
                ];

                // Define the Guarantor image fields
                $weaponlicenseFields = [
                    'wep_lic_attach', 'wep_lic_scanned', 'wep_lic_encopy', 'wep_lic_ex_attach',
                ];

                foreach ($weaponlicenseFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $weaponlicenseDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $weaponlicenseArray[] = $weaponlicenseDataRow;
            }

            $regulator->weaponlicenses()->createMany($weaponlicenseArray);

            //Any Other Consultant Details:

            $otherconsultantData = $request->only([
                'other_name', 'other_desig', 'other_org', 'other_cell', 'other_email', 'other_fee',
                'other_bank', 'other_account', 'other_acc_no', 'other_notes',
                'other_office', 'other_build', 'other_block', 'other_area', 'other_city',
                'other_a_email', 'other_web', 'other_pin', 'other_gps', 'other_ex_notes',
            ]);

            $otherconsultantDataArray = [];
            foreach ($otherconsultantData['other_name'] as $index => $otherName) {
                $otherconsultantDataRow = [
                    'other_name' => $otherName,
                    'other_desig' => $otherconsultantData['other_desig'][$index],
                    'other_org' => $otherconsultantData['other_org'][$index],
                    'other_cell' => $otherconsultantData['other_cell'][$index],
                    'other_email' => $otherconsultantData['other_email'][$index],
                    'other_fee' => $otherconsultantData['other_fee'][$index],
                    'other_bank' => $otherconsultantData['other_bank'][$index],
                    'other_account' => $otherconsultantData['other_account'][$index],
                    'other_acc_no' => $otherconsultantData['other_acc_no'][$index],
                    'other_notes' => $otherconsultantData['other_notes'][$index],
                    'other_office' => $otherconsultantData['other_office'][$index],
                    'other_build' => $otherconsultantData['other_build'][$index],
                    'other_block' => $otherconsultantData['other_block'][$index],
                    'other_area' => $otherconsultantData['other_area'][$index],
                    'other_city' => $otherconsultantData['other_city'][$index],
                    'other_a_email' => $otherconsultantData['other_a_email'][$index],
                    'other_web' => $otherconsultantData['other_web'][$index],
                    'other_pin' => $otherconsultantData['other_pin'][$index],
                    'other_gps' => $otherconsultantData['other_gps'][$index],
                    'other_ex_notes' => $otherconsultantData['other_ex_notes'][$index],
                ];

                // Define the Guarantor image fields
                $otherconsultantFields = [
                    'other_front', 'other_back', 'other_fin', 'other_attachments', 'other_photo', 'other_ex_attach',
                ];

                foreach ($otherconsultantFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $otherconsultantDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $otherconsultantArray[] = $otherconsultantDataRow;
            }

            $regulator->otherconsultants()->createMany($otherconsultantArray);

            //Regulatory Any Other Issuing Authority

            $otherissuingData = $request->only([
                'other_iss_co_name', 'other_iss_co_desig', 'other_iss_co_dept',
                'other_iss_co_section', 'other_iss_co_ptcl', 'other_iss_co_cell',
                'other_iss_co_email', 'other_iss_co_web', 'other_iss_co_notes',
            ]);

            $otherissuingDataArray = [];
            foreach ($otherissuingData['other_iss_co_name'] as $index => $otherisscoName) {
                $otherissuingDataRow = [
                    'other_iss_co_name' => $otherisscoName,
                    'other_iss_co_desig' => $otherissuingData['other_iss_co_desig'][$index],
                    'other_iss_co_dept' => $otherissuingData['other_iss_co_dept'][$index],
                    'other_iss_co_section' => $otherissuingData['other_iss_co_section'][$index],
                    'other_iss_co_ptcl' => $otherissuingData['other_iss_co_ptcl'][$index],
                    'other_iss_co_cell' => $otherissuingData['other_iss_co_cell'][$index],
                    'other_iss_co_email' => $otherissuingData['other_iss_co_email'][$index],
                    'other_iss_co_web' => $otherissuingData['other_iss_co_web'][$index],
                    'other_iss_co_notes' => $otherissuingData['other_iss_co_notes'][$index],
                ];

                // Define the Guarantor image fields
                $otherissuingFields = [
                    'other_iss_co_front', 'other_iss_co_back', 'other_iss_co_attach',
                ];

                foreach ($otherissuingFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $otherissuingDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $otherissuingArray[] = $otherissuingDataRow;
            }

            $regulator->otherissuings()->createMany($otherissuingArray);

            //Regulatory otherating Renewals

            $otherrenewalData = $request->only([
                'other_fee_category', 'other_finance_bank', 'other_finance_cheque',
                'other_finance_amount', 'other_finance_notes', 'other_finance_wb_name',
                'other_finance_wb_id', 'other_finance_wb_desig', 'other_finance_wb_cell',
                'other_finance_wb_email', 'other_finance_wb_notes', 'other_finance_fee',
                'other_finance_fee_date', 'other_finance_fee_bank', 'other_finance_fee_ins',
                'other_finance_fee_notes', 'other_finance_db_name', 'other_finance_db_id',
                'other_finance_db_desig', 'other_finance_db_cell', 'other_finance_db_email',
                'other_finance_db_notes',
            ]);

            $otherrenewalDataArray = [];
            foreach ($otherrenewalData['other_fee_category'] as $index => $otherfeeCategory) {
                $otherrenewalDataRow = [
                    'other_fee_category' => $otherfeeCategory,
                    'other_finance_bank' => $otherrenewalData['other_finance_bank'][$index],
                    'other_finance_cheque' => $otherrenewalData['other_finance_cheque'][$index],
                    'other_finance_amount' => $otherrenewalData['other_finance_amount'][$index],
                    'other_finance_notes' => $otherrenewalData['other_finance_notes'][$index],
                    'other_finance_wb_name' => $otherrenewalData['other_finance_wb_name'][$index],
                    'other_finance_wb_id' => $otherrenewalData['other_finance_wb_id'][$index],
                    'other_finance_wb_desig' => $otherrenewalData['other_finance_wb_desig'][$index],
                    'other_finance_wb_cell' => $otherrenewalData['other_finance_wb_cell'][$index],
                    'other_finance_wb_email' => $otherrenewalData['other_finance_wb_email'][$index],
                    'other_finance_wb_notes' => $otherrenewalData['other_finance_wb_notes'][$index],
                    'other_finance_fee' => $otherrenewalData['other_finance_fee'][$index],
                    'other_finance_fee_date' => $otherrenewalData['other_finance_fee_date'][$index],
                    'other_finance_fee_bank' => $otherrenewalData['other_finance_fee_bank'][$index],
                    'other_finance_fee_ins' => $otherrenewalData['other_finance_fee_ins'][$index],
                    'other_finance_fee_notes' => $otherrenewalData['other_finance_fee_notes'][$index],
                    'other_finance_db_name' => $otherrenewalData['other_finance_db_name'][$index],
                    'other_finance_db_id' => $otherrenewalData['other_finance_db_id'][$index],
                    'other_finance_db_desig' => $otherrenewalData['other_finance_db_desig'][$index],
                    'other_finance_db_cell' => $otherrenewalData['other_finance_db_cell'][$index],
                    'other_finance_db_email' => $otherrenewalData['other_finance_db_email'][$index],
                    'other_finance_db_notes' => $otherrenewalData['other_finance_db_notes'][$index],
                ];

                // Define the Guarantor image fields
                $otherrenewalFields = [
                    'other_finance_copy', 'other_finance_attach', 'other_finance_wb_attach', 'other_finance_slip_attach',
                    'other_finance_fee_attach', 'other_finance_db_attach',
                ];

                foreach ($otherrenewalFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $otherrenewalDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $otherrenewalArray[] = $otherrenewalDataRow;
            }

            $regulator->otherrenewals()->createMany($otherrenewalArray);


            DB::commit();

            $regulatorId = $regulator->id;

            Log::info('Customer data successfully stored. Customer ID: ' . $regulatorId);
            if ($request->has('save_and_email')) {
                $url = route('viewregulator', ['id' => $regulatorId]);
                return redirect()->to($url)->with('success', 'Regulator data successfully stored.');
            } elseif ($request->has('save_and_share')) {
                return redirect()->route('postregulator')->with('success', 'Regulator data successfully stored.')->with('regulatorId', $regulatorId);
            } elseif ($request->has('save_and_new')) {
                return redirect()->route('postregulator')->with('success', 'Regulator data successfully stored.');
            } else {
                return redirect()->route('regulator')->with('success', 'Regulatory data successfully stored.');
            }
            // return redirect()->back()->with('success', 'Regulator data successfully stored.');

        } catch (\Exception $e) {
            DB::rollback();

            Log::error('An error occurred while saving Regulator data: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while saving data.');
        }
    }

    public function editregulator($id)
    {
        $regulators = Regulator::find($id);
        return view('regulatory.editregulator', compact('regulators'));
    }

    public function viewregulator($id)
    {
        $regulators = Regulator::find($id);
        return view('regulatory.viewregulator', compact('regulators'));
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

                $message->attach($pdf, ['as' => 'regulatory_information.pdf'])
                    ->text($body);
            });

            return response()->json(['message' => 'Email sent successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to send email.'], 500);
        }
    }

    public function update_regulator(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $regulator = Regulator::find($id);

            if (!$regulator) {
                return redirect()->back()->with('error', 'Regulator record not found.');
            }

            $regulatorData = $request->except('_token', '_method');

            $regulatorImageFields = [
                'license_attach', 'attachments', 'oper_home_photo', 'oper_home_attach', 'oper_ra_letter', 'oper_ra_doc',
                'oper_ra_attach', 'oper_rc_letter', 'oper_rc_doc', 'oper_rc_attach', 'oper_rap_letter', 'oper_rap_doc',
                'oper_rap_attach', 'oper_laws_attach', 'wep_home_photo', 'wep_home_attach', 'wep_ra_letter', 'wep_ra_doc',
                'wep_ra_attach', 'wep_rc_letter', 'wep_rc_docs', 'wep_rc_attach', 'wep_rap_letter', 'wep_rap_docs',
                'wep_rap_attach', 'wep_laws_attach', 'any_a_photo', 'any_a_attach', 'any_ra_letter', 'any_ra_docs',
                'any_ra_attach', 'any_rc_letter', 'any_rc_docs', 'any_rc_attach', 'any_rap_letter', 'any_rap_docs',
                'any_rap_attach', 'any_laws_attach',
            ];

            $regulatorImages = [];
            foreach ($regulatorImageFields as $field) {
                if ($request->hasFile($field)) {
                    $files = $request->file($field);
                    $filePaths = [];
                    foreach ($files as $file) {
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $filePaths[] = 'uploads/images/' . $file_name;
                    }
                    $regulatorImages[$field] = implode(',', $filePaths); // Convert array to string
                }
            }

            if ($request->has('regulator_activation')) {
                $regulatorData['regulator_activation'] = $request->input('regulator_activation');
            }

            $regulator->update(array_merge($regulatorData, $regulatorImages));

            // Update operating consulting data
            $operatingconsultantsData = $request->input('operatingconsultants');

            foreach ($operatingconsultantsData as $operatingconsultantData) {
                $operatingconsultantId = $operatingconsultantData['opc_id'];

                $operatingconsultant = RegOperatingConsultant::find($operatingconsultantId);
                if ($operatingconsultant) {
                    // Process and update images
                    $operatingconsultantImages = [];
                    $operatingconsultantFields = ['oper_front', 'oper_back', 'oper_fin', 'oper_attachments', 'oper_photo', 'oper_ex_attach'];

                    foreach ($operatingconsultantFields as $field) {
                        if ($request->hasFile("operatingconsultants.$operatingconsultantId.$field")) {
                            $files = $request->file("operatingconsultants.$operatingconsultantId.$field");
                            $filePaths = [];
                            foreach ($files as $file) {
                                $extension = $file->getClientOriginalExtension();
                                $file_name = time() . '_' . $file->getClientOriginalName();
                                $file->move(public_path('uploads/images'), $file_name);
                                $filePaths[] = 'uploads/images/' . $file_name;
                            }
                            $operatingconsultantImages[$field] = implode(',', $filePaths); // Convert array to string
                        }
                    }

                    // Merge image paths with the existing data and update the operating consultant
                    $mergedData = array_merge($operatingconsultantData, $operatingconsultantImages);
                    $operatingconsultant->update($mergedData);

                }
            }


            //Operating Issuing Data

            $operatingissuingsData = $request->input('operatingissuings');

            foreach ($operatingissuingsData as $operatingissuingData) {
                $operatingissuingId = $operatingissuingData['opi_id'];

                $operatingissuingFields = ['oper_iss_co_front', 'oper_iss_co_back', 'oper_iss_co_attach'];

                foreach ($operatingissuingFields as $field) {
                    if ($request->hasFile($field) && isset($operatingissuingData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $operatingissuingData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($operatingissuingId)) {
                    $regulator->operatingissuings()->create($operatingissuingData);
                } else {
                    $operatingissuing = RegOperatingIssuing::find($operatingissuingId);
                    if ($operatingissuing) {
                        $operatingissuing->update($operatingissuingData);
                    }
                }
            }

            //Operating Renewals Data

            $operatingrenewalsData = $request->input('operatingrenewals');

            foreach ($operatingrenewalsData as $operatingrenewalData) {
                $operatingrenewalId = $operatingrenewalData['opr_id'];

                $operatingrenewalFields = ['oper_finance_copy', 'oper_finance_attach', 'oper_finance_wb_attach',
                'oper_finance_slip_attach', 'oper_finance_fee_attach', 'oper_finance_db_attach'];

                foreach ($operatingrenewalFields as $field) {
                    if ($request->hasFile($field) && isset($operatingrenewalData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $operatingrenewalData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($operatingrenewalId)) {
                    $regulator->operatingrenewals()->create($operatingrenewalData);
                } else {
                    $operatingrenewal = RegOperatingRenewals::find($operatingrenewalId);
                    if ($operatingrenewal) {
                        $operatingrenewal->update($operatingrenewalData);
                    }
                }
            }

            //Weapon Consultant Data:

            $weaponconsultantsData = $request->input('weaponconsultants');

            foreach ($weaponconsultantsData as $weaponconsultantData) {
                $weaponconsultantId = $weaponconsultantData['we_id'];

                $weaponconsultantFields = ['wep_front', 'wep_back', 'wep_fin', 'wep_attachments', 'wep_photo', 'wep_ex_attach'];

                foreach ($weaponconsultantFields as $field) {
                    if ($request->hasFile($field) && isset($weaponconsultantData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $weaponconsultantData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($weaponconsultantId)) {
                    $regulator->weaponconsultants()->create($weaponconsultantData);
                } else {
                    $weaponconsultant = RegWeaponConsultant::find($weaponconsultantId);
                    if ($weaponconsultant) {
                        $weaponconsultant->update($weaponconsultantData);
                    }
                }
            }

            //Weapon Issuing Data

            $weaponissuingsData = $request->input('weaponissuings');

            foreach ($weaponissuingsData as $weaponissuingData) {
                $weaponissuingId = $weaponissuingData['wei_id'];

                $weaponissuingFields = ['wep_iss_co_front', 'wep_iss_co_back', 'wep_iss_co_attach',
                'wep_co_p_front' , 'wep_co_p_back' , 'wep_co_p_attach'];

                foreach ($weaponissuingFields as $field) {
                    if ($request->hasFile($field) && isset($weaponissuingData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $weaponissuingData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($weaponissuingId)) {
                    $regulator->weaponissuings()->create($weaponissuingData);
                } else {
                    $weaponissuing = RegWeaponIssuing::find($weaponissuingId);
                    if ($weaponissuing) {
                        $weaponissuing->update($weaponissuingData);
                    }
                }
            }

            //Weapon Legal Fee Data

            // $weaponlegalsData = $request->input('weaponlegals');

            // foreach ($weaponlegalsData as $weaponlegalData) {
            //     $weaponlegalId = $weaponlegalData['le_id'];

            //     $weaponlegalFields = ['wep_legal_copy', 'wep_legal_attach', 'wep_legal_wb_attach',
            //     'wep_legal_fee_slip' , 'wep_legal_fee_attach' , 'wep_legal_db_attach'];

            //     foreach ($weaponlegalFields as $field) {
            //         if ($request->hasFile($field) && isset($weaponlegalData[$field])) {
            //             $file = $request->$field;
            //             $extension = $file->getClientOriginalExtension();
            //             $file_name = time() . '_' . $file->getClientOriginalName();
            //             $file->move(public_path('uploads/images'), $file_name);
            //             $weaponlegalData[$field] = 'uploads/images/' . $file_name;
            //         }
            //     }

            //     if (empty($weaponissuingId)) {
            //         $regulator->weaponlegals()->create($weaponlegalData);
            //     } else {
            //         $weaponlegal = RegWeaponLegal::find($weaponlegalId);
            //         if ($weaponlegal) {
            //             $weaponlegal->update($weaponlegalData);
            //         }
            //     }
            // }

            //Weapon Renewals Data

            $weaponrenewalsData = $request->input('weaponrenewals');

            foreach ($weaponrenewalsData as $weaponrenewalData) {
                $weaponrenewalId = $weaponrenewalData['wer_id'];

                $weaponrenewalFields = ['wep_finance_copy', 'wep_finance_attach', 'wep_finance_wb_attach',
                'wep_finance_slip_attach', 'wep_finance_fee_attach', 'wep_finance_db_attach'];

                foreach ($weaponrenewalFields as $field) {
                    if ($request->hasFile($field) && isset($weaponrenewalData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $weaponrenewalData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($weaponrenewalId)) {
                    $regulator->weaponrenewals()->create($weaponrenewalData);
                } else {
                    $weaponrenewal = RegWeaponRenewals::find($weaponrenewalId);
                    if ($weaponrenewal) {
                        $weaponrenewal->update($weaponrenewalData);
                    }
                }
            }


            //Weapon Renewals Data

            $weaponrenewalsData = $request->input('weaponrenewals');

            foreach ($weaponrenewalsData as $weaponrenewalData) {
                $weaponrenewalId = $weaponrenewalData['wer_id'];

                $weaponrenewalFields = ['wep_finance_copy', 'wep_finance_attach', 'wep_finance_wb_attach',
                'wep_finance_slip_attach', 'wep_finance_fee_attach', 'wep_finance_db_attach'];

                foreach ($weaponrenewalFields as $field) {
                    if ($request->hasFile($field) && isset($weaponrenewalData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $weaponrenewalData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($weaponrenewalId)) {
                    $regulator->weaponrenewals()->create($weaponrenewalData);
                } else {
                    $weaponrenewal = RegWeaponRenewals::find($weaponrenewalId);
                    if ($weaponrenewal) {
                        $weaponrenewal->update($weaponrenewalData);
                    }
                }
            }//Weapon Renewals Data

            $weaponlicensesData = $request->input('weaponlicenses');

            foreach ($weaponlicensesData as $weaponlicenseData) {
                $weaponlicenseId = $weaponlicenseData['lic_id'];

                $weaponlicenseFields = ['wep_lic_attach', 'wep_lic_scanned', 'wep_lic_encopy',
                'wep_lic_ex_attach'];

                foreach ($weaponlicenseFields as $field) {
                    if ($request->hasFile($field) && isset($weaponlicenseData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $weaponlicenseData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($weaponlicenseId)) {
                    $regulator->weaponlicenses()->create($weaponlicenseData);
                } else {
                    $weaponlicense = RegWeaponLicense::find($weaponlicenseId);
                    if ($weaponlicense) {
                        $weaponlicense->update($weaponlicenseData);
                    }
                }
            }

        // Any Other Consulting Data :

            $otherconsultantsData = $request->input('otherconsultants');

            foreach ($otherconsultantsData as $otherconsultantData) {
                $otherconsultantId = $otherconsultantData['oth_id'];

                $otherconsultantFields = ['other_front', 'other_back', 'other_fin', 'other_attachments', 'other_photo', 'other_ex_attach'];

                foreach ($otherconsultantFields as $field) {
                    if ($request->hasFile($field) && isset($otherconsultantData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $otherconsultantData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($otherconsultantId)) {
                    $regulator->otherconsultants()->create($otherconsultantData);
                } else {
                    $otherconsultant = RegOtherConsultant::find($otherconsultantId);
                    if ($otherconsultant) {
                        $otherconsultant->update($otherconsultantData);
                    }
                }
            }

            //Any Other Issuing Data

            $otherissuingsData = $request->input('otherissuings');

            foreach ($otherissuingsData as $otherissuingData) {
                $otherissuingId = $otherissuingData['othi_id'];

                $otherissuingFields = ['other_iss_co_front', 'other_iss_co_back', 'other_iss_co_attach'];

                foreach ($otherissuingFields as $field) {
                    if ($request->hasFile($field) && isset($otherissuingData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $otherissuingData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($otherissuingId)) {
                    $regulator->otherissuings()->create($otherissuingData);
                } else {
                    $otherissuing = RegOtherIssuing::find($otherissuingId);
                    if ($otherissuing) {
                        $otherissuing->update($otherissuingData);
                    }
                }
            }


            //Any Other Renewals Data

            $otherrenewalsData = $request->input('otherrenewals');


            foreach ($otherrenewalsData as $otherrenewalData) {
                $otherrenewalId = $otherrenewalData['othr_id'];

                $otherrenewalFields = ['other_finance_copy', 'other_finance_attach', 'other_finance_wb_attach',
                'other_finance_slip_attach', 'other_finance_fee_attach', 'other_finance_db_attach'];

                foreach ($otherrenewalFields as $field) {
                    if ($request->hasFile($field) && isset($otherrenewalData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $otherrenewalData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($otherrenewalId)) {
                    $regulator->otherrenewals()->create($otherrenewalData);
                } else {
                    $otherrenewal = RegOtherRenewals::find($otherrenewalId);
                    if ($otherrenewal) {
                        $otherrenewal->update($otherrenewalData);
                    }
                }
            }



            DB::commit();

            Log::info('Regulatory data successfully updated.');

            return redirect()->back()->with('success', 'Regulatory data successfully updated.');
        } catch (\Exception $e) {



            DB::rollback();
            Log::error('Database error: ' . $e->getMessage());
            Log::error('An error occurred while updating Regulatory data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating Regulatory data.');
        }
    }

    public function deleteregulator($id)
    {
        DB::beginTransaction();

        try {
            $regulator = Regulator::find($id);

            if (!$regulator) {
                return redirect()->back()->with('error', 'Regulatory record not found.');
            }

            $regulator->operatingconsultants()->delete();
            $regulator->operatingissuings()->delete();
            $regulator->operatingrenewals()->delete();
            $regulator->weaponconsultants()->delete();
            $regulator->weaponissuings()->delete();
            $regulator->weaponlegals()->delete();
            $regulator->weaponrenewals()->delete();
            $regulator->weapondivisions()->delete();
            $regulator->weaponlicenses()->delete();
            $regulator->otherconsultants()->delete();
            $regulator->otherissuings()->delete();
            $regulator->otherrenewals()->delete();
            $regulator->delete();

            DB::commit();

            return redirect()->back()->with('success', 'Regulatory record deleted successfully.');
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('An error occurred while deleting Regulatory record: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while deleting the Regulatory record.');
        }
    }
}
