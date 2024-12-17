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
}
