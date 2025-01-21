<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'orders'; // Changed from 'order' to 'orders'

    // Define the fillable fields to allow mass assignment
    protected $fillable = [
        'user_id',
        'status',
        'bestelmethode',
        'datum',
        'totaal_prijs', // Add the totaal_prijs to the fillable array
    ];

    // Define the relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship to OrderItems (An order has many order items)
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Optionally, you can add an accessor to format the totaal_prijs if needed
    public function getTotaalPrijsAttribute($value)
    {
        return number_format($value, 2, ',', '.'); // Format the total price
    }
}