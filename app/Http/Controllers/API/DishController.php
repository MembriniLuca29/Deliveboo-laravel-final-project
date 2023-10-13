<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models collegati
use App\Models\Dish;

class DishController extends Controller
{
    public function index(Request $request)
    {
       
        $dishes = Dish::all();
    
        return response()->json([
            'success' => true,
            'results' => $dishes
        ]);
    }
}
