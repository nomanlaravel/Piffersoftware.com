<?php

namespace App\Http\Controllers;

use App\Models\Corporate;
use App\Models\CorporateConsultant;
use App\Models\CorporateIssuing;
use App\Models\CorporateRenewals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CorporateController extends Controller
{
    
      public function corporate_delete($id){
        $delete_corporate = Corporate::find($id);
        $delete_corporate->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }
    
    public function corporate()
    {
        $corporateData = Corporate::all();

        return view('regulatory.corporate', compact('corporateData'));
    }

    public function postcorporate()
    {
        return view('regulatory.postcorporate');
    }

    public function submit_corporate(Request $request)
    {
        DB::beginTransaction();

        try {
            // Create HRM record
            $corporateData = $request->except('_token');

            // Define the HRM image fields
            $corporateImageFields = [
                'latest_certification', 'attachments', 'a_photo', 'a_attach', 'application_letter', 'application_attach',
                'corespondence_letter', 'corespondence_attach', 'approval_letter', 'approval_attach', 'laws_attach', 'copy_bill',
            ];

            foreach ($corporateImageFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $corporateData[$field] = 'uploads/images/' . $file_name;
                }
            }

            if ($request->has('corporate_activation')) {
                $corporateData['corporate_activation'] = $request->input('corporate_activation');
            }

            $corporate = Corporate::create($corporateData);

            $corporateconsultantData = $request->only([
                'c_name', 'c_desig', 'c_org', 'c_cell', 'c_email', 'c_fee',
                'c_bank', 'c_acc', 'c_acc_num', 'c_notes',
                'c_office', 'c_building', 'c_block', 'c_area', 'c_city',
                'c_a_email', 'c_website', 'c_pin', 'c_map', 'c_ex_notes',
            ]);

            $corporateconsultantDataArray = [];
            foreach ($corporateconsultantData['c_name'] as $index => $cName) {
                $corporateconsultantDataRow = [
                    'c_name' => $cName,
                    'c_desig' => $corporateconsultantData['c_desig'][$index],
                    'c_org' => $corporateconsultantData['c_org'][$index],
                    'c_cell' => $corporateconsultantData['c_cell'][$index],
                    'c_email' => $corporateconsultantData['c_email'][$index],
                    'c_fee' => $corporateconsultantData['c_fee'][$index],
                    'c_bank' => $corporateconsultantData['c_bank'][$index],
                    'c_acc' => $corporateconsultantData['c_acc'][$index],
                    'c_acc_num' => $corporateconsultantData['c_acc_num'][$index],
                    'c_notes' => $corporateconsultantData['c_notes'][$index],
                    'c_office' => $corporateconsultantData['c_office'][$index],
                    'c_building' => $corporateconsultantData['c_building'][$index],
                    'c_block' => $corporateconsultantData['c_block'][$index],
                    'c_area' => $corporateconsultantData['c_area'][$index],
                    'c_city' => $corporateconsultantData['c_city'][$index],
                    'c_a_email' => $corporateconsultantData['c_a_email'][$index],
                    'c_website' => $corporateconsultantData['c_website'][$index],
                    'c_pin' => $corporateconsultantData['c_pin'][$index],
                    'c_map' => $corporateconsultantData['c_map'][$index],
                    'c_ex_notes' => $corporateconsultantData['c_ex_notes'][$index],
                ];

                // Define the Guarantor image fields
                $corporateconsultantFields = [
                    'c_cheque', 'c_attach', 'c_loc', 'c_ex_attach',
                ];

                foreach ($corporateconsultantFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $corporateconsultantDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $corporateconsultantArray[] = $corporateconsultantDataRow;
            }

            $corporate->corporateconsultants()->createMany($corporateconsultantArray);

            // Create Work Experience records
            $corporateissuingData = $request->only([
                'i_name', 'i_desig', 'i_ptcl', 'i_cell', 'i_email',
                'i_website', 'i_notes',
            ]);

            $corporateissuingDataArray = [];
            foreach ($corporateissuingData['i_name'] as $index => $iName) {
                $corporateissuingDataRow = [
                    'i_name' => $iName,
                    'i_desig' => $corporateissuingData['i_desig'][$index],
                    'i_ptcl' => $corporateissuingData['i_ptcl'][$index],
                    'i_cell' => $corporateissuingData['i_cell'][$index],
                    'i_email' => $corporateissuingData['i_email'][$index],
                    'i_website' => $corporateissuingData['i_website'][$index],
                    'i_notes' => $corporateissuingData['i_notes'][$index],
                ];

                // Define the Work Experience image fields
                $corporateissuingImageFields = [
                    'i_front', 'i_back', 'i_attach',
                ];

                foreach ($corporateissuingImageFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $corporateissuingDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $corporateissuingDataArray[] = $corporateissuingDataRow;
            }

            $corporate->corporateissuings()->createMany($corporateissuingDataArray);

            $corporaterenewalData = $request->only([
                'fee_category', 'wf_bank_name', 'wf_cheque', 'wf_amount', 'wf_notes',
                'wb_name', 'wb_id', 'wb_desig', 'wb_cell', 'wb_email', 'wb_notes',
                'fee', 'fee_date', 'fee_bank', 'fee_ins', 'fee_notes', 'db_name',
                'db_id', 'db_desig', 'db_cell', 'db_email', 'db_notes',
            ]);

            $corporaterenewalDataArray = [];
            foreach ($corporaterenewalData['fee_category'] as $index => $feeCategory) {
                $corporaterenewalDataRow = [
                    'fee_category' => $feeCategory,
                    'wf_bank_name' => $corporaterenewalData['wf_bank_name'][$index],
                    'wf_cheque' => $corporaterenewalData['wf_cheque'][$index],
                    'wf_amount' => $corporaterenewalData['wf_amount'][$index],
                    'wf_notes' => $corporaterenewalData['wf_notes'][$index],
                    'wb_name' => $corporaterenewalData['wb_name'][$index],
                    'wb_id' => $corporaterenewalData['wb_id'][$index],
                    'wb_desig' => $corporaterenewalData['wb_desig'][$index],
                    'wb_cell' => $corporaterenewalData['wb_cell'][$index],
                    'wb_email' => $corporaterenewalData['wb_email'][$index],
                    'wb_notes' => $corporaterenewalData['wb_notes'][$index],
                    'fee' => $corporaterenewalData['fee'][$index],
                    'fee_date' => $corporaterenewalData['fee_date'][$index],
                    'fee_bank' => $corporaterenewalData['fee_bank'][$index],
                    'fee_ins' => $corporaterenewalData['fee_ins'][$index],
                    'fee_notes' => $corporaterenewalData['fee_notes'][$index],
                    'db_name' => $corporaterenewalData['db_name'][$index],
                    'db_id' => $corporaterenewalData['db_id'][$index],
                    'db_desig' => $corporaterenewalData['db_desig'][$index],
                    'db_cell' => $corporaterenewalData['db_cell'][$index],
                    'db_email' => $corporaterenewalData['db_email'][$index],
                    'db_notes' => $corporaterenewalData['db_notes'][$index],
                ];

                // Define the Work Experience image fields
                $corporaterenewalImageFields = [
                    'wf_cheque_attach', 'wf_attach', 'wb_attach', 'fee_slip', 'fee_attach', 'db_attach',
                ];

                foreach ($corporaterenewalImageFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $corporaterenewalDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $corporaterenewalDataArray[] = $corporaterenewalDataRow;
            }

            $corporate->corporaterenewals()->createMany($corporaterenewalDataArray);

            DB::commit();

            $corporateId = $corporate->id;

            Log::info('Corporate data successfully stored. Customer ID: ' . $corporateId);
            if ($request->has('save_and_email')) {
                $url = route('viewcorporate', ['id' => $corporateId]);
                return redirect()->to($url)->with('success', 'Corporate data successfully stored.');
            } elseif ($request->has('save_and_share')) {
                return redirect()->route('postcorporate')->with('success', 'Corporate data successfully stored.')->with('corporateId', $corporateId);
            } elseif ($request->has('save_and_new')) {
                return redirect()->route('postcorporate')->with('success', 'Corporate data successfully stored.');
            } else {
                return redirect()->route('corporate')->with('success', 'Corporate data successfully stored.');
            }


            // return redirect()->back()->with('success', 'Corporate data successfully stored.');

        } catch (\Exception $e) {
            DB::rollback();

            Log::error('An error occurred while saving Corporate data: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while saving data.');
        }
    }

    public function editcorporate($id)
    {
        $corporates = Corporate::find($id);
        return view('regulatory.editcorporate', compact('corporates'));
    }

    public function viewcorporate($id)
    {
        $corporates = Corporate::find($id);
        return view('regulatory.viewcorporate', compact('corporates'));
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

                $message->attach($pdf, ['as' => 'corporate_information.pdf'])
                    ->text($body);
            });

            return response()->json(['message' => 'Email sent successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to send email.'], 500);
        }
    }


    public function deleteCorporate($id)
    {
        DB::beginTransaction();

        try {
            $corporate = Corporate::find($id);

            if (!$corporate) {
                return redirect()->back()->with('error', 'Corporate record not found.');
            }

            $corporate->corporateconsultants()->delete();
            $corporate->corporateissuings()->delete();
            $corporate->corporaterenewals()->delete();
            $corporate->delete();

            DB::commit();

            return redirect()->back()->with('success', 'Corporate record deleted successfully.');
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('An error occurred while deleting Corporate record: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while deleting the Corporate record.');
        }
    }

    public function update_corporate(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $corporate = Corporate::find($id);

            if (!$corporate) {
                return redirect()->back()->with('error', 'Corporate record not found.');
            }

            $corporateData = $request->except('_token', '_method');

            $corporateImageFields = ['latest_certification', 'attachments', 'a_photo', 'a_attach', 'application_letter', 'application_attach', 'corespondence_letter', 'corespondence_attach', 'approval_letter', 'approval_attach', 'laws_attach', 'copy_bill'];

            foreach ($corporateImageFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $corporateData[$field] = 'uploads/images/' . $file_name;
                }
            }

            if ($request->has('corporate_activation')) {
                $corporateData['corporate_activation'] = $request->input('corporate_activation');
            }

            $corporate->update($corporateData);

            $corporateconsultantsData = $request->input('corporateconsultants');

            foreach ($corporateconsultantsData as $corporateconsultantData) {
                $corporateconsultantId = $corporateconsultantData['c_id'];

                $corporateconsultantFields = ['c_cheque', 'c_attach', 'c_loc', 'c_ex_attach'];

                foreach ($corporateconsultantFields as $field) {
                    if ($request->hasFile($field) && isset($corporateconsultantData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $corporateconsultantData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($corporateconsultantId)) {
                    $corporate->corporateconsultants()->create($corporateconsultantData);
                } else {
                    $corporateconsultant = CorporateConsultant::find($corporateconsultantId);
                    if ($corporateconsultant) {
                        $corporateconsultant->update($corporateconsultantData);
                    }
                }
            }

            $corporateissuingsData = $request->input('corporateissuings');

            foreach ($corporateissuingsData as $corporateissuingData) {
                $corporateissuingId = $corporateissuingData['i_id'];

                $corporateissuingFields = ['i_front', 'i_back', 'i_attach'];

                foreach ($corporateissuingFields as $field) {
                    if ($request->hasFile($field) && isset($corporateissuingData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $corporateissuingData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($corporateissuingId)) {
                    $corporate->corporateissuings()->create($corporateissuingData);
                } else {
                    $corporateissuing = CorporateIssuing::find($corporateissuingId);
                    if ($corporateissuing) {
                        $corporateissuing->update($corporateissuingData);
                    }
                }
            }

            $corporaterenewalsData = $request->input('corporaterenewals');

            foreach ($corporaterenewalsData as $corporaterenewalData) {
                $corporaterenewalId = $corporaterenewalData['r_id'];

                $corporaterenewalFields = ['wf_cheque_attach', 'wf_attach', 'wb_attach', 'fee_slip', 'fee_attach', 'db_attach'];

                foreach ($corporaterenewalFields as $field) {
                    if ($request->hasFile($field) && isset($corporaterenewalData[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $corporaterenewalData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($corporaterenewalId)) {
                    $corporate->corporaterenewals()->create($corporaterenewalData);
                } else {
                    $corporaterenewal = CorporateRenewals::find($corporaterenewalId);
                    if ($corporaterenewal) {
                        $corporaterenewal->update($corporaterenewalData);
                    }
                }
            }

            Log::info('Request Data:', $request->all());

            DB::commit();

            Log::info('Corporate data successfully updated.');

            return redirect()->back()->with('success', 'Corporate data successfully updated.');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Database error: ' . $e->getMessage());
            Log::error('An error occurred while updating Corporate data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating Corporate data.');
        }
    }

}
