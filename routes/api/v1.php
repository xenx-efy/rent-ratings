<?php

use App\Actions\v1\GetEvaluationCriteriaAction;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\ReviewController;
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

Route::get('evaluation-criteria', GetEvaluationCriteriaAction::class);

Route::post('buildings', [BuildingController::class, 'findOrCreate']);

Route::get('buildings/{id}/apartments', [BuildingController::class, 'getApartments']);

Route::get('apartments/{id}', [ApartmentController::class, 'get']);

Route::get('apartments/{id}/reviews', [ApartmentController::class, 'getReviews']);

Route::post('reviews', [ReviewController::class, 'post']);
