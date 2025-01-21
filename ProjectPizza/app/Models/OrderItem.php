<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'grootte_id',
        'quantity',
    ];

    // Define the many-to-many relationship with ingredients
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'order_item_ingredients')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
