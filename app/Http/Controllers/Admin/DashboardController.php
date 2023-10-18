<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function index() {

        $user = User::find(Auth::id());
        $restaurant = $user->restaurants()->first();
        $dishes = $restaurant->dishes()->get();

        return view('dashboard', [
            'restaurant' => $restaurant,
            'dishes' => $dishes
            
        ]);
    }
}
