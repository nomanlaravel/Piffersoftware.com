<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Cro;
use App\Models\Hrm;
use Illuminate\Http\Request;
use App\Models\InternalDispatch;
use App\Models\InventoryArticle;
use App\Models\InventoryCategory;
use App\Models\InventoryReceived;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\InventorySubcategory;

class InternalDispatchController extends Controller
{
    public function dispatch(){

        $articles = InventoryArticle::all();
        // return $articles;
        $categories = InventoryCategory::all();
        $subcategories = InventorySubcategory::all();
        $hrmData = Hrm::where('category','guard')->get();
         $latestLot = InventoryReceived::all();
         $cros = Cro::all();
        // return $hrmData;
        return view('inventory.internal-dispatch-submission' , compact('articles','categories','subcategories','hrmData','latestLot','cros'));
    }

    public function internalDispatch(){

        $dispatches = InternalDispatch::with('issuedToGuard')->get();

        // return $dispatches;
        return view('inventory.internal-dispatch' , compact('dispatches'));
    }

    public function delete_internalDispatch($id){
        $dispatches = InternalDispatch::find($id);
        $dispatches->delete();
        return redirect()->back()->with('success','Internal Dispatch Deleted Successfully');
    }

    public function getLatestDispatchLotNumber()
    {
        // Fetch the latest lot number from the database
        $latestLot = InternalDispatch::latest('lot_number')->first();

        // Determine the last lot number or default to 'D000' if not present
        $lastLotNumber = $latestLot && !empty($latestLot->lot_number) ? $latestLot->lot_number : 'D000';

        // Return the last lot number as JSON
        return response()->json(['lastLotNumber' => $lastLotNumber]);
    }


        public function saveEntries(Request $request)
        {
            // dd($request->all());
            try {
                $request->validate([
                    'summarized_lots' => 'required|json',
                    'tracking_slip_attach' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
                    'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf',

                ]);
                $lotsToSave = json_decode($request->input('summarized_lots'), true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    return response()->json(['status' => 'error', 'message' => 'Invalid lot data format.'], 400);
                }
                $savedLotsCount = 0;
                // Handle file uploads
                $trackingSlipPath = null;
                if ($request->hasFile('tracking_slip_attach')) {
                    $file = $request->file('tracking_slip_attach');
                    $trackingSlipPath = $file->store('internal_dispatch', 'public');
                }
                $attachmentPath = null;
                if ($request->hasFile('attachment')) {
                    $file = $request->file('attachment');
                    $attachmentPath = $file->store('internal_dispatch', 'public');
                }
                foreach ($lotsToSave as $lotData) {
                    // ✅ Find inventory lot
                    $inventory = InventoryReceived::first();
                    if (!$inventory) {
                        return back()->with('error', "No inventory found for Lot Number: {$lotData['id']}");
                    }
                    $dispatchQty = is_numeric($lotData['quantity']) ? (int)$lotData['quantity'] : 0;
                    // ✅ Stock check
                    if ($dispatchQty > $inventory->quantity) {
                        return back()->with('error', "Not enough stock for Lot: {$lotData['lot_number']} (Available Quantity: {$inventory->quantity}, Requested: {$dispatchQty})");
                    }
                    // ✅ Save dispatch
                    $dispatch = new InternalDispatch();
                    $dispatch->lot_id = $inventory->id;
                    $dispatch->cro_id = $lotData['cro_id'] ?? null;
                    $dispatch->category = $lotData['category'] ?? null;
                    $dispatch->sub_category = $lotData['sub_category'] ?? null;
                    $dispatch->article_name = $lotData['article_name'] ?? null;
                    $dispatch->lot_number = $lotData['lot_number'] ?? null;
                    $dispatch->condition = $lotData['condition'] ?? null;
                    $dispatch->date = $lotData['date'] ?? null;
                    $dispatch->issued_to = $lotData['issued_to'] ?? null;
                    $dispatch->item_name = $lotData['item_name'] ?? null;
                    $dispatch->item_code = $lotData['item_code'] ?? null;
                    $dispatch->description = $lotData['description'] ?? null;
                    $dispatch->size = $lotData['size'] ?? null;
                    $dispatch->article_number = $lotData['article_number'] ?? null;
                    $dispatch->quantity = $dispatchQty;
                    $dispatch->price_per_unit = is_numeric($lotData['price_per_unit']) ? (float)$lotData['price_per_unit'] : null;
                    $dispatch->total_price = is_numeric($lotData['total_price']) ? (float)$lotData['total_price'] : null;
                    $dispatch->dispatch_through = $lotData['dispatch_through'] ?? null;
                    $dispatch->tracking_id = $lotData['tracking_id'] ?? null;
                    $dispatch->dispatcher_name = $lotData['dispatcher_name'] ?? null;
                    $dispatch->dispatcher_employee_id = $lotData['dispatcher_employee_id'] ?? null;
                    $dispatch->dispatcher_cell_no = $lotData['dispatcher_cell_no'] ?? null;
                    $dispatch->receiver_name = $lotData['receiver_name'] ?? null;
                    $dispatch->receiver_employee_id = $lotData['receiver_employee_id'] ?? null;
                    $dispatch->receiver_cell_no = $lotData['receiver_cell_no'] ?? null;
                    $dispatch->notes = $lotData['notes'] ?? null;
                    $dispatch->tracking_slip_attach = $trackingSlipPath;
                    $dispatch->attachment = $attachmentPath;
                    $dispatch->save();
                    // ✅ Decrement stock
                    $inventory->decrement('quantity', $dispatchQty);
                    $savedLotsCount++;
                }
                return redirect()->back()->with('success', "{$savedLotsCount} Lot(s) dispatched successfully.");
            } catch (\Illuminate\Validation\ValidationException $e) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation failed',
                    'errors' => $e->errors()
                ], 422);
            } catch (\Exception $e) {
                Log::error('Error in saveEntries: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
                return response()->json(['status' => 'error', 'message' => 'An unexpected error occurred: ' . $e->getMessage()], 500);
            }
        }


}
