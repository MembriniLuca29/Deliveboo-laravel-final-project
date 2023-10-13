<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models collegati
use App\Models\Dish;

class DishController extends Controller
{
    public function index()
    {
        // public function index(Request $request)
        // {
        // $restaurantId = $request->input('restaurant_id');

        // // Ottieni i piatti che corrispondono all'id del ristorante
        // $dishes = Dish::where('restaurant_id', $restaurantId)->get();

        $dishes = Dish::all();
        return response()->json([
            'success' => true,
            'results' => $dishes
        ]);
    }
}
