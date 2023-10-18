<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Restaurant\StoreRestaurantRequest;
use App\Http\Requests\Restaurant\UpdateRestaurantRequest;

// FACADES
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

// MODELS
use App\Models\Restaurant;
use App\Models\Type;

// CONTROLLERS
use App\Http\Controllers\Controller;

class RestaurantController extends Controller
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
        $types = Type::all();
        return view('admin.restaurant.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        $data = $request->validated();
        $user_id = Auth::id();
        
        $imagePath = null;
        
        if (isset($data['thumb'])) {
            $imagePath = Storage::disk('public')->put('uploads/images', $data['thumb']);
        }

        $restaurant = Restaurant::create([
                        'name' => $data['name'],
                        'address' => $data['address'],
                        'phone_number' => $data['phone_number'],
                        'thumb' => $imagePath,
                        'p_iva' => $data['p_iva'],
                        'user_id' => $user_id
                    ]);

        if (isset($data['type_id'])) {
            foreach ($data['type_id'] as $type) {
                $restaurant->types()->attach($type);
            }
        }

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        $types = Type::all();
    
        return view('admin.restaurant.edit', ['restaurant' => $restaurant, 'types' => $types]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $data = $request->validated();

        $coverImagePath = $restaurant->thumb;

        if (isset($data['thumb'])) {
            if ($restaurant->thumb) {
                Storage::disk('public')->delete($restaurant->thumb);
            }

            $coverImagePath = Storage::disk('public')->put('uploads/images', $data['thumb']);
        }
        else if (isset($data['remove_thumb'])) {
            if ($restaurant->thumb) {
                Storage::disk('public')->delete($restaurant->thumb);
            }

            $coverImagePath = null;
        }

        $restaurant ->update([
            'name' => $data['name'],
            'address' => $data['address'],
            'phone_number' => $data['phone_number'],
            'thumb' => $coverImagePath,
            'p_iva' => $data['p_iva']
        ]);

        if (isset($data['type_id'])) {
            $restaurant->types()->sync($data['type_id']);
        }

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {

        if ($restaurant->thumb) {
            Storage::disk('public')->delete($restaurant->thumb);
        }
        
        $restaurant->delete();

        return redirect()->route('dashboard');
    }
}
