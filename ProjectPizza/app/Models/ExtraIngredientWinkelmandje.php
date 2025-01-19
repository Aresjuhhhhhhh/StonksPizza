<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ExtraIngredientWinkelmandje extends Model
{
    use HasFactory;

    protected $table = 'extra_ingredient_winkelmandje';
    protected $fillable = [
        'winkelmandje_id',
        'ingredient_id',
    ];

    public function winkelmandje()
    {
        return $this->belongsTo(Winkelmandje::class, 'winkelmandje_id');
    }
    
    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class, 'ingredient_id');
    }
}
