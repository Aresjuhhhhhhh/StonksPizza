<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Winkelmandje;
use App\Models\ExtraIngredientWinkelmandje;
use App\Models\Ingredient;
use App\Models\Bestelregel;
use App\Models\User;
use App\Models\Pizza;
use Illuminate\Support\Facades\Auth;

class WinkelMandjeController extends Controller
{
    public function index()
    {
        // Ensure the user is authenticated
        $user = Auth::user();

        // Get the items in the shopping cart along with the extra ingredients
        $winkelmandje = Winkelmandje::where('user_id', $user->id)
            ->with('extraIngredients') // Eager load extraIngredients
            ->get();

        $UserInfo = User::where('id', $user->id); 
        $extraIngredients = ExtraIngredientWinkelmandje::findOrFail($winkelmandje->id);


        return view('klant.bestelling', ['winkelmandje' => $winkelmandje, 'extraIngredients' => $extraIngredients]);
    }

    public function toevoegen(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'winkelmandje_id' => 'required|exists:winkelmandje,id',
            'ingredient_id' => 'required|exists:ingredienten,id',
        ]);
    
        // Create a new record in the pivot table
        ExtraIngredientWinkelmandje::create([
            'winkelmandje_id' => $validated['winkelmandje_id'],
            'ingredient_id' => $validated['ingredient_id'],
        ]);
    
        // Redirect back with a success message
        return redirect()->back();
    }
    public function verwijderen($winkelmandjeId, $ingredientId)
    {
        // Find the ExtraIngredientWinkelmandje by winkelmandje_id and ingredient_id
        $ingredientToRemove = ExtraIngredientWinkelmandje::where('winkelmandje_id', $winkelmandjeId)
            ->where('ingredient_id', $ingredientId)
            ->firstOrFail();
    
        // Delete the record
        $ingredientToRemove->delete();
    
        return redirect()->back();
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find the winkelmandje record
        $winkelmandje = Winkelmandje::findOrFail($id);
        $ingredients = Ingredient::all();
        $pizzaSizes = Bestelregel::all();

        $extraGekozenIngredienten = ExtraIngredientWinkelmandje::where('winkelmandje_id', $id)->get();

        // Pass data to the view
        return view('klant.editBestelling', compact('winkelmandje', 'ingredients', 'pizzaSizes', 'extraGekozenIngredienten'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
            'grootte' => 'required|exists:bestelregels,id',
            'ingredients' => 'array',
            'ingredients.*' => 'exists:ingredienten,id',
        ]);

        // Find the existing winkelmandje record
        $winkelmandje = Winkelmandje::findOrFail($id);

        // Update the winkelmandje details
        $winkelmandje->update([
            'quantity' => $validated['quantity'],
            'grootte_id' => $validated['grootte'],
        ]);


        session()->flash('message', 'Pizza succesvol bijgewerkt!');
        return redirect()->to('/cart');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Winkelmandje::destroy($id);

        session()->flash('verwijderMessage', 'Pizza verwijderd van winkelmandje');
        return redirect()->back();
    }
}
