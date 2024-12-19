<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Klant extends Model
{
    protected $table = 'klanten';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
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
