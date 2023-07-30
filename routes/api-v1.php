<?php

use App\Actions\v1\CreateReviewAction;
use App\Actions\v1\GetApartmentAction;
use App\Actions\v1\FindOrCreateHouse;
use App\Actions\v1\GetApartmentReviewsAction;
use App\Actions\v1\GetHouseApartments;
use App\Actions\v1\GetEvaluationCriteriaAction;
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

Route::post('buildings', FindOrCreateHouse::class);

Route::get('buildings/{id}/apartments', GetHouseApartments::class);

Route::get('apartments/{id}', GetApartmentAction::class);

Route::get('apartments/{id}/reviews', GetApartmentReviewsAction::class);

Route::post('reviews', CreateReviewAction::class);
