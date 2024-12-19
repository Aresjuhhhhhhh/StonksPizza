<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    protected $table = 'ingredienten';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $fillable = 
    [
        'naam',
        'verkoopPrijs'
    ];
    public function pizzas(): BelongsToMany
    {
        return $this->belongsToMany(Pizza::class);
    }
}
