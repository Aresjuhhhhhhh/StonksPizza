<?php

namespace App\Models;

enum BestelStatus : string
{
    case Initeel = "initieel";
    case Betaald = "Betaald";
    case Bereiden = "Bereiden";
    case InOven = "InOven";
    case Onderweg = "Onderweg";
    case Bezorgd = "Bezorgd";
}
