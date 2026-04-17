<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\CustomerReportMail;
use App\Models\Customer;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\InspectionForm;
use App\Models\InspectionAnswer;
use Illuminate\Http\Request;
use App\Models\CustomerInspection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Log;
use Mail;
class CustomerInspectionController extends Controller
{
    public function InspectionStore(Request $request)
    {
        if ($request->token !== 'rider_scanner') {
            return response()->json(
                "Invalid token Access denied"
                ,
                403
            );
        }

        DB::beginTransaction();

        try {
            $validator = Validator::make($request->all(), [
                'customer_name' => 'required|string',
                'inspection_no' => 'required|string|unique:customer_inspections,inspection_no',
                'inspection_emp_id' => 'required|string',
                'inspection_emp_name' => 'required|string',
                'inspection_emp_cell' => 'required|string',
                // 'inspection_pic' => 'required|image|mimes:jpg,png,webp|max:2048',
                // 'inspection_attach' => 'required|file|mimes:jpg,png,webp,pdf,mp4|max:10240',
                'inspection_note' => 'required|string',
                'inspection_rem_petr' => 'required',

                'answers' => 'required|array|min:1',

                'answers.*.question_id' => 'required|exists:questions,id',
                'answers.*.option_id' => 'nullable|exists:question_options,id',
                'answers.*.custom_answer' => 'nullable|string|max:1000',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    $validator->errors(),
                ], 422);
            }

            $totalQuestions = Question::count();
            if (count($request->answers) != $totalQuestions) {
                return response()->json([
                    'All questions must be answered'
                ], 422);
            }

            $questionIds = collect($request->answers)->pluck('question_id');

            if ($questionIds->count() !== $questionIds->unique()->count()) {
                return response()->json([
                    'Duplicate question answers detected'
                ], 422);
            }

            foreach ($request->answers as $answer) {
                if (!empty($answer['option_id'])) {
                    $validOption = QuestionOption::where('id', $answer['option_id'])
                        ->where('question_id', $answer['question_id'])
                        ->exists();
                    if (!$validOption) {
                        return response()->json([
                            'Invalid option for question ID ' . $answer['question_id']
                        ], 422);
                    }
                }
                if (empty($answer['option_id']) && empty($answer['custom_answer'])) {
                    return response()->json([
                        'Each question must have either an option or a custom answer'
                    ], 422);
                }
            }

            $customer = Customer::where('display_name_as', $request->customer_name)->first();

            if (!$customer) {
                return response()->json([
                    'Scan QR code Customer not found'
                ], 404);
            }

            $customerInspection = new CustomerInspection();
            $customerInspection->customers_id = $customer ? $customer->id : null;
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
                $path = $request->file('inspection_pic')->store('inspections', 'public');
                $customerInspection->inspection_pic = $path;
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



            $inspectionForm = InspectionForm::create([
                'rider_id' => $request->inspection_emp_id,
                'customer_id' => $customer->id,
                'customer_inspection_id' => $customerInspection->id,
                'submitted_at' => now(),
            ]);

            foreach ($request->answers as $answer) {
                InspectionAnswer::create([
                    'inspection_form_id' => $inspectionForm->id,
                    'question_id' => $answer['question_id'],
                    'option_id' => $answer['option_id'] ?? null,
                    'custom_answer' => $answer['custom_answer'] ?? null,
                ]);
            }

            DB::commit();

            // Load the inspection form with answers, questions, and options for email
            $inspectionForm->load('answers.question', 'answers.option');

            if ($customer->email != null && $customer->email != '') {
                Mail::to($customer->email)->send(new CustomerReportMail($customerInspection, $inspectionForm));
                // Mail::to("coding.ata@gmail.com")->send(new CustomerReportMail($customerInspection, $inspectionForm));
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Inspection stored successfully',
                'customer_inspection' => $customerInspection,
                'inspection_form' => $inspectionForm,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Inspection creation failed', [
                'error' => $e->getMessage(),
                'request' => $request->all(),
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to add inspection: ' . $e->getMessage(),
            ], 500);
        }
    }
    

    public function getQuestions()
    {
        $questions = Question::with('options')->get();

        return response()->json([
            'success' => true,
            'data' => $questions
        ]);
    }

public function getInspectionQuestions(Request $request)
    {
        $request->validate([
            'customerId' => 'required|exists:customers,id',
            'inspectionId' => 'required|exists:customer_inspections,id'
        ]);

        
        $customerId = $request->customerId;
        $inspectionId = $request->inspectionId;

        $inspection = CustomerInspection::with(['inspectionForms.answers.question.options', 'inspectionForms.answers.option'])
            ->where('customers_id', $customerId)
            ->where('id', $inspectionId)
            ->firstOrFail();

        return response()->json([
            'success' => true,
            'data' => $inspection->inspectionForms
        ]);
    }
}
