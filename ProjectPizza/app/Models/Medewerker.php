<?php
class Medewerker 
{
    protected $table = 'Medewerker';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $fillable = [
        'naam',
        'adres',
        'woonplaats',
        'telefoonnummer',
        'email',
    ];
}