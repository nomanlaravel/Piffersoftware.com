<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Requisition;
use App\Models\ReqReport;
use Exception;
use Illuminate\Support\Facades\DB;


class RequisitionController extends Controller
{
    public function req(){
         $reqs = Requisition::with('reqreports')->get();

        return view('requisition.req', compact('reqs'));
    }

    public function postreq(){
        return view('requisition.postreq');
    } 
    
    public function submitreq(Request $request)
    {
        DB::beginTransaction();
    
        try {
            $reqData = $request->only([
                'demand_person_name',
                'demand_employee_id',
                'demand_person_cell',
                 'demand_raised_by',
                'demand_raised_to',
            ]);
    
            $req = Requisition::create($reqData);
    
            $reportData = $request->only([
                'date', 'requisition_no', 'item_name', 'item_code', 'quantity', 'description', 'manufacturing',
                'size', 'article_no', 'any_special_ins', 'notes', 'attachments'
            ]);
    
            $reportDataArray = [];
    
            foreach ($reportData['date'] as $index => $date) {
                // Check if all required keys are present
                if (isset($reportData['item_name'][$index], $reportData['item_code'][$index], $reportData['quantity'][$index])) {
                    $reportDataRow = [
                        'date' => $date,
                        'requisition_no' => $reportData['requisition_no'][$index],
                        'item_name' => $reportData['item_name'][$index],
                        'item_code' => $reportData['item_code'][$index],
                        'quantity' => $reportData['quantity'][$index],
                        'description' => $reportData['description'][$index] ?? null,
                        'manufacturing' => $reportData['manufacturing'][$index] ?? null,
                        'size' => $reportData['size'][$index] ?? null,
                        'article_no' => $reportData['article_no'][$index] ?? null,
                        'any_special_ins' => $reportData['any_special_ins'][$index] ?? null,
                        'notes' => $reportData['notes'][$index] ?? null,
                        'requisition_id' => $req->id, // Add the foreign key
                    ];
    
                    // Handle file upload
                    if ($request->hasFile('attachments') && isset($request->attachments[$index])) {
                        $file = $request->attachments[$index];
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $reportDataRow['attachments'] = 'uploads/images/' . $file_name;
                    }
    
                    $reportDataArray[] = $reportDataRow;
                }
            }
    
            ReqReport::insert($reportDataArray);
    
            DB::commit();
            
            $requisitionId = $req->id;

            if ($request->has('save_and_email')) {
                $url = route('view.req', ['id' => $requisitionId]);
                return redirect()->to($url)->with('success', 'Vendor data successfully stored.');
            } elseif ($request->has('save_and_share')) {
                return redirect()->route('postreq')->with('success', 'Vendor data successfully stored.')->with('requisitionId', $requisitionId);
            } elseif ($request->has('save_and_new')) {
                return redirect()->route('postreq')->with('success', 'Vendor data successfully stored.');
            } else {
                return redirect()->route('req')->with('success', 'Vendor data successfully stored.');
            }
    
        } catch (Exception $e) {
            DB::rollback();
    
            Log::error('Error occurred while submitting requisition: ' . $e->getMessage());
    
            return redirect()->back()->with('error', 'Failed to submit requisition. Please try again.');
        }
    }

    
    public function editreq($id)
    {
        $requisition = Requisition::with('reqreports')->findOrFail($id);
        return view('requisition.editreq', compact('requisition'));
    }
    
    public function viewreq($id)
    {
        $requisition = Requisition::with('reqreports')->findOrFail($id);
        return view('requisition.viewreq', compact('requisition'));
    }
    
    public function updatereq(Request $request, $id)
    {
        // Find the requisition by ID
        $requisition = Requisition::findOrFail($id);
    
        // Update the requisition details
        $requisition->demand_person_name = $request->input('demand_person_name');
        $requisition->demand_employee_id = $request->input('demand_employee_id');
        $requisition->demand_person_cell = $request->input('demand_person_cell');
        $requisition->demand_raised_by = $request->input('demand_raised_by');
        $requisition->demand_raised_to = $request->input('demand_raised_to');
        $requisition->save();
    
        // Handle requisition reports
        if ($request->has('reqreports')) {
            foreach ($request->input('reqreports') as $index => $reportData) {
                $reportId = $reportData['r_id'] ?? 0; // Check if report ID exists for update
                $report = ReqReport::findOrNew($reportId); // Find existing or create new report
    
                // Update report fields
                $report->date = $reportData['date'];
                $report->requisition_no = $reportData['requisition_no'];
                $report->item_name = $reportData['item_name'];
                $report->item_code = $reportData['item_code'];
                $report->quantity = $reportData['quantity'];
                $report->description = $reportData['description'];
                $report->manufacturing = $reportData['manufacturing'];
                $report->size = $reportData['size'];
                $report->article_no = $reportData['article_no'];
                $report->any_special_ins = $reportData['any_special_ins'];
                $report->notes = $reportData['notes'];
    
                // Handle file attachment if provided
                if (isset($reportData['attachments'])) {
                    $attachment = $request->file("reqreports.${index}.attachments");
                    $attachmentPath = $attachment->store('attachments'); // Store attachment and get path
                    $report->attachments = $attachmentPath;
                }
    
                $report->requisition_id = $requisition->id;
                $report->save();
            }
        }
    
        $requisitionId = $requisition->id;

        if ($request->has('save_and_email')) {
            $url = route('view.req', ['id' => $requisitionId]);
            return redirect()->to($url)->with('success', 'Vendor data successfully stored.');
        } elseif ($request->has('save_and_share')) {
            return redirect()->route('postreq')->with('success', 'Vendor data successfully stored.')->with('requisitionId', $requisitionId);
        } elseif ($request->has('save_and_new')) {
            return redirect()->route('postreq')->with('success', 'Vendor data successfully stored.');
        } else {
            return redirect()->route('req')->with('success', 'Vendor data successfully stored.');
        }
    }
    
    public function deletereq($id){
         $requisition = Requisition::findOrFail($id);
         $requisition->delete();
          return redirect()->route('req')->with('success', 'Requisition deleted successfully.');
         
    }



}
