<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Models
use App\Models\User;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\Dish;

class OrderController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        $restaurant = $user->restaurants()->first();
        $dishes = $restaurant->dishes()->get();

        $stats = $restaurant->dishes()->withCount('orders')->get();
        $orders = [];
        foreach ($stats as $stat) {
            $orders[] = $stat->orders_count;
        }
        
        return response()->json([
            'success' => true,
            'orders' => $orders,
            'dishes' => $dishes
        ]);
    }

    public function show(string $id)
    {
      
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'phone_number' => 'required|string|max:13',
            'email' => 'required|email',
            'address' => 'required|string',
            'total_price' => 'required|numeric',
            'status' => 'required|string',
            'dishes' => 'required|array', // Array di ID dei piatti
        ]);

        // Crea un nuovo ordine
        $order = Order::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'address' => $data['address'],
            'total_price' => $data['total_price'],
            'status' => $data['status'],
        ]);

        // Aggiungi i piatti all'ordine tramite la relazione many-to-many
        $order->dishes()->attach($data['dishes']);

        // Restituisci una risposta appropriata al frontend
        return response()->json(['message' => 'Ordine creato con successo'], 201);
    }
}

