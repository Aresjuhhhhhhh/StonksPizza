<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;

class IngredientController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'verkoopPrijs' => 'required|numeric',
        ]);

        Ingredient::create($request->all());

        return response()->json(['message' => 'Ingredient created successfully'], 201);
    }
}
