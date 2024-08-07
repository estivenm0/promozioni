<?php

use App\Http\Controllers\MapController;
use App\Http\Controllers\ProfileController;
use App\Models\Promotion;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::get('/promociones', [MapController::class, 'index'])->name('home');
Route::get('/promos', [MapController::class, 'promotions'])->name('map.promotions');
Route::get('/promociones/{promotion}', [MapController::class, 'promotion'])->name('promotions.show');
Route::get('/categories',[MapController::class, 'categories'])->name('categories');


Route::get('/sucursal/{name}', [MapController::class, 'branch'])->name('branches.show');
Route::get('/sucursal/{name}/valoraciones', [MapController::class, 'branchRatings'])->name('branches.ratings');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
