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
        $dishes = Dish::paginate(10);

        return response()->json([
            'success' => true,
            'results' => $dishes
        ]);
    }
   

    public function show( string $slug)
    {
        $dishes = Dish::where('slug', $slug)->firstOrFail();
        return response()->json([
            'success' => true,
            'results' => $dishes
        ]);
    }

}