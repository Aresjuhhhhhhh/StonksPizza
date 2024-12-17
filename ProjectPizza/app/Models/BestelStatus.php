<?php

namespace App;

enum BestelStatus : string
{
    case Initeel = "initieel";
    case Betaald = "Betaald";
    case Bereiden = "Bereiden";
    case InOven = "InOven";
    case Onderweg = "Onderweg";
    case Bezorgd = "Bezorgd";
}
