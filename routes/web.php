<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->middleware('guest');

Route::view('/dashboard', 'dashboard')
    ->name('dashboard');

// ____ Async ______
Route::get('/promotions', [BusinessController::class, 'index'])->name('businesses.index');
Route::get('/categories', [BusinessController::class, 'categories'])->name('map.categories');

Route::get('/businesses/{business:name}', [BusinessController::class, 'show'])
    ->name('businesses.show');

Route::get('/businesses/{business:name}/ratings', [BusinessController::class, 'ratings'])
    ->name('businesses.ratings');

Route::middleware('auth')->group(function () {

    Route::post('/businesses/{business:name}/ratings', [BusinessController::class, 'ratingStore'])
        ->name('ratings.store');

    Route::get('/businesses/ratings/{rating}', [BusinessController::class, 'ratingDelete'])
        ->name('ratings.delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
