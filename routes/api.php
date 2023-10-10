<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//controller collegato

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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
         return $request->user();
     });


     Route::name('api.')->group(function () {
        Route::name('dishes.')->group(function () {
            Route::post('/dishes/{id}', [DishController::class, 'store'])->name('store');
            Route::put('/dishes/{id}', [DishController::class, 'update'])->name('update');
            Route::delete('/dishes/{id}', [DishController::class, 'destroy'])->name('destroy');
        });
    });