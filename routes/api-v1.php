<?php

use App\Actions\v1\GetApartment;
use App\Actions\v1\FindOrCreateBuildingAction;
use App\Actions\v1\GetApartmentReviews;
use App\Actions\v1\GetBuildingApartments;
use App\Actions\v1\GetEvaluationCriteriaAction;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\ReviewController;
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

Route::post('buildings', FindOrCreateBuildingAction::class);

Route::get('buildings/{id}/apartments', GetBuildingApartments::class);

Route::get('apartments/{id}', GetApartment::class);

Route::get('apartments/{id}/reviews', GetApartmentReviews::class);

Route::post('reviews', [ReviewController::class, 'post']);
