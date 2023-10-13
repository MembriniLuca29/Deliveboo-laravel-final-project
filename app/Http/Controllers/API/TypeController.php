<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models collegati
use App\Models\type;

class TypeController extends Controller
{
    public function index()
    {
        $types = type::all();

        return response()->json([
            'success' => true,
            'results' => $types
        ]);
    }

    public function show(string $id)
    {
        $type = type::findOrFail($id);
        return response()->json([
            'success' => true,
            'result' => $type
        ]);
    }
}
