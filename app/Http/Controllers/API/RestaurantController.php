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

    public function filter (Request $request) {

        $search = $request->input('search', []);
        
        $restaurants = [];

        foreach ($search as $field) {
            foreach (Type::all() as $type) {
                if ($type->name == strtolower($field)) {
                    $restaurants = array_merge($restaurants, $type->restaurants()->get()->toArray());
                }
            }
            
        }

        $uniqueRestaurants = [];

        foreach ($restaurants as $restaurant) {
            if (count($uniqueRestaurants) == 0) {
                $uniqueRestaurants[] = $restaurant;
            } else {
                $unique = true;
                foreach ($uniqueRestaurants as $uniqueRestaurant) {
                    if ($uniqueRestaurant['id'] == $restaurant['id']) {
                        $unique = false;
                    } 
                }
                if ($unique) {
                    $uniqueRestaurants[] = $restaurant;
                 }
            }
        }
               
        return response()->json([
            'success' => true,
            'restaurants' => $uniqueRestaurants
        ]);

    }
}
