<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Klant extends Model
{
    protected $fillable = [
        'naam',
        'adres',
        'woonplaats',
        'telefoonnummer',
        'email',
    ];
    public function bestellingen(): HasMany
    {
        return $this->hasMany(Bestelling::class);
    }
}
