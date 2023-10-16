<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

// Models collegati
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::inRandomOrder()->limit(4)->get();

        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }

    public function show(string $id)
    {
        $restaurant = Restaurant::findOrFail($id);
        return response()->json([
            'success' => true,
            'result' => $restaurant
        ]);
    }

    public function byType(string $name) {

        $type = Type::where('name', $name)->first();
        $restaurants = $type->restaurants()->get();

        return response()->json([
            'success' => true,
            'restaurants' => $restaurants
        ]);

    }

    public function filter (string $search) {

        $type =Type::where('name', 'LIKE', "{$search}%")->first();
        $restaurantsByType = $type->restaurants()->get(); 

        $restaurantsByName = Restaurant::where('name', 'LIKE', "{$search}%")->get();


        return response()->json([
            'success' => true,
            'restaurantsByType' => $restaurantsByType,
            'restaurantsByName' => $restaurantsByName
        ]);
    }
}
