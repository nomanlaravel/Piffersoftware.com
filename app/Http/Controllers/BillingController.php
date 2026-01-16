<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\BillingProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

use App\Models\Customer;

class BillingController extends Controller
{
    public function billing()
    {
        $billings = Billing::all();
        return view('billing.billing', compact('billings'));
    }

    public function billingSubmission()
    {
        return view('billing.billing-submission');
    }

    public function submitBilling(Request $request)
    {
        DB::beginTransaction();

        try {
            $billingData = $request->except('_token');
            $billing = Billing::create($billingData);

            $billingProductData = $request->only([
                'serial_no',
                'types',
                'sizes',
                'quantity',
                'unit_price',
                'tax',
                'total',
                'remarks'
            ]);

            $billingProductDataArray = [];
            foreach ($billingProductData['serial_no'] as $index => $serialNo) {
                $billingProductDataArray[] = [
                    'serial_no' => $serialNo,
                    'types' => $billingProductData['types'][$index],
                    'sizes' => $billingProductData['sizes'][$index],
                    'quantity' => $billingProductData['quantity'][$index],
                    'unit_price' => $billingProductData['unit_price'][$index],
                    'tax' => $billingProductData['tax'][$index],
                    'total' => $billingProductData['total'][$index],
                    'remarks' => $billingProductData['remarks'][$index],
                ];
            }
            $billing->billingProducts()->createMany($billingProductDataArray);
            DB::commit();

            $billingId = $billing->id;

            Log::info('Billing data successfully updated. Billing ID: ' . $billingId);
            if ($request->has('save_and_email')) {
                $url = route('view.billing', ['id' => $billingId]);
                return redirect()->to($url)->with('success', 'Billing data updated.');
            } elseif ($request->has('save_and_share')) {
                return redirect()->route('billing.submission')->with('success', 'Billing updated successfully.')->with('billingId', $billingId);
            } elseif ($request->has('save_and_new')) {
                return redirect()->route('billing.submission')->with('success', 'Billing updated successfully.');
            } else {
                return redirect()->route('billing')->with('success', 'Billing data updated successfully.');
            }

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('An error occurred while saving Billing data: ' . $e->getMessage());
            return redirect()->with('error', 'An error occurred while saving data.');
        }
    }

    public function editBilling($id)
    {
        $billing = Billing::findOrFail($id);
        return view('billing.edit-billing', compact('billing'));
    }

    public function updateBilling(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $billingData = $request->except('_token', 'billingProducts');

            $billing = Billing::findOrFail($id);


            $billing->update($billingData);

            $billingProductData = $request->input('billingProducts');

            foreach ($billingProductData as $billingProductDatum) {
                $billingProductId = $billingProductDatum['p_id'] ?? null;

                if (empty($billingProductId)) {
                    $billing->billingProducts()->create($billingProductDatum);
                } else {
                    $billingProduct = BillingProduct::find($billingProductId);
                    if ($billingProduct) {
                        $billingProduct->update($billingProductDatum);
                    }
                }
            }

            DB::commit();

            $billingId = $billing->id;

            Log::info('Billing data successfully updated. Billing ID: ' . $billingId);
            if ($request->has('save_and_email')) {
                $url = route('view.billing', ['id' => $billingId]);
                return redirect()->to($url)->with('success', 'Billing data updated.');
            } elseif ($request->has('save_and_share')) {
                return redirect()->route('billing.submission')->with('success', 'Billing updated successfully.')->with('billingId', $billingId);
            } elseif ($request->has('save_and_new')) {
                return redirect()->route('billing.submission')->with('success', 'Billing updated successfully.');
            } else {
                return redirect()->route('billing')->with('success', 'Billing data updated successfully.');
            }
            ;

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('An error occurred while saving Purchase Order data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while saving Purchase Order data.');
        }
    }

    public function viewBilling($id)
    {
        $billing = Billing::findOrFail($id);
        return view('billing.view-billing', compact('billing'));
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

            $customerRecipient = Customer::where('email', $email)->first();
            if ($customerRecipient && $customerRecipient->notification_status != 1) {
                return response()->json(['message' => 'Customer notification_status is OFF.'], 200);
            }

            Mail::send([], [], function ($message) use ($email, $cc, $bcc, $subject, $body, $pdf) {
                $message->to($email)
                    ->subject($subject);

                if (!empty($cc)) {
                    $message->cc($cc);
                }

                if (!empty($bcc)) {
                    $message->bcc($bcc);
                }

                $message->attach($pdf, ['as' => 'billing_information.pdf'])
                    ->text($body);
            });

            return response()->json(['message' => 'Email sent successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to send email.'], 500);
        }
    }

}
