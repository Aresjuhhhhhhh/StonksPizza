<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    protected $fillable = 
    [
        'naam',
        'prijs'
    ];
    public function pizzas(): BelongsToMany
    {
        return $this->belongsToMany(Pizza::class);
    }
}
