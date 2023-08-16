<?php

use App\Actions\v1\CreateReviewAction;
use App\Actions\v1\GetApartmentReviewsAction;
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


Route::get('apartments/{id}/reviews', GetApartmentReviewsAction::class);

Route::post('reviews', CreateReviewAction::class);
