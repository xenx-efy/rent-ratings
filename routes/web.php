<?php

use App\Actions\v1\CreateReviewAction;
use App\Actions\v1\FindOrCreateHouse;
use App\Actions\v1\GetApartmentAction;
use App\Actions\v1\GetHouseApartments;
use App\Http\Controllers\CreateReviewController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', static function () {
    return Inertia::render('Home');
})->name('home');

Route::post('/house', FindOrCreateHouse::class);

Route::get('/house', GetHouseApartments::class)->name('house');

Route::get('/apartment/{id}', GetApartmentAction::class)->name('apartment');

Route::get('/address-search', static function () {
    return Inertia::render('HouseSearch');
});

Route::post('/create-review', [CreateReviewController::class, 'post']);
Route::get('/create-review', [CreateReviewController::class, 'get'])->name('createReview');

Route::post('/reviews', CreateReviewAction::class);
