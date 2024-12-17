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

    public function prijs(){}
    //maak deze functie werkend. De prijs van een pizza is de som van de prijzen van de ingredienten.
}
