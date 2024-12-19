<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bestelling;
use App\Models\Bestelregel;
use App\Models\Ingredient;
use App\Models\Klant;
use App\Models\Pizza;


class BigSeeder extends Seeder
{
    public function run(): void
    {
        $Deeg = Ingredient::create(['naam' => 'Deeg', 'verkoopPrijs' => 2.0]);
        $Tomatensaus = Ingredient::create(['naam' => 'Tomatensaus', 'verkoopPrijs' => 0.5]);
        $Kaas = Ingredient::create(['naam' => 'Kaas', 'verkoopPrijs' => 0.75]);
        $Salami = Ingredient::create(['naam' => 'Salami', 'verkoopPrijs' => 1.75]);
        $Ham = Ingredient::create(['naam' => 'Ham', 'verkoopPrijs' => 1.0]);
        $Mozarella = Ingredient::create(['naam' => 'Mozarella', 'verkoopPrijs' => 2.0]);
        $Bacon = Ingredient::create(['naam' => 'Bacon', 'verkoopPrijs' => 1.25]);
        $Ananas = Ingredient::create(['naam' => 'Ananas', 'verkoopPrijs' => 2.5]);
        
        $Pizza1 = Pizza::create(['naam' => 'Margherita', 'totaalPrijs' => 4.5]);
        $Pizza2 = Pizza::create(['naam' => 'Salami', 'totaalPrijs' => 5.0]);
        $Pizza3 = Pizza::create(['naam' => 'Hawaii', 'totaalPrijs' => 8.0]);

        $Pizza1->ingredientErbij($Deeg, $Tomatensaus, $Mozarella);
        $Pizza2->ingredientErbij($Deeg, $Tomatensaus, $Kaas, $Salami);
        $Pizza3->ingredientErbij($Deeg, $Tomatensaus, $Kaas, $Ham, $Bacon, $Ananas);
    }
}
