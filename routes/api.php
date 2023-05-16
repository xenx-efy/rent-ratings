<?php

use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\EvaluationCriteriaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['client'])->group(function () {
    Route::get('evaluation-criteria', [EvaluationCriteriaController::class, 'get']);

    Route::post('buildings', [BuildingController::class, 'findOrCreate']);

    Route::get('buildings/{id}/apartments', [BuildingController::class, 'getApartments']);

    Route::get('apartments/{id}', [ApartmentController::class, 'get']);
});
