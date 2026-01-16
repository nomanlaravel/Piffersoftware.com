<?php

use App\Http\Controllers\TrainingController;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
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
Route::get('/customer-data/{id}', [CustomerController::class, 'getCustomerData']);
Route::get('all/customer-data', [CustomerController::class, 'getallCustomerData']);


// Testing purpose only
Route::get('/customer', [TrainingController::class, 'sendInactiveEmail']);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
