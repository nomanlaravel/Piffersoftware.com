<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\Mail;

class PurchaseOrderController extends Controller
{

    public function purchaseOrder(){
        $purchaseOrders = PurchaseOrder::all();
        return view('purchaseOrder.puchaseOrder' , compact('purchaseOrders'));
    }

    public function purchaseOrderSubmission(){
        return view('purchaseOrder.purchase-order-submission');
    }

    public function submitPurchaseOrder(Request $request)
    {
        DB::beginTransaction();

        try {
            $purchaseOrderData = $request->except('_token');
            $purchaseOrder = PurchaseOrder::create($purchaseOrderData);
            $purchaseOrderProductData = $request->only([
                'serial_no', 'types', 'sizes', 'quantity', 'unit_price', 'tax', 'total', 'remarks'
            ]);

            $purchaseOrderProductDataArray = [];
                foreach ($purchaseOrderProductData['serial_no'] as $index => $serialNo) {
                if (isset($purchaseOrderProductData['types'][$index])) {
                    $purchaseOrderProductDataArray[] = [
                        'serial_no' => $serialNo,
                        'types' => $purchaseOrderProductData['types'][$index] ?? null,
                        'sizes' => $purchaseOrderProductData['sizes'][$index] ?? null,
                        'quantity' => $purchaseOrderProductData['quantity'][$index] ?? null,
                        'unit_price' => $purchaseOrderProductData['unit_price'][$index] ?? null,
                        'tax' => $purchaseOrderProductData['tax'][$index] ?? null,
                        'total' => $purchaseOrderProductData['total'][$index] ?? null,
                        'remarks' => $purchaseOrderProductData['remarks'][$index] ?? null,
                    ];
                }
            }

            $purchaseOrder->purchaseOrderProducts()->createMany($purchaseOrderProductDataArray);
            DB::commit();

            $purchaseOrderId = $purchaseOrder->id;

            Log::info('Customer data successfully updated. Customer ID: ' . $purchaseOrderId);
            if ($request->has('save_and_email')) {
                $url = route('view.purchase.order', ['id' => $purchaseOrderId]);
                return redirect()->to($url)->with('success', 'Purchase Order data updated.');
            } elseif ($request->has('save_and_share')) {
                return redirect()->route('purchase.order.submission')->with('success', 'Purchase Order updated successfully.')->with('purchaseOrderId', $purchaseOrderId);
            } elseif ($request->has('save_and_new')) {
                return redirect()->route('purchase.order.submission')->with('success', 'Purchase Order updated successfully.');
            } else {
                return redirect()->route('purchase.order')->with('success', 'Purchase Order data updated successfully.');
            }

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('An error occurred while saving Purchase Order data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while saving data.');
        }
    }

    public function editPurchaseOrderSubmission($id){
        $purchaseOrder = PurchaseOrder::findOrFail($id);
        return view('purchaseOrder.edit-purchase-order' , compact('purchaseOrder'));
    }

    public function updatePurchaseOrder(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $purchaseOrderData = $request->except('_token', 'purchaseOrderProducts');

            $purchaseOrder = PurchaseOrder::findOrFail($id);


            $purchaseOrder->update($purchaseOrderData);

            $purchaseOrderProductData = $request->input('purchaseOrderProducts');

            foreach ($purchaseOrderProductData as $purchaseOrderProductDatum) {
                $purchaseOrderProductId = $purchaseOrderProductDatum['p_id'] ?? null;

                if (empty($purchaseOrderProductId)) {
                    $purchaseOrder->purchaseOrderProducts()->create($purchaseOrderProductDatum);
                } else {
                    $purchaseOrderProduct = PurchaseOrderProduct::find($purchaseOrderProductId);
                    if ($purchaseOrderProduct) {
                        $purchaseOrderProduct->update($purchaseOrderProductDatum);
                    }
                }
            }

            DB::commit();

            $purchaseOrderId = $purchaseOrder->id;

            Log::info('Customer data successfully updated. Customer ID: ' . $purchaseOrderId);
            if ($request->has('save_and_email')) {
                $url = route('view.purchase.order', ['id' => $purchaseOrderId]);
                return redirect()->to($url)->with('success', 'Purchase Order data updated.');
            } elseif ($request->has('save_and_share')) {
                return redirect()->route('purchase.order.submission')->with('success', 'Purchase Order updated successfully.')->with('purchaseOrderId', $purchaseOrderId);
            } elseif ($request->has('save_and_new')) {
                return redirect()->route('purchase.order.submission')->with('success', 'Purchase Order updated successfully.');
            } else {
                return redirect()->route('purchase.order')->with('success', 'Purchase Order data updated successfully.');
            }

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('An error occurred while saving Purchase Order data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while saving Purchase Order data.');
        }
    }

    public function viewPurchaseOrder($id){
        $purchaseOrder = PurchaseOrder::findOrFail($id);
        return view('purchaseOrder.view-purchase-order' , compact('purchaseOrder'));
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

                if (!empty($cc)) {
                    $message->cc($cc);
                }

                if (!empty($bcc)) {
                    $message->bcc($bcc);
                }

                $message->attach($pdf, ['as' => 'purchase_information.pdf'])
                    ->text($body);
            });

            return response()->json(['message' => 'Email sent successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to send email.'], 500);
        }
    }



}
