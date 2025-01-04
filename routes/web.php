<?php

use App\Http\Controllers\MapController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->middleware('guest');

// ____ Async ______
Route::get('/promotions', [MapController::class, 'promotions'])->name('map.promotions');
Route::get('/categories', [MapController::class, 'categories'])->name('map.categories');

// _____ Promotions ______
Route::get('/promociones', [MapController::class, 'index'])->name('home');
Route::get('/promociones/{promotion}', [MapController::class, 'promotion'])->name('promotions.show');

// _____ Branches _______
Route::get('/sucursales/{name}', [MapController::class, 'branchPromotions'])->name('branches.promotions');
Route::get('/sucursales/{name}/valoraciones', [MapController::class, 'branchRatings'])->name('branches.ratings');

// ______ Ratings ______
Route::middleware('auth')->group(function () {
    Route::post('/sucursal/{branch:name}/valoraciones', [MapController::class, 'ratingStore'])
        ->name('ratings.store');

    Route::get('sucursales/valoraciones/{rating}', [MapController::class, 'ratingDelete'])
        ->name('ratings.delete');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
