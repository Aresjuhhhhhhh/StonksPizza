<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bestelregel extends Model
{
    protected $fillable = 
    [
        'aantal',
        'afmeting'
    ];
    public function bestelling(): BelongsTo
    {
        return $this->belongsTo(Bestelling::class);
    }

    public function pizza(): BelongsTo
    {
        return $this->belongsTo(Pizza::class);
    }
    public function regelPrijs()
    {
        $pizzaGrootte = [
            'Klein' => 0.8,
            'Normaal' => 1,
            'Groot' => 1.2
        ];
        $factor = $pizzaGrootte[$this->afmeting] ?? $pizzaGrootte['Normaal'];
        $pizzaPrijs =  $this->pizza->prijs($this->afmeting);
        return $this->aantal * $factor * $pizzaPrijs;
    }
    
}
