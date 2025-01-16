<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bestelling;
use App\Models\Bestelregel;
use App\Models\Ingredient;
use App\Models\User;
use App\Models\Pizza;
use App\Models\Medewerker;


class BigSeeder extends Seeder
{
    public function run(): void
    {
        $manager = User::create(['name' => 'Manager', 'email' => 'StonksPizzManager@123.com', 'password' => 'StonksIsTheBest123', 'Rol' => 'Manager']);

        $medewerker = User::create(['name' => 'Medewerker 1', 'email' => 'StonksPizzAdmin@123.com', 'password' => 'Stonks123', 'Rol' => 'Medewerker']);


        $Deeg = Ingredient::create(['naam' => 'Deeg', 'verkoopPrijs' => 2.0]);
        $Tomatensaus = Ingredient::create(['naam' => 'Tomatensaus', 'verkoopPrijs' => 0.5]);
        $Kaas = Ingredient::create(['naam' => 'Kaas', 'verkoopPrijs' => 0.75]);
        $Salami = Ingredient::create(['naam' => 'Salami', 'verkoopPrijs' => 1.75]);
        $Ham = Ingredient::create(['naam' => 'Ham', 'verkoopPrijs' => 1.0]);
        $Mozarella = Ingredient::create(['naam' => 'Mozarella', 'verkoopPrijs' => 2.0]);
        $Bacon = Ingredient::create(['naam' => 'Bacon', 'verkoopPrijs' => 1.25]);
        $Ananas = Ingredient::create(['naam' => 'Ananas', 'verkoopPrijs' => 2.5]);
        $Olijven = Ingredient::create(['naam' => 'Olijven', 'verkoopPrijs' => 1.5]);
        $Champgiones = Ingredient::create(['naam' => 'Champgiones', 'verkoopPrijs' => 1.5]);
        $Basilicum = Ingredient::create(['naam' => 'Basilicum', 'verkoopPrijs' => 0.50]);
        
        $Pizza1 = Pizza::create(['naam' => 'Margherita', 'totaalPrijs' => 4.5, 'beschrijving' => 'De klassieker onder de pizza\'s.', 'imagePath' => 'MozzarellaPizzapng.png']);
        $Pizza2 = Pizza::create(['naam' => 'Salami', 'totaalPrijs' => 5.0, 'beschrijving' => 'Een pizza met salami.', 'imagePath' => 'SalamiPizzapng.png']);
        $Pizza3 = Pizza::create(['naam' => 'Hawaii', 'totaalPrijs' => 8.0, 'beschrijving' => 'Een pizza met ham, bacon en ananas.', 'imagePath' => 'HawaiPizza.png']);
        $Pizza4 = Pizza::create(['naam' => 'Caprese', 'totaalPrijs' => 6.0, 'beschrijving' => 'Een pizza met mozzarella en tomatensaus.', 'imagePath' => 'PizzaCaprese.png']);
        $Pizza5 = Pizza::create(['naam' => 'Marinara', 'totaalPrijs' => 7.0, 'beschrijving' => 'Een pizza met basil en tomatensaus', 'imagePath' => 'PizzaMarinara.png']);
        $Pizza6 = Pizza::create(['naam' => 'Olijf', 'totaalPrijs' => 6.5, 'beschrijving' => 'Een pizza met olijf en tomatensaus', 'imagePath' => 'PizzaOlijf.png']);

        $Pizza1->ingredientErbij($Deeg, $Tomatensaus, $Mozarella);
        $Pizza2->ingredientErbij($Deeg, $Tomatensaus, $Kaas, $Salami);
        $Pizza3->ingredientErbij($Deeg, $Tomatensaus, $Kaas, $Ham, $Bacon, $Ananas);
        $Pizza4->ingredientErbij($Deeg, $Tomatensaus, $Mozarella);
        $Pizza5->ingredientErbij($Deeg, $Tomatensaus, $Basilicum);
        $Pizza6->ingredientErbij($Deeg, $Tomatensaus, $Olijven);
    }
}
