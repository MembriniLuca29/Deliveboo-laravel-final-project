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


Route::name('api.')->group(function () {

    Route::resource('dishes', DishController::class)->only([
        'index',
        'show'
    ]);
});
