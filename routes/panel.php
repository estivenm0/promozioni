<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Business;

Route::get('/panel', function () {
    return Inertia::render('Home', [
        'users' => User::all(),
        'business' => Business::all()
    ]);

})->name('panel');

// Route::get('/hola', function () {
//     return Inertia::render('Hola', [
//         'migration' =>''
//     ]);
//     // return to_route('panel');
// });


