<?php

namespace App\Http\Controllers;

use App\Models\Bestelregel;
use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Models\Ingredient;


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
        $pizza = Pizza::findOrFail($request->pizza_id);
        $ingredients = Ingredient::whereIn('id', $request->ingredients ?? [])->get();
    
        // Add pizza and ingredients to the cart logic
        // Example:
        $cart = session()->get('cart', []);
        $cart[] = [
            'pizza' => $pizza,
            'ingredients' => $ingredients,
        ];
        session()->put('cart', $cart);
    
        return redirect()->route('cart.index')->with('success', 'Pizza added to cart!');
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