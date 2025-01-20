<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bestelregel extends Model
{
    protected $table = 'bestelregels';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
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

    
}
