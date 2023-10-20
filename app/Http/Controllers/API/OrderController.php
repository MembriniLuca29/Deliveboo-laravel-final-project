<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Models
use App\Models\User;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\Dish;

class OrderController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        $restaurant = $user->restaurants()->first();

        $stats = $restaurant->dishes()->withCount('orders')->get();
        $orders = [];
        foreach ($stats as $stat) {
            $orders[] = $stat->orders_count;
        }
        
        return response()->json([
            'success' => true,
            'orders' => $orders,
            'dishes' => $orders
        ]);
    }

}

