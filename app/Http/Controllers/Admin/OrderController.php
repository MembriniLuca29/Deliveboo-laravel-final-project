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
    $restaurant = $user->restaurants()->first();
    $dishes = $restaurant->dishes()->get();
   
    $orderIds = [];
   
    foreach ($dishes as $dish) {
        $orders = $dish->orders()->pluck('id')->toArray();
        $orderIds = array_merge($orderIds, $orders);
    }
   
    $uniqueOrderIds = array_unique($orderIds);
    $orders = Order::whereIn('id', $uniqueOrderIds)->get();
   
    return view('admin.order.index', ['orders' => $orders, 'restaurant' => $restaurant]);
}
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $request->all(); 
        $data['status'] = 'Pending'; 

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
        $request->validate([
            'status' => ['required', 'in:inviato,produzione,completato'],
            // ... (altri campi, se presenti) ...
        ]);
    
        // Aggiorna lo stato dell'ordine
        $order->update(['status' => $request->input('status')]);
    
        // Redirect back senza ricaricare la pagina
        return redirect()->back()->with('success', 'Stato dell\'ordine aggiornato con successo.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
    }

    public function stats() {
        $user = User::find(Auth::id());
        $restaurant = $user->restaurants()->first();

        return view('admin.order.stats', ['restaurant' => $restaurant]);
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:inviato,produzione,completato', // Aggiungi gli altri stati se necessario
        ]);
    
        $order->update(['status' => $request->input('status')]);
    
        return redirect()->route('orders')->with('success', 'Stato dell\'ordine aggiornato con successo.');
    }
}
