<?php

use App\Actions\v1\GetApartmentAction;
use App\Actions\v1\GetHouseApartments;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', static function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/house', GetHouseApartments::class)->name('house');

Route::get('/apartment/{id}', GetApartmentAction::class)->name('apartment');

Route::get('/create-review', static function () {
    return Inertia::render('CreateReview');
});

Route::get('/create-review-1', static function () {
    return Inertia::render('CreateReview1');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
