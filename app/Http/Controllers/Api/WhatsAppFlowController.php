<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WhatsAppFlowController extends Controller
{
    /**
     * Handle WhatsApp Flow response data from NeuAPIx.
     * 
     * This endpoint receives feedback survey data when a customer
     * completes the WhatsApp feedback flow (feedbacks_flow).
     * 
     * NeuAPIx sends the flow response as a POST request to:
     * https://piffersoftware.com/api/whatsapp/flow-response
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleFlowResponse(Request $request)
    {
        Log::info('WhatsApp Flow Response received [VERSION 2.0]:', [
            'all_data' => $request->all(),
            'body_raw' => $request->getContent(),
            'headers' => $request->headers->all(),
        ]);

        try {
            // NeuAPIx can send flow data in different structures.
            // Common structures:
            // 1. Direct: { "phone": "923404556573", "q1": 5, ... }
            // 2. Nested: { "flow_token": "...", "response": { "q1": 5, ... } }
            // 3. With contact info: { "contact": { "wa_id": "923404556573" }, "data": { ... } }

            $flowData = $request->all();

            // Extract the phone number from various possible locations
            $phone = $this->extractPhone($flowData);

            // Extract the response/answers data
            $responseData = $this->extractResponseData($flowData);

            Log::info('WhatsApp Flow parsed data:', [
                'phone' => $phone,
                'response_data' => $responseData,
            ]);

            // Find the customer by phone number
            $customer = null;
            if ($phone) {
                $normalizedPhone = $this->normalizePhone($phone);
                $searchSuffix = substr($normalizedPhone, -10);
                
                $customer = Customer::where(function($query) use ($searchSuffix) {
                    $query->where('phone', 'LIKE', '%' . $searchSuffix . '%')
                        ->orWhere('whatsapp_number', 'LIKE', '%' . $searchSuffix . '%')
                        ->orWhere('poc_cell', 'LIKE', '%' . $searchSuffix . '%');
                })->first();
            }

            if (!$customer) {
                Log::warning('WhatsApp Flow: Customer not found for phone', [
                    'phone' => $phone,
                ]);

                return response()->json([
                    'status' => 'error',
                    'message' => 'Feedback received but customer not found. Data not stored due to database constraints.',
                    'phone_received' => $phone,
                ], 404);
            }

            // Create feedback linked to the customer
            $feedback = CustomerFeedback::create([
                'customers_id' => $customer->id,
                'feed_client_name' => $customer->customers_name,
                'feed_client_id' => $customer->customers_id,
                'feed_client_email' => $customer->email,
                'feed_client_poc_name' => $customer->poc_name ?? $responseData['name'] ?? null,
                'feed_cell' => $phone,
                'feed_desig' => $responseData['designation'] ?? $responseData['desig'] ?? null,
                'feed_date' => now()->format('Y-m-d'),
                'feed_month' => now()->format('F Y'),
                'feed_received' => 'WhatsApp Flow',
                'feed_company_name' => $customer->customers_name,
                'feed_poc_name' => $responseData['poc_name'] ?? $responseData['name'] ?? $customer->poc_name ?? null,
                'feed_email' => $responseData['email'] ?? $customer->email ?? null,
                'feed_telephone' => $phone,
                'q1' => $responseData['q1'] ?? null,
                'q2' => $responseData['q2'] ?? null,
                'q3' => $responseData['q3'] ?? null,
                'q4' => $responseData['q4'] ?? null,
                'q5' => $responseData['q5'] ?? null,
                'q6' => $responseData['q6'] ?? null,
                'q7' => $responseData['q7'] ?? null,
                'q8' => $responseData['q8'] ?? null,
                'q9' => $responseData['q9'] ?? null,
                'q10' => $responseData['q10'] ?? null,
                'total_score' => $this->calculateTotalScore($responseData),
                'feed_comment' => $responseData['comments'] ?? $responseData['feedback'] ?? $responseData['comment'] ?? null,
                'feed_remarks' => 'Submitted via WhatsApp Feedback Flow',
            ]);

            // Update customer record with info from flow if provided
            $customerUpdateData = [];
            if (!empty($responseData['name']) || !empty($responseData['poc_name'])) {
                $customerUpdateData['poc_name'] = $responseData['poc_name'] ?? $responseData['name'];
            }
            if (!empty($responseData['designation']) || !empty($responseData['desig'])) {
                $customerUpdateData['poc_desig'] = $responseData['designation'] ?? $responseData['desig'];
            }
            if (!empty($responseData['email'])) {
                $customerUpdateData['poc_email'] = $responseData['email'];
            }

            if (!empty($customerUpdateData)) {
                $customer->update($customerUpdateData);
            }

            Log::info('WhatsApp Flow: Feedback stored successfully', [
                'feedback_id' => $feedback->id,
                'customer_id' => $customer->id,
                'customer_name' => $customer->customers_name,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Feedback stored successfully.',
                'feedback_id' => $feedback->id,
                'customer_id' => $customer->id,
            ], 200);

        } catch (\Throwable $e) {
            Log::error('WhatsApp Flow: Error processing flow response', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all(),
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to process feedback: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Extract phone number from various flow data structures.
     */
    private function extractPhone(array $data): ?string
    {
        // Direct phone field
        if (!empty($data['phone'])) return $data['phone'];
        if (!empty($data['wa_id'])) return $data['wa_id'];
        if (!empty($data['from'])) return $data['from'];
        if (!empty($data['customer_phone'])) return $data['customer_phone'];

        // Nested in contact object
        if (!empty($data['contact']['wa_id'])) return $data['contact']['wa_id'];
        if (!empty($data['contact']['phone'])) return $data['contact']['phone'];

        // Nested in contacts array (Meta/WhatsApp webhook format)
        if (!empty($data['contacts'][0]['wa_id'])) return $data['contacts'][0]['wa_id'];

        // NeuAPIx specific structures
        if (!empty($data['recipient'])) return $data['recipient'];
        if (!empty($data['customer_no'])) return $data['customer_no'];
        if (!empty($data['customer']['customerNo'])) return $data['customer']['customerNo'];
        if (!empty($data['customer']['customer_no'])) return $data['customer']['customer_no'];

        return null;
    }

    /**
     * Extract response/answer data from various flow data structures.
     */
    private function extractResponseData(array $data): array
    {
        // Direct response data
        if (!empty($data['response']) && is_array($data['response'])) {
            return $data['response'];
        }

        // Nested in data key
        if (!empty($data['data']) && is_array($data['data'])) {
            return $data['data'];
        }

        // Nested in flow_reply
        if (!empty($data['flow_reply']) && is_array($data['flow_reply'])) {
            return $data['flow_reply'];
        }

        // NeuAPIx nfmReply body (the response JSON is often in a 'body' field)
        if (!empty($data['body']) && is_string($data['body'])) {
            $decoded = json_decode($data['body'], true);
            if (is_array($decoded)) return $decoded;
        }

        // Sometimes it's in a 'text' field if NeuAPIx flattens it
        if (!empty($data['text']) && is_string($data['text'])) {
            $decoded = json_decode($data['text'], true);
            if (is_array($decoded)) return $decoded;
        }

        // Look into messages array (standard webhook structure)
        if (!empty($data['messages'][0]['interactive']['nfm_reply']['response_json'])) {
            $decoded = json_decode($data['messages'][0]['interactive']['nfm_reply']['response_json'], true);
            if (is_array($decoded)) return $decoded;
        }

        // NeuAPIx nfmReply structure in 'message' object
        if (!empty($data['message']['text']) && is_string($data['message']['text'])) {
            $decoded = json_decode($data['message']['text'], true);
            if (is_array($decoded)) return $decoded;
        }

        // Check for 'response' field inside message (sometimes used)
        if (!empty($data['message']['response']) && is_array($data['message']['response'])) {
            return $data['message']['response'];
        }
        
        if (!empty($data['message']['response']) && is_string($data['message']['response'])) {
            $decoded = json_decode($data['message']['response'], true);
            if (is_array($decoded)) return $decoded;
        }

        // If the data itself contains q1-q10 keys, it IS the response data
        if (isset($data['q1']) || isset($data['q2'])) {
            return $data;
        }

        // Deep hunt: if we still don't have answers, search the whole array for 'q1'
        if (empty($data['q1']) && empty($data['q2'])) {
            foreach ($data as $key => $value) {
                if (is_array($value) && (isset($value['q1']) || isset($value['q2']))) {
                    return $value;
                }
                if (is_string($value)) {
                    $decoded = json_decode($value, true);
                    if (is_array($decoded) && (isset($decoded['q1']) || isset($decoded['q2']))) {
                        return $decoded;
                    }
                }
            }
        }

        // Fallback: return everything (minus metadata keys)
        $excludeKeys = ['phone', 'wa_id', 'from', 'contact', 'contacts', 'flow_token', 'recipient', 'type', 'timestamp', 'platform', 'accountNo', 'customer', 'status', 'message', 'timeStamp'];
        return array_diff_key($data, array_flip($excludeKeys));
    }

    /**
     * Calculate total score from question answers.
     */
    private function calculateTotalScore(array $data): ?string
    {
        $total = 0;
        $answered = 0;

        for ($i = 1; $i <= 10; $i++) {
            if (isset($data["q{$i}"]) && is_numeric($data["q{$i}"])) {
                $total += (int) $data["q{$i}"];
                $answered++;
            }
        }

        return $answered > 0 ? (string) $total : null;
    }

    /**
     * Normalize phone number (strip non-digits, handle Pakistan format).
     */
    private function normalizePhone(?string $phone): string
    {
        if (!$phone) return '';

        $phone = preg_replace('/\D+/', '', $phone);

        if (str_starts_with($phone, '0')) {
            $phone = '92' . substr($phone, 1);
        } elseif (str_starts_with($phone, '3') && strlen($phone) === 10) {
            $phone = '92' . $phone;
        }

        return $phone;
    }
}
