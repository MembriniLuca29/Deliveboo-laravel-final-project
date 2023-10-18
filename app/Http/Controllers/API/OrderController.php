<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models collegati
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
      
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
