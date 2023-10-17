<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//controller collegato
use App\Http\Controllers\API\RestaurantController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\TypeController;
use App\Http\Controllers\API\DishController;
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

    Route::name('restaurant.')->prefix('restaurant')->group(function() {

        Route::get('restaurant', [RestaurantController::class, 'index'])->name('index');
        Route::get('restaurant/show', [RestaurantController::class, 'show'])->name('show');
        Route::get('restaurant/results/{search}', [RestaurantController::class, 'filter'])->name('filter');

    });

    Route::name('type.')->prefix('type')->group(function() {
        
        Route::get('type', [TypeController::class, 'index'])->name('index');

    });

    Route::name('dish.')->prefix('dish')->group(function() {

        Route::get('dish/{restaurant_id}', [DishController::class, 'index'])->name('index');
        
    });

});