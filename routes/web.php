<?php

use App\Actions\v1\CreateReviewAction;
use App\Http\Controllers\ApartmentPageController;
use App\Http\Controllers\CreateReviewPageController;
use App\Http\Controllers\HousePageController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', static function () {
    return Inertia::render('Home', ['host' => request()->host()]);
})->name('home');

Route::post('/house', [HousePageController::class, 'post']);

Route::get('/house', [HousePageController::class, 'get'])->name('house');

Route::get('/apartment/{id}', [ApartmentPageController::class, 'get'])->name('apartment');

Route::get('/address-search', static function () {
    return Inertia::render('HouseSearch');
})->name('addressSearch');

Route::post('/create-review', [CreateReviewPageController::class, 'post']);
Route::get('/create-review', [CreateReviewPageController::class, 'get'])->name('createReview');

Route::post('/reviews', CreateReviewAction::class);
