<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Winkelmandje;
use App\Models\ExtraIngredientWinkelmandje;
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

        $extraIngredients = ExtraIngredientWinkelmandje::findOrFail($winkelmandje->id);

    
        return view('klant.bestelling', ['winkelmandje' => $winkelmandje, 'extraIngredients' => $extraIngredients]);
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
