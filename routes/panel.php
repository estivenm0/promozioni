<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionController;
use App\Models\Branch;
use App\Models\Business;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::prefix('/panel')->group(function(){
    
    Route::resource('/negocios', BusinessController::class)
    ->parameters([ 'negocios' => 'business:name' ])
    ->names('businesses');

    Route::prefix('{business}')->group( function() {
        Route::resource('/sucursales', BranchController::class)
        ->parameters([
             'business' => 'business:name' ,
             'sucursales' => 'branch:name' 
        ])->except('index', 'show')
        ->names('branches');

        Route::post('/{branch:name}', [PromotionController::class, 'store'])
        ->name('promotions.store');
        Route::delete('/{branch:name}/{promotion:slug}', [PromotionController::class, 'destroy'])
        ->name('promotions.destroy');
    })->middleware('scopeBindings');

  
   
});





