<?php

namespace App\Http\Controllers;

use App\Models\InspectionAnswer;
use App\Models\InspectionForm;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InspectionController extends Controller
{
    /**
     * Get all questions with their options.
     */
    public function getQuestions()
    {
        $questions = Question::with('options')->get();

        return response()->json([
            'success' => true,
            'data' => $questions
        ]);
    }

    /**
     * Start a new inspection session.
     */
    public function startInspection(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rider_id' => 'required|exists:users,id',
            'customer_id' => 'required|exists:customers,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $form = InspectionForm::create([
            'rider_id' => $request->rider_id,
            'customer_id' => $request->customer_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Inspection started successfully',
            'inspection_form_id' => $form->id
        ]);
    }

    /**
     * Submit answers for an inspection form.
     */
    public function submitAnswers(Request $request, $id)
    {
        $form = InspectionForm::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|exists:questions,id',
            'answers.*.option_id' => 'nullable|exists:question_options,id',
            'answers.*.custom_answer' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        foreach ($request->answers as $answer) {
            InspectionAnswer::create([
                'inspection_form_id' => $form->id,
                'question_id' => $answer['question_id'],
                'option_id' => $answer['option_id'] ?? null,
                'custom_answer' => $answer['custom_answer'] ?? null,
            ]);
        }

        $form->update(['submitted_at' => now()]);

        return response()->json([
            'success' => true,
            'message' => 'Answers submitted successfully'
        ]);
    }

    /**
     * Get inspection results by rider and customer.
     */
    public function getResults(Request $request)
    {
        $query = InspectionForm::with(['rider', 'customer', 'answers.question', 'answers.option']);

        if ($request->has('rider_id')) {
            $query->where('rider_id', $request->rider_id);
        }

        if ($request->has('customer_id')) {
            $query->where('customer_id', $request->customer_id);
        }

        $results = $query->latest()->get();

        return response()->json([
            'success' => true,
            'data' => $results
        ]);
    }
}
