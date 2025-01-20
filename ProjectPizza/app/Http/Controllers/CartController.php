<?php

namespace App\Http\Controllers;

use App\Models\ExtraIngredientWinkelmandje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Winkelmandje;


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


    public function edit($id)
    {
        $winkelmandje = Winkelmandje::findOrFail($id);
        return view('klant.editBestelling', compact('winkelmandje'));
    }
}
