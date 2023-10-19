<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $types = $request->input('search');

        $restaurants = DB::table('restaurants')
            ->select('restaurants.*')
            ->where(function ($query) use ($types) {
                $query->selectRaw('COUNT(DISTINCT types.name)')
                    ->from('restaurant_type')
                    ->join('types', 'restaurant_type.type_id', '=', 'types.id')
                    ->whereColumn('restaurant_type.restaurant_id', 'restaurants.id')
                    ->whereIn('types.name', $types)
                    ->havingRaw('COUNT(DISTINCT types.name) >='.count($types));
                }, '>=', count($types))
        ->get();

                
        return response()->json([
            'success' => true,
            'restaurants' => $restaurants
        ]);

    }
}
