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
        $restaurantId = $request->input('restaurant_id');
    
        // Verifica se l'ID del ristorante è passato correttamente
        if (!$restaurantId) {
            return response()->json([
                'success' => false,
                'message' => 'ID del ristorante non specificato.'
            ], 400);
        }
    
        // Ottieni i piatti che corrispondono all'id del ristorante
        $dishes = Dish::where('restaurant_id', $restaurantId)->get();
    
        return response()->json([
            'success' => true,
            'results' => $dishes
        ]);
    }
}
