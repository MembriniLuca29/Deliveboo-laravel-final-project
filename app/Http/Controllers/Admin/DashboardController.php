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

        $user = User::where('id', Auth::id())->firstOrFail();
        $restaurants = $user->restaurants()->get();

        return view('dashboard', compact('restaurants'));
    }
}
