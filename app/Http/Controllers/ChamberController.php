<?php

namespace App\Http\Controllers;

use App\Models\Chamber;
use App\Models\ChamberConsultant;
use App\Models\ChamberIssuing;
use App\Models\ChamberRenewals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class ChamberController extends Controller
{
     
    public function chamber(){
        $chamberData = Chamber::all();
        return view('regulatory.chamber' , compact('chamberData'));
    }

    public function postchamber(){
        return view('regulatory.postchamber');
    }


    public function submitchamber(Request $request)
    {
        DB::beginTransaction();

        try {
            // Create HRM record
            $chamberData = $request->except('_token');

            // Define the HRM image fields
            $chamberImageFields = [
                'chamber_latest_certification', 'chamber_membership_front' , 'chamber_membership_back' , 'chamber_attachments', 'chamber_a_photo', 'chamber_a_attach', 'chamber_application_attach', 'application_attach',
                'chamber_corespondence_letter', 'chamber_corespondence_attach', 'chamber_approval_letter', 'chamber_approval_attach', 'chamber_laws_attach',
            ];

            foreach ($chamberImageFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $chamberData[$field] = 'uploads/images/' . $file_name;
                }
            }

            if ($request->has('chamber_activation')) {
                $chamberData['chamber_activation'] = $request->input('chamber_activation');
            }

            $chamber = Chamber::create($chamberData);

            $chamberconsultantData = $request->only([
                'c_name', 'c_desig', 'c_org', 'c_cell', 'c_email', 'c_fee',
                'c_bank', 'c_acc', 'c_acc_num', 'c_notes',
                'c_office', 'c_building', 'c_block', 'c_area', 'c_city',
                'c_a_email', 'c_website', 'c_pin', 'c_map', 'c_ex_notes',
            ]);

            $chamberconsultantDataArray = [];
            foreach ($chamberconsultantData['c_name'] as $index => $cName) {
                $chamberconsultantDataRow = [
                    'c_name' => $cName,
                    'c_desig' => $chamberconsultantData['c_desig'][$index],
                    'c_org' => $chamberconsultantData['c_org'][$index],
                    'c_cell' => $chamberconsultantData['c_cell'][$index],
                    'c_email' => $chamberconsultantData['c_email'][$index],
                    'c_fee' => $chamberconsultantData['c_fee'][$index],
                    'c_bank' => $chamberconsultantData['c_bank'][$index],
                    'c_acc' => $chamberconsultantData['c_acc'][$index],
                    'c_acc_num' => $chamberconsultantData['c_acc_num'][$index],
                    'c_notes' => $chamberconsultantData['c_notes'][$index],
                    'c_office' => $chamberconsultantData['c_office'][$index],
                    'c_building' => $chamberconsultantData['c_building'][$index],
                    'c_block' => $chamberconsultantData['c_block'][$index],
                    'c_area' => $chamberconsultantData['c_area'][$index],
                    'c_city' => $chamberconsultantData['c_city'][$index],
                    'c_a_email' => $chamberconsultantData['c_a_email'][$index],
                    'c_website' => $chamberconsultantData['c_website'][$index],
                    'c_pin' => $chamberconsultantData['c_pin'][$index],
                    'c_map' => $chamberconsultantData['c_map'][$index],
                    'c_ex_notes' => $chamberconsultantData['c_ex_notes'][$index],
                ];

                // Define the Guarantor image fields
                $chamberconsultantFields = [
                    'c_cheque', 'c_attach', 'c_loc', 'c_ex_attach',
                ];

                foreach ($chamberconsultantFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $chamberconsultantDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $chamberconsultantArray[] = $chamberconsultantDataRow;
            }

            $chamber->chamberconsultants()->createMany($chamberconsultantArray);

            // Create Work Experience records
            $chamberissuingData = $request->only([
                'cofficer_name', 'cofficer_desig', 'cofficer_ptcl', 'cofficer_cell', 'cofficer_email',
                'cofficer_website', 'cofficer_notes', 'sj_name', 'sj_desig', 'sj_ptcl',
                'sj_cell', 'sj_email', 'sj_web', 'sj_notes'
            ]);

            $chamberissuingDataArray = [];
            foreach ($chamberissuingData['cofficer_name'] as $index => $cofficerName) {
                $chamberissuingDataRow = [
                    'cofficer_name' => $cofficerName,
                    'cofficer_desig' => $chamberissuingData['cofficer_desig'][$index],
                    'cofficer_ptcl' => $chamberissuingData['cofficer_ptcl'][$index],
                    'cofficer_cell' => $chamberissuingData['cofficer_cell'][$index],
                    'cofficer_email' => $chamberissuingData['cofficer_email'][$index],
                    'cofficer_website' => $chamberissuingData['cofficer_website'][$index],
                    'cofficer_notes' => $chamberissuingData['cofficer_notes'][$index],
                    'sj_desig' => $chamberissuingData['sj_desig'][$index],
                    'sj_desig' => $chamberissuingData['sj_desig'][$index],
                    'sj_ptcl' => $chamberissuingData['sj_ptcl'][$index],
                    'sj_cell' => $chamberissuingData['sj_cell'][$index],
                    'sj_email' => $chamberissuingData['sj_email'][$index],
                    'sj_web' => $chamberissuingData['sj_web'][$index],
                    'sj_notes' => $chamberissuingData['sj_notes'][$index],
                ];

                // Define the Work Experience image fields
                $chamberissuingImageFields = [
                    'cofficer_front', 'cofficer_back', 'cofficer_attach',
                    'sj_front', 'sj_back', 'sj_attach',
                ];

                foreach ($chamberissuingImageFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $chamberissuingDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $chamberissuingDataArray[] = $chamberissuingDataRow;
            }

            $chamber->chamberissuings()->createMany($chamberissuingDataArray);

            $chamberrenewalData = $request->only([
                'fee_category', 'wf_bank_name', 'wf_cheque', 'wf_amount', 'wf_notes',
                'wb_name', 'wb_id', 'wb_desig', 'wb_cell', 'wb_email', 'wb_notes',
                'fee', 'fee_date', 'fee_bank', 'fee_ins', 'fee_notes', 'db_name',
                'db_id', 'db_desig', 'db_cell', 'db_email', 'db_notes',
            ]);

            $chamberrenewalDataArray = [];
            foreach ($chamberrenewalData['fee_category'] as $index => $feeCategory) {
                $chamberrenewalDataRow = [
                    'fee_category' => $feeCategory,
                    'wf_bank_name' => $chamberrenewalData['wf_bank_name'][$index],
                    'wf_cheque' => $chamberrenewalData['wf_cheque'][$index],
                    'wf_amount' => $chamberrenewalData['wf_amount'][$index],
                    'wf_notes' => $chamberrenewalData['wf_notes'][$index],
                    'wb_name' => $chamberrenewalData['wb_name'][$index],
                    'wb_id' => $chamberrenewalData['wb_id'][$index],
                    'wb_desig' => $chamberrenewalData['wb_desig'][$index],
                    'wb_cell' => $chamberrenewalData['wb_cell'][$index],
                    'wb_email' => $chamberrenewalData['wb_email'][$index],
                    'wb_notes' => $chamberrenewalData['wb_notes'][$index],
                    'fee' => $chamberrenewalData['fee'][$index],
                    'fee_date' => $chamberrenewalData['fee_date'][$index],
                    'fee_bank' => $chamberrenewalData['fee_bank'][$index],
                    'fee_ins' => $chamberrenewalData['fee_ins'][$index],
                    'fee_notes' => $chamberrenewalData['fee_notes'][$index],
                    'db_name' => $chamberrenewalData['db_name'][$index],
                    'db_id' => $chamberrenewalData['db_id'][$index],
                    'db_desig' => $chamberrenewalData['db_desig'][$index],
                    'db_cell' => $chamberrenewalData['db_cell'][$index],
                    'db_email' => $chamberrenewalData['db_email'][$index],
                    'db_notes' => $chamberrenewalData['db_notes'][$index],
                ];

                // Define the Work Experience image fields
                $chamberrenewalImageFields = [
                    'wf_cheque_attach', 'wf_attach', 'wb_attach', 'fee_slip', 'fee_attach', 'db_attach',
                ];

                foreach ($chamberrenewalImageFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $chamberrenewalDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $chamberrenewalDataArray[] = $chamberrenewalDataRow;
            }

            $chamber->chamberrenewals()->createMany($chamberrenewalDataArray);

            DB::commit();


            $chamberId = $chamber->id;

            Log::info('Chamber data successfully stored. Customer ID: ' . $chamberId);
            if ($request->has('save_and_email')) {
                $url = route('viewchamber', ['id' => $chamberId]);
                return redirect()->to($url)->with('success', 'Chamber data successfully stored.');
            } elseif ($request->has('save_and_share')) {
                return redirect()->route('postchamber')->with('success', 'Chamber data successfully stored.')->with('chamberId', $chamberId);
            } elseif ($request->has('save_and_new')) {
                return redirect()->route('postchamber')->with('success', 'Chamber data successfully stored.');
            } else {
                return redirect()->route('chamber')->with('success', 'Chamber data successfully stored.');
            }

            return redirect()->back()->with('success', 'Chamber data successfully stored.');

        } catch (\Exception $e) {
            DB::rollback();

            Log::error('An error occurred while saving Chamber data: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while saving data.');
        }
    }

    public function editchamber($id)
    {
        $chambers = Chamber::find($id);
        return view('regulatory.editchamber', compact('chambers'));
    }

    public function viewchamber( $id){
        $chambers = Chamber::find($id);
        return view('regulatory.viewchamber', compact('chambers'));
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

                $message->attach($pdf, ['as' => 'chamber_information.pdf'])
                    ->text($body);
            });

            return response()->json(['message' => 'Email sent successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to send email.'], 500);
        }
    }


    public function deleteChamber($id)
    {
        DB::beginTransaction();

        try {
            $chamber = Chamber::find($id);

            if (!$chamber) {
                return redirect()->back()->with('error', 'Chamber record not found.');
            }

            $chamber->chamberconsultants()->delete();
            $chamber->chamberissuings()->delete();
            $chamber->chamberrenewals()->delete();
            $chamber->delete();

            DB::commit();

            return redirect()->back()->with('success', 'Chamber record deleted successfully.');
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('An error occurred while deleting Chamber record: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while deleting the Chamber record.');
        }
    }

    public function update_chamber(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $chamber = chamber::find($id);

            if (!$chamber) {
                return redirect()->back()->with('error', 'chamber record not found.');
            }

            $chamberData = $request->except('_token', '_method');

            $chamberImageFields = ['chamber_latest_certification', 'chamber_membership_front', 'chamber_membership_back', 'chamber_attachments', 'chamber_a_photo', 'chamber_a_attach', 'chamber_application_letter', 'chamber_application_attach', 'chamber_corespondence_letter', 'chamber_corespondence_attach', 'chamber_approval_letter', 'chamber_approval_attach', 'chamber_laws_attach'];

            foreach ($chamberImageFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $chamberData[$field] = 'uploads/images/' . $file_name;
                }
            }

            if ($request->has('chamber_activation')) {
                $chamberData['chamber_activation'] = $request->input('chamber_activation');
            }

            $chamber->update($chamberData);

            $chamberconsultantsData = $request->input('chamberconsultants');

            foreach ($chamberconsultantsData as $chamberconsultantData) {
                $chamberconsultantId = $chamberconsultantData['c_id'];

                $chamberconsultantFields = ['c_cheque', 'c_attach', 'c_loc', 'c_ex_attach'];

                foreach ($chamberconsultantFields as $field) {
                    if ($request->hasFile($field) && isset($chamberconsultantData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $chamberconsultantData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($chamberconsultantId)) {
                    $chamber->chamberconsultants()->create($chamberconsultantData);
                } else {
                    $chamberconsultant = ChamberConsultant::find($chamberconsultantId);
                    if ($chamberconsultant) {
                        $chamberconsultant->update($chamberconsultantData);
                    }
                }
            }

            $chamberissuingsData = $request->input('chamberissuings');

            foreach ($chamberissuingsData as $chamberissuingData) {
                $chamberissuingId = $chamberissuingData['i_id'];

                $chamberissuingFields = ['cofficer_front', 'cofficer_back', 'cofficer_attach' , 'sj_front' , 'sj_back' , 'sj_attach'];

                foreach ($chamberissuingFields as $field) {
                    if ($request->hasFile($field) && isset($chamberissuingData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $chamberissuingData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($chamberissuingId)) {
                    $chamber->chamberissuings()->create($chamberissuingData);
                } else {
                    $chamberissuing = ChamberIssuing::find($chamberissuingId);
                    if ($chamberissuing) {
                        $chamberissuing->update($chamberissuingData);
                    }
                }
            }

            $chamberrenewalsData = $request->input('chamberrenewals');

            foreach ($chamberrenewalsData as $chamberrenewalData) {
                $chamberrenewalId = $chamberrenewalData['r_id'];

                $chamberrenewalFields = ['wf_cheque_attach', 'wf_attach', 'wb_attach', 'fee_slip', 'fee_attach', 'db_attach'];

                foreach ($chamberrenewalFields as $field) {
                    if ($request->hasFile($field) && isset($chamberrenewalData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $chamberrenewalData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($chamberrenewalId)) {
                    $chamber->chamberrenewals()->create($chamberrenewalData);
                } else {
                    $chamberrenewal = ChamberRenewals::find($chamberrenewalId);
                    if ($chamberrenewal) {
                        $chamberrenewal->update($chamberrenewalData);
                    }
                }
            }

            Log::info('Request Data:', $request->all());

            DB::commit();

            Log::info('chamber data successfully updated.');

            return redirect()->back()->with('success', 'chamber data successfully updated.');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Database error: ' . $e->getMessage());
            Log::error('An error occurred while updating chamber data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating chamber data.');
        }
    }
}
