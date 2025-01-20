<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pizza extends Model
{
    protected $table = 'pizzas';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $fillable = 
    [
        'naam',
        'totaalPrijs',
        'beschrijving',
        'imagePath'

    ];
    public function winkelmandjes()
    {
        return $this->hasMany(Winkelmandje::class, 'pizza_id');
    }
    public function ingredienten(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class);
    }

    public function ingredientErbij(array $ingredienten)
    {
        foreach ($ingredienten as $ingredient) {
            $this->ingredienten()->attach($ingredient);
        }
    }

    public function ingredientErAf(Ingredient $ingredient)
    {
        $this->ingredienten()->detach($ingredient);
    }

    public function totaalPrijs($Grootte = 'Normaal')
    {
        $pizzaGrootte = [
            'Klein' => 0.8,
            'Normaal' => 1,
            'Groot' => 1.2
        ];
        $factor = $pizzaGrootte[$Grootte] ?? $pizzaGrootte['Normaal'];
        $totaalPrijsIngredienten = $this->ingredienten->sum(function($ingredient){
            return $ingredient->verkoopPrijs;
        });

        return $factor * $totaalPrijsIngredienten;
    }
}
