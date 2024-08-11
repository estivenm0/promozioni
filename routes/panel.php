<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ProfileController;
use App\Models\Branch;
use App\Models\Business;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/panel', function () {
    return Inertia::render('Home', [
        
    ]);
})->name('panel');


Route::resource('/negocios', BusinessController::class)
->only('index', 'create');


