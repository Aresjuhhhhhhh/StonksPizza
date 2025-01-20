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
        'grootte_id',
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

    public function grootte()
    {
        return $this->belongsTo(Bestelregel::class, 'grootte_id');
    }

    public function extraIngredients()
    {
        return $this->hasMany(ExtraIngredientWinkelmandje::class, 'winkelmandje_id');
    }

    public function totaalPrijs()
    {
        $pizzaGrootte = [
            'Klein' => 0.8,
            'Normaal' => 1,
            'Groot' => 1.2
        ];


        $factor = $pizzaGrootte[$this->grootte->afmeting] ?? $pizzaGrootte['Normaal'];


        $pizzaPrijs = $this->product->totaalPrijs;

        $extraIngredientPrijs = $this->extraIngredients->sum(function ($extraIngredient) {
            return $extraIngredient->ingredient->verkoopPrijs;
        });

        return ($pizzaPrijs + $extraIngredientPrijs) * $factor * $this->quantity;
    }

    public function factorKosten()
    {
        $pizzaGrootte = [
            'Klein' => 0.8,
            'Normaal' => 1,
            'Groot' => 1.2
        ];

        $factor = $pizzaGrootte[$this->grootte->afmeting] ?? $pizzaGrootte['Normaal'];

        $pizzaPrijs = $this->product->totaalPrijs;

        $extraIngredientPrijs = $this->extraIngredients->sum(function ($extraIngredient) {
            return $extraIngredient->ingredient->verkoopPrijs;
        });

        $basePrice = $pizzaPrijs + $extraIngredientPrijs;

        $factorCost = ($basePrice * $factor) - $basePrice;

        return $factorCost * $this->quantity;
    }
}