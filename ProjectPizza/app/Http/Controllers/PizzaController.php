<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'totaalPrijs' => 'required|numeric',
            'beschrijving' => 'required|string',
            'imagePath' => 'required|string',
        ]);

        Pizza::create($request->all());

        return response()->json(['message' => 'Pizza created successfully'], 201);
    }
}
