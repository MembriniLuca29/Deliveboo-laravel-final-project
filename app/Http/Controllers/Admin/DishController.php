<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models
use App\Models\Dish;

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
        // 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dish.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {
        $formData = $request->validated();
        $restaurant_id = session('restaurant_id');

        Dish::create([
            'name'=> $formData['name'],
            'description'=> $formData['description'],
            'price'=> $formData['price'],
            'restaurant_id'=> $restaurant_id
        ]);

        return redirect()->route('restaurants.show', ['restaurant' => $restaurant_id]);
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
        return view('admin.dish.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {
        $formData = $request->validated();

        $dish->update([
            'name' => $formData['name'],
            'ingredients' => $formData['ingredients'],
            'price' => $formData['price'],
        ]);
        return redirect()->route('admin.dish.show', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        if ($dish->cover_img) {
            Storage::delete($dish->thumb);
        }
        $dish->delete();

        return redirect()->route('admin.restaurant.show');    }
}
