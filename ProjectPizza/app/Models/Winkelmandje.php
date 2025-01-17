<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winkelmandje extends Model
{
    use HasFactory;

    protected $table = 'winkelmandje';

    protected $fillable = [
        'user_id',
        'product_id',
        'size',
        'extra_ingredients',
        'quantity',
    ];

    // Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship to Pizza (product)
    public function product()
    {
        return $this->belongsTo(Pizza::class, 'product_id');
    }


    public function extraIngredients()
    {
        return $this->belongsToMany(Ingredient::class, 'extra_ingredient_winkelmandje', 'winkelmandje_id', 'ingredient_id');
    }
}