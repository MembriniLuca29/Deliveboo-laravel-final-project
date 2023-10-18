<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Models
use App\Models\User;
use App\Models\Order;
use App\Models\Restaurant;

class OrderController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        $restaurant = $user->restaurants()->first();
        $dishes = $restaurant->dishes()->get();

        $orders = [];
        foreach ($dishes as $dish) {
            $orders[] = $dish->orders()->get();
        }
        
        return response()->json([
            'success' => true,
            'orders' => $orders,
            'dishes' => $dishes
        ]);
    }

    public function show(string $id)
    {
      
    }
}
