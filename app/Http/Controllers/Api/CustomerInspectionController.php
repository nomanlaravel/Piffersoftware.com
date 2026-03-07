<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerInspection;
use Illuminate\Support\Facades\Validator;
class CustomerInspectionController extends Controller
{
    public function InspectionStore(Request $request)
    {
        if($request->token !== 'rider_scanner'){
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid token, Access denied',
            ]);
        }

        try {
            $validator = Validator::make($request->all(), [
                'customer_id' => 'required',
                'inspection_no' => 'required',
                'inspection_emp_id' => 'required',
                'inspection_emp_name' => 'required',
                'inspection_emp_cell' => 'required',
                'inspection_pic' => 'required', 
                'inspection_note' => 'required',
                'inspection_attach' => 'required', 
                'inspection_rem_petr' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation failed',
                    'errors' => $validator->errors(),
                ]);
            }

            $customerInspection = new CustomerInspection();
            $customerInspection->customers_id = $request->customer_id;
            $customerInspection->inspection_no = $request->inspection_no;
            $customerInspection->inspection_emp_id = $request->inspection_emp_id;
            $customerInspection->inspection_emp_name = $request->inspection_emp_name;
            $customerInspection->inspection_emp_cell = $request->inspection_emp_cell;
            $customerInspection->inspection_emp_dept = 'responders';
            $customerInspection->inspection_date = now();
            $customerInspection->inspection_rem_petr = $request->inspection_rem_petr;
            $customerInspection->inspection_note = $request->inspection_note;

            // Define upload path
            $uploadPath = public_path('uploads/inspections');
            if (!file_exists($uploadPath)) {
                @mkdir($uploadPath, 0777, true);
            }

            // Handle inspection_pic upload
            if ($request->hasFile('inspection_pic')) {
                $file = $request->file('inspection_pic');
                $filename = time() . '_pic_' . $file->getClientOriginalName();
                $file->move($uploadPath, $filename);
                $customerInspection->inspection_pic = 'uploads/inspections/' . $filename;
            } else {
                $customerInspection->inspection_pic = $request->inspection_pic;
            }

            // Handle inspection_attach upload (image, video, pdf)
            if ($request->hasFile('inspection_attach')) {
                $file = $request->file('inspection_attach');
                $filename = time() . '_attach_' . $file->getClientOriginalName();
                $file->move($uploadPath, $filename);
                $customerInspection->inspection_attach = 'uploads/inspections/' . $filename;
            } else {
                $customerInspection->inspection_attach = $request->inspection_attach;
            }

            $customerInspection->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Inspection added successfully',
                'data' => $customerInspection
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to add inspection: ' . $e->getMessage(),
            ]);
        }
    }
}
