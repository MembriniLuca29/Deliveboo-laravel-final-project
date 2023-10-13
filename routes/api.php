<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//controller collegato
use App\Http\Controllers\API\RestaurantController;
use App\Http\Controllers\API\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::name('api.')->group(function () {
   
    Route::resource('order', OrderController::class)->only([
        'show'
    ]);

    Route::name('restaurant.')
        ->prefix('restaurant')
        ->group(function() {
    Route::get('restaurant', [RestaurantController::class, 'index'])->name('index');
    
});
   
});
