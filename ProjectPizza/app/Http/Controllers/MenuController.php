<?php

namespace App\Http\Controllers;

use App\Models\Bestelregel;
use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Models\Ingredient;
use App\Models\Winkelmandje;
use App\Models\ExtraIngredientWinkelmandje;



class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menuItems = Pizza::all();
        $ingredienten = Ingredient::all();
        $pizzaGrootte = Bestelregel::all();

        return view('klant.menu', ['menuItems' => $menuItems, 'ingredienten' => $ingredienten, 'pizzaGrootte' => $pizzaGrootte]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'quantity' => 'required|integer|min:1',
            'Grootte' => 'required|exists:pizza_grootte,id',
            'ingredients' => 'array',
            'ingredients.*' => 'exists:ingredienten,id', // Ensure this line is consistent with the table name
        ]);

        // Create a new bestelling (order)
        $bestelling = Winkelmandje::create([
            'user_id' => auth()->id(),
            'product_id' => $request->pizza_id,
            'quantity' => $request->quantity,
            'grootte_id' => $request->Grootte,
        ]);

        // Attach the selected ingredients to the bestelling
        if ($request->has('ingredients')) {
            foreach ($request->ingredients as $ingredientId) {
                ExtraIngredientWinkelmandje::create([
                    'winkelmandje_id' => $bestelling->id,
                    'ingredient_id' => $ingredientId,
                ]);
            }
        }

        // Redirect back with a success message
        return view('klant.menu');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pizza = Pizza::findOrFail($id);

        $ingredients = Ingredient::all();

        return view('klant.bekijken', compact('pizza', 'ingredients'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}