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

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect()->route('error.page');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // forse è necessario un collegamento con altro
        return view('admin.dishes.create', compact('dishes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {
        $formData = $request->validated();

        Dish::create([
            'name'=> $formData['name'],
            'ingridients'=> $formData['ingredients'],
            'price'=> $formData['price'],
            'user_id'=> $formData['user_id'],
        ]);

        return redirect()->route('admin.users.index');
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
        return view('admin.dishes.edit', compact('dish'));
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
        return redirect()->route('admin.users.show', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();

    return redirect()->route('admin.users.index');
    }
}
