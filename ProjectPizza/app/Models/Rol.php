<?php

namespace App\Models;
enum Rol : string
{
    case Manager = "Manager";
    case Medewerker = "Medewerker";
    case Klant = "Klant"; 
}
