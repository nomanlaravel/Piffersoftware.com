<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\VendorAccounts;
use App\Models\VendorPoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VendorController extends Controller
{

    public function vendor(){
        $vendors = Vendor::all();
        return view('vendor.vendor' , compact('vendors'));
    }

    public function postvendor(){
        return view('vendor.postvendor');
    }

    public function store(Request $request)
    {
        try {
            Log::info('Store method called.');

            $vendorData = $request->except('_token');
            Log::info('Vendor data received:', $vendorData);

            $vendorImageFields = [
                'vendor_profile_attach', 'vendor_attach', 'o_photo', 'f_photo', 'w_photo',
                'vendor_secp_attach', 'cop_attach', 'certification_attach', 'directors_attach',
            ];

            foreach ($vendorImageFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $vendorData[$field] = 'uploads/images/' . $file_name;
                    Log::info("File uploaded for {$field}:", ['file_name' => $file_name]);
                }
            }

            $vendor = Vendor::create($vendorData);
            Log::info('Vendor created with ID:', ['vendor_id' => $vendor->id]);

            // Vendor POCs
            $vendorpocData = $request->only([
                'v_poc_name', 'v_poc_cell', 'v_poc_email', 'v_poc_cnic',
                'v_poc_notes'
            ]);
            Log::info('Vendor POC data received:', $vendorpocData);

            $vendorpocDataArray = [];
            foreach ($vendorpocData['v_poc_name'] as $index => $VpocName) {
                $vendorpocDataRow = [
                    'v_poc_name' => $VpocName,
                    'v_poc_cell' => $vendorpocData['v_poc_cell'][$index],
                    'v_poc_email' => $vendorpocData['v_poc_email'][$index],
                    'v_poc_cnic' => $vendorpocData['v_poc_cnic'][$index],
                    'v_poc_notes' => $vendorpocData['v_poc_notes'][$index],
                ];

                $vendorpocImageFields = [
                    'v_poc_front_attach', 'v_poc_back_attach', 'v_poc_attach',
                ];

                foreach ($vendorpocImageFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $vendorpocDataRow[$field] = 'uploads/images/' . $file_name;
                        Log::info("File uploaded for {$field} in POC:", ['file_name' => $file_name]);
                    }
                }

                $vendorpocDataArray[] = $vendorpocDataRow;
            }

            $vendor->vendorpocs()->createMany($vendorpocDataArray);
            Log::info('Vendor POCs created:', $vendorpocDataArray);

            // Vendor Accounts
            $vendoraccountData = $request->only([
                'v_bank_name', 'v_bank_title', 'v_bank_number', 'v_bank_iban',
                'v_bank_terms', 'v_bank_notes',
            ]);
            Log::info('Vendor account data received:', $vendoraccountData);

            $vendoraccountDataArray = [];
            foreach ($vendoraccountData['v_bank_name'] as $index => $VbankName) {
                $vendoraccountDataRow = [
                    'v_bank_name' => $VbankName,
                    'v_bank_title' => $vendoraccountData['v_bank_title'][$index],
                    'v_bank_number' => $vendoraccountData['v_bank_number'][$index],
                    'v_bank_iban' => $vendoraccountData['v_bank_iban'][$index],
                    'v_bank_terms' => $vendoraccountData['v_bank_terms'][$index],
                    'v_bank_notes' => $vendoraccountData['v_bank_notes'][$index],
                ];

                $vendoraccountImageFields = [
                    'v_bank_attach'
                ];

                foreach ($vendoraccountImageFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $vendoraccountDataRow[$field] = 'uploads/images/' . $file_name;
                        Log::info("File uploaded for {$field} in Account:", ['file_name' => $file_name]);
                    }
                }

                $vendoraccountDataArray[] = $vendoraccountDataRow;
            }

            $vendor->vendoraccounts()->createMany($vendoraccountDataArray);
            Log::info('Vendor accounts created:', $vendoraccountDataArray);

            $vendorId = $vendor->id;

            if ($request->has('save_and_email')) {
                $url = route('vendor.view', ['id' => $vendorId]);
                return redirect()->to($url)->with('success', 'Vendor data successfully stored.');
            } elseif ($request->has('save_and_share')) {
                return redirect()->route('post.vendor')->with('success', 'Vendor data successfully stored.')->with('vendorId', $vendorId);
            } elseif ($request->has('save_and_new')) {
                return redirect()->route('post.vendor')->with('success', 'Vendor data successfully stored.');
            } else {
                return redirect()->route('vendor')->with('success', 'Vendor data successfully stored.');
            }
        } catch (\Exception $e) {
            Log::error('Error occurred while saving vendor information:', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'An error occurred while saving the vendor information. Please try again.');
        }
    }

    public function edit($id)
    {
        $vendor = Vendor::findOrFail($id);
        return view('vendor.editvendor', compact('vendor'));
    }


    public function view($id)
    {
        $vendor = Vendor::findOrFail($id);
        return view('vendor.viewvendor', compact('vendor'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $vendorData = $request->except('_token');

            $vendorImageFields = [
                'vendor_profile_attach', 'vendor_attach', 'o_photo', 'f_photo', 'w_photo',
                'vendor_secp_attach', 'cop_attach', 'certification_attach', 'directors_attach',
                'v_poc_front_attach', 'v_poc_back_attach', 'v_poc_attach', 'v_bank_attach'
            ];

            foreach ($vendorImageFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $vendorData[$field] = 'uploads/images/' . $file_name;
                }
            }

            $vendor = Vendor::findOrFail($id);
            $vendor->update($vendorData);


            //Vendor POC Deatils ==>

            $vendorPocData = $request->input('vendorpocs');

            foreach ($vendorPocData as $vendorPocData) {
                $vendorPocId = $vendorPocData['p_id'];

                $vendorPocFields = [
                    'v_poc_front_attach', 'v_poc_back_attach', 'v_poc_attach',
                ];

                foreach ($vendorPocFields as $field) {
                    if ($request->hasFile($field) && isset($vendorPocFields[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $vendorPocData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($vendorPocId)) {
                    $vendor->vendorpocs()->create($vendorPocData);
                } else {
                    $vendorPoc = VendorPoc::find($vendorPocId);
                    if ($vendorPoc) {
                        $vendorPoc->update($vendorPocData);
                    }
                }
            }

            //Vendor Accounts ==>

            $vendorAccountData = $request->input('vendoraccounts');

            foreach ($vendorAccountData as $vendorAccountData) {
                $vendorAccountId = $vendorAccountData['a_id'];

                $vendorAccountFields = ['v_bank_attach'];

                foreach ($vendorAccountFields as $field) {
                    if ($request->hasFile($field) && isset($vendorAccountFields[$field])) {
                        $file = $request->$field;
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $vendorAccountData[$field] = 'uploads/images/' . $file_name;
                    }
                }

                if (empty($vendorAccountId)) {
                    $vendor->vendoraccounts()->create($vendorAccountData);
                } else {
                    $vendorAccount = VendorAccounts::find($vendorAccountId);
                    if ($vendorAccount) {
                        $vendorAccount->update($vendorAccountData);
                    }
                }
            }

            DB::commit();

            $vendorId = $vendor->id;

            if ($request->has('save_and_email')) {
                $url = route('vendor.view', ['id' => $vendorId]);
                return redirect()->to($url)->with('success', 'Vendor data successfully stored.');
            } elseif ($request->has('save_and_share')) {
                return redirect()->route('post.vendor')->with('success', 'Vendor data successfully stored.')->with('vendorId', $vendorId);
            } elseif ($request->has('save_and_new')) {
                return redirect()->route('post.vendor')->with('success', 'Vendor data successfully stored.');
            } else {
                return redirect()->route('vendor')->with('success', 'Vendor data successfully stored.');
            }

        } catch (\Exception $e) {
            DB::rollback();

            Log::error('An error occurred while updating Vendor data: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while updating data.');
        }
    }


    public function destroy($id)
    {
        $vendor = Vendor::findOrFail($id);

        $vendor->delete();

        return redirect()->route('vendor')->with('success', 'Vendor deleted successfully.');
    }
}
