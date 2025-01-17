<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $table = 'FAQ';
    protected $primaryKey = 'id';
    protected $fillable = 
    [
        'vraag',
        'antwoord'
    ];
}
