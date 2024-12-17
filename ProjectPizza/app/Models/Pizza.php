<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pizza extends Model
{
    protected $fillable = 
    [
        'naam'
    ];

    public function ingredienten(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class);
    }

    public function ingredientErbij(Ingredient $ingredient)
    {
        $this->ingredienten()->attach($ingredient);
    }

    public function ingredientErAf(Ingredient $ingredient)
    {
        $this->ingredienten()->detach($ingredient);
    }

    public function prijs($Grootte = 'Normaal')
    {
        $pizzaGrootte = [
            'Klein' => 0.8,
            'Normaal' => 1,
            'Groot' => 1.2
        ];
        $factor = $pizzaGrootte[$Grootte] ?? $pizzaGrootte['Normaal'];
        $totaalPrijsIngredienten = $this->ingredienten->sum(function($ingredient){
            return $ingredient->prijs;
        });

        return $factor * $totaalPrijsIngredienten;
    }
}
