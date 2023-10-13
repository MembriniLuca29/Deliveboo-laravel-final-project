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
        $dishes = Dish::all();

        return response()->json([
            'success' => true,
            'results' => $dishes
        ]);
    }
   

    public function show( string $id)
    {
        $dishes = Dish::where('id', $id)->firstOrFail();
        return response()->json([
            'success' => true,
            'results' => $dishes
        ]);
    }

    public function getDishes()
    {
            $dishes = Dish::all();
            return response()->json($dishes);
        }

}