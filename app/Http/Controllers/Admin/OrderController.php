<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

// Models
use App\Models\User;
use App\Models\Order;
use App\Models\Restaurant;

// Form Requests
use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $dishes = Restaurant::find($user->id)->dishes()->get();

        $orders = [];
        foreach ($dishes as $dish) {
            $orders[] = $dish->orders()->get();
        }
        
        return view('admin.order.index', compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $request->validated();

        $order = Order::create($data);
        
        return response()->json($order, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $data = $request->validated();

        Order::create($data);

        // Aggiungere redirect a pagina post pagamento
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
    }

    public function stats() {

    }
}
