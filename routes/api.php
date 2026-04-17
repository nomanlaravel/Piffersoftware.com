<?php

use App\Http\Controllers\HrmController;
use App\Http\Controllers\TrainingController;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InspectionController;
use App\Http\Controllers\Api\CustomerInspectionController;
use App\Http\Controllers\Api\WhatsAppFlowController;
use App\Models\Customer;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// routes/api.php
Route::get('is-hrm', [HrmController::class, 'IsHrm']);


Route::get('/customer-data/{id}', [CustomerController::class, 'getCustomerData']);
Route::get('all/customer-data', [CustomerController::class, 'getallCustomerData']);


// Testing purpose only
Route::get('/customer', [TrainingController::class, 'sendInactiveEmail']);

Route::post('/customer-inspection', [CustomerInspectionController::class, 'InspectionStore']);
Route::post('/customer/inspection/questions', [CustomerInspectionController::class, 'getInspectionQuestions']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// WhatsApp Flow Response Endpoint (NeuAPIx Webhook)
// This receives feedback data when a customer completes the WhatsApp feedback flow
Route::post('/whatsapp/flow-response', [WhatsAppFlowController::class, 'handleFlowResponse']);

Route::prefix('inspections')->group(function () {
    Route::get('/questions', [CustomerInspectionController::class, 'getQuestions']);
    Route::post('/start', [InspectionController::class, 'startInspection']);
    Route::post('/{id}/submit', [InspectionController::class, 'submitAnswers']);
    Route::get('/results', [InspectionController::class, 'getResults']);
});
