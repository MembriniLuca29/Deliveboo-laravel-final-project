<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('dishes', DishController::class);
    Route::resource('restaurants', RestaurantController::class);
    Route::get('order', [OrderController::class, 'index'])->name('orders');
    Route::get('stats', [OrderController::class, 'stats'])->name('orders.stats');
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('order.update');


    
});

Route::post('/logout', 'Auth\AuthenticatedSessionController@destroy')->name('logout');

require __DIR__.'/auth.php';
