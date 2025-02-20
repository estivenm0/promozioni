<?php

use App\Http\Controllers\PanelController;
use Illuminate\Support\Facades\Route;

Route::prefix('/panel')->group(function () {

    Route::get('/', [PanelController::class, 'indexBusiness'])
        ->name('panel');

    Route::get('/businesses/create', [PanelController::class, 'createBusiness'])
        ->name('businesses.create');

    Route::post('/businesses', [PanelController::class, 'storeBusiness'])
        ->name('businesses.store');

    Route::get('/businesses/{business}/edit', [PanelController::class, 'editBusiness'])
        ->name('businesses.edit');

    Route::put('/businesses/{business}', [PanelController::class, 'updateBusiness'])
        ->name('businesses.update');

    Route::delete('/businesses/{business}', [PanelController::class, 'destroyBusiness'])
        ->name('businesses.destroy');

    Route::prefix('/{business}')->group(function () {

        Route::get('/promotions', [PanelController::class, 'indexPromotion'])
            ->name('promotions.index');

        Route::get('/promotions/create', [PanelController::class, 'createPromotion'])
            ->name('promotions.create');

        Route::post('/promotions', [PanelController::class, 'storePromotion'])
            ->name('promotions.store');

        Route::get('/promotions/{promotion}/edit', [PanelController::class, 'editPromotion'])
            ->name('promotions.edit');

        Route::put('/promotions/{promotion}', [PanelController::class, 'updatePromotion'])
            ->name('promotions.update');

        Route::delete('/promotions/{promotion}', [PanelController::class, 'destroyPromotion'])
            ->name('promotions.destroy');

    })->middleware('scopeBindings');

});
