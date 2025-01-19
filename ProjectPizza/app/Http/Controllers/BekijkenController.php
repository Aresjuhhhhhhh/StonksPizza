<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Models\Ingredient;
use App\Models\Bestelregel;
use App\Models\Winkelmandje;
use App\Models\ExtraIngredientWinkelmandje;

class BekijkenController extends Controller
{
    public function show($id)
    {
        $pizza = Pizza::find($id);
        $Ingredienten = Ingredient::all();
        $pizzaGrootte = Bestelregel::all();
    
        if (!$pizza) {
            abort(404, 'Pizza not found.');
        }
    
        return view('klant.bekijken', compact('pizza', 'Ingredienten', 'pizzaGrootte'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'quantity' => 'required|integer|min:1',
            'Grootte' => 'required|exists:bestelregels,id', // Assuming `Grootte` maps to `bestelregels` table
            'ingredients' => 'array',
            'ingredients.*' => 'exists:ingredienten,id', // Ensure this matches your table name
        ]);
    
        // Create a new record in `winkelmandje`
        $winkelmandje = Winkelmandje::create([
            'user_id' => auth()->id(),
            'product_id' => $validated['pizza_id'],
            'grootte_id' => $validated['Grootte'],
            'quantity' => $validated['quantity'],
        ]);
    
        // Attach extra ingredients
        if (!empty($validated['ingredients'])) {
            foreach ($validated['ingredients'] as $ingredientId) {
                ExtraIngredientWinkelmandje::create([
                    'winkelmandje_id' => $winkelmandje->id,
                    'ingredient_id' => $ingredientId,
                ]);
            }
        }
        
        session()->flash('message', 'Pizza toegevoegd in winkelmandje');
        return redirect()->to('/menu');
    }
}