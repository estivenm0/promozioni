<?php

use App\Http\Controllers\MapController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionController;
use App\Models\Category;
use App\Models\Promotion;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::get('/promociones', [MapController::class, 'index'])->name('map.index');
Route::get('/promos', [MapController::class, 'promotions'])->name('map.promotions');

Route::get('/categories',function(){
    return Category::all();
})->name('categories');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
