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
use Illuminate\Support\Facades\Auth;

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
    $user = User::find(Auth::id());
    $restaurant = $user->restaurants()->first();
    // forse è necessario un collegamento con altro
    return view('admin.dish.create', compact('restaurant'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {
        $formData = $request->validated();

        $user = User::find(Auth::id());
        $restaurantId = $user->restaurants()->first()->id;

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

        return redirect()->route('dashboard');
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
        $user = User::find(Auth::id());
        $restaurant = $user->restaurants()->first();
        $dish->original_visible = $dish->visible;
      
        return view('admin.dish.edit', compact('dish', 'restaurant'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dish $dish)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'price' => 'required|numeric|min:0.10|max:500',
            'restaurant_id' => 'required|exists:restaurants,id',
            'description' => 'nullable',
            'visible' => 'boolean',
            'thumb' => 'nullable|max:2048',
        ]);
    
        // Verifica se 'description' è presente nei dati validati, altrimenti assegnalo a null
        $description = isset($validatedData['description']) ? $validatedData['description'] : null;
    
        $dish->update([
            'name' => $validatedData['name'],
            'description' => $description,
            'price' => $validatedData['price'],
            'visible' => $request->input('visible') ? 1 : 0,
            'thumb' => $request->hasFile('thumb') ? $request->file('thumb')->store('thumbs', 'public') : $dish->thumb,
            'restaurant_id' => $validatedData['restaurant_id'],
        ]);
    
        return redirect()->route('dashboard')->with('success', 'Piatto aggiornato con successo.');
    }
    



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $restaurantId = session('restaurant_id');
        if ($dish->thumb) {
            Storage::delete($dish->thumb);
        }
        $dish->delete();

        return redirect()->route('restaurants.show', ['restaurant' => $restaurantId]);
        }

}

