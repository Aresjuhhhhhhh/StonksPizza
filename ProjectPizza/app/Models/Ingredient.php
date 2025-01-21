<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    protected $table = 'ingredienten'; // Table name
    protected $primaryKey = 'id'; // Primary key
    protected $keyType = 'int'; // Key type
    protected $fillable = [
        'naam', // Ingredient name
        'verkoopPrijs', // Selling price
    ];

    // Relationship with Pizza (many-to-many)
    public function pizzas(): BelongsToMany
    {
        return $this->belongsToMany(Pizza::class);
    }

    // Relationship with ExtraIngredientWinkelmandje (one-to-many)
    public function extraIngredients()
    {
        return $this->hasMany(ExtraIngredientWinkelmandje::class);
    }

    // Relationship with OrderItem (many-to-many through the pivot table 'order_item_ingredients')
    public function orderItems(): BelongsToMany
    {
        return $this->belongsToMany(OrderItem::class, 'order_item_ingredients')
            ->withPivot('quantity') // Include quantity from the pivot table
            ->withTimestamps(); // Track created_at and updated_at timestamps
    }
}
