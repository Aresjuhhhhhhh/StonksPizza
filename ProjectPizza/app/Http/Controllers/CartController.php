<?php

namespace App\Http\Controllers;

use App\Models\ExtraIngredientWinkelmandje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Winkelmandje;
use App\Models\Ingredient;
use App\Models\Bestelregel;


class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $winkelmandjes = Winkelmandje::with([
            'product',
            'grootte',
            'extraIngredients.ingredient'
        ])->where('user_id', $user->id)->get();

        // Bereken het totaalbedrag
        $totaalPrijs = $winkelmandjes->sum(function ($winkelmandje) {
            return $winkelmandje->totaalPrijs();
        });

        // Bereken het totaalbedrag voor alleen de factor kosten
        $factorKosten = $winkelmandjes->sum(function ($winkelmandje) {
            return $winkelmandje->factorKosten();
        });

        return view('klant.bestelling', compact('winkelmandjes', 'totaalPrijs', 'factorKosten'));
    }

    public function destroy($id)
    {
        Winkelmandje::destroy($id);

        session()->flash('verwijderMessage', 'Pizza verwijderd van winkelmandje');
        return redirect()->route('klant.bestelling');
    }


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





}
