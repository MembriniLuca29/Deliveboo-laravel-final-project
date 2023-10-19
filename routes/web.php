<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
Route::post('/login', 'AuthenticatedSessionController@store')->name('login');

Route::post('/check-email', function (Request $request) {
    $email = $request->input('email');

    // Esegui la logica per verificare se l'email è già presente nel database
    $existingEmail = DB::table('users')->where('email', $email)->exists();

    // Restituisci una risposta JSON indicando se l'email è disponibile o meno
    return response()->json(['available' => !$existingEmail]);
});

Route::get('/', function () {
    return view('home');
});



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
    Route::resource('order', OrderController::class);

    
});

Route::post('/logout', 'Auth\AuthenticatedSessionController@destroy')->name('logout');

require __DIR__.'/auth.php';