<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


// Models collegati
use App\Models\Restaurant;
use App\Models\Type;

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

    public function filter (string $search) {

        $restaurants = [];
        $types = Type::all();

        if ($search != 'all') {
            
            foreach ($types as $type) {
                if (str_contains($search, $type->name)) {
                    $restaurantsByType = $type->restaurants()->get();

                    foreach ($restaurantsByType as $singleRestaurant) {
                        $restaurants[] = $singleRestaurant;
                    }
                }
            }

        }
        else {
            $restaurants = Restaurant::all();
        }     
               
        return response()->json([
            'success' => true,
            'restaurants' => $restaurants,
        ]);

        
        
    }
}
