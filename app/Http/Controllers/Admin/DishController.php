<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models
use App\Models\Dish;
use App\Models\User;

// Requests
use App\Http\Requests\Dish\StoreDishRequest;
use App\Http\Requests\Dish\UpdateDishRequest;

//helpers
use Illuminate\Support\Facades\Storage;
class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dish::all();
        return view('admin.dish.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $restaurantId = session('restaurant_id');
    // forse è necessario un collegamento con altro
    return view('admin.dish.create', compact('restaurantId'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {
        $formData = $request->validated();

        $restaurantId = session('restaurant_id');

        $thumbPath = null;

        if ($request->hasFile('thumb')) {
            $thumb = $request->file('thumb');
            $thumbPath = $thumb->store('thumbs', 'public');
        }

        Dish::create([
            'name' => $formData['name'],
            'ingredients' => $formData['description'],
            'price' => $formData['price'],
            'thumb' => $thumbPath,
            'restaurant_id' => $formData['restaurant_id'],
        ]);

        return redirect()->route('restaurants.show', ['restaurant' => $restaurantId]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        $restaurantId = session('restaurant_id');

        return view('admin.dish.edit', compact('dish', 'restaurantId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, Dish $dish)
{
    $formData = $request->validated();

    $restaurantId = session('restaurant_id');
    $thumbPath = $dish->thumb; // Mantieni il percorso dell'immagine esistente

    if ($request->hasFile('thumb')) {
        $thumb = $request->file('thumb');
        $thumbPath = $thumb->store('thumbs', 'public');
    }

    $dish->update([
        'name' => $formData['name'],
        'description' => $formData['description'],
        'price' => $formData['price'],
        'thumb' => $thumbPath, // Aggiorna l'immagine o mantieni quella esistente
        'restaurant_id' => $formData['restaurant_id'],
    ]);

    // Reindirizza l'utente alla pagina corretta usando la rotta
    return redirect()->route('restaurants.show', ['restaurant' => $restaurantId]);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        if ($dish->thumb) {
            Storage::delete($dish->thumb);
        }
        $dish->delete();

        return redirect()->route('admin.dishes.index');    }
}