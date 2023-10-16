<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models collegati
use App\Models\Dish;

class DishController extends Controller
{
    public function index($restaurant_id)
    {
        $dishes = Dish::where('restaurant_id', $restaurant_id)->get();

        return response()->json([
            'success' => true,
            'results' => $dishes
        ]);
    }
}
