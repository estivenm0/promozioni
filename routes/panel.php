<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ProfileController;
use App\Models\Branch;
use App\Models\Business;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::prefix('/panel')->group(function(){
    
    Route::resource('/negocios', BusinessController::class)
    ->names('businesses');

    Route::prefix('{business}')->group( function() {
        Route::resource('/sucursales', BranchController::class)
        ->names('branches');
    });
            
});





