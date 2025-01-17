<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bestelling;
use App\Models\Bestelregel;
use App\Models\Ingredient;
use App\Models\User;
use App\Models\Pizza;
use App\Models\Winkelmandje;
use App\Models\FAQ;

class BigSeeder extends Seeder
{
    public function run(): void
{
    $manager = User::create(['name' => 'Manager', 'email' => 'StonksPizzManager@123.com', 'password' => 'StonksIsTheBest123', 'Rol' => 'Manager']);
    $medewerker = User::create(['name' => 'Medewerker 1', 'email' => 'StonksPizzAdmin@123.com', 'password' => 'Stonks123', 'Rol' => 'Medewerker']);

    // Create Ingredients
    $Deeg = Ingredient::create(['naam' => 'Deeg', 'verkoopPrijs' => 2.0]);
    $Tomatensaus = Ingredient::create(['naam' => 'Tomatensaus', 'verkoopPrijs' => 0.5]);
    $Kaas = Ingredient::create(['naam' => 'Kaas', 'verkoopPrijs' => 0.75]);
    $Salami = Ingredient::create(['naam' => 'Salami', 'verkoopPrijs' => 1.75]);
    $Ham = Ingredient::create(['naam' => 'Ham', 'verkoopPrijs' => 1.0]);
    $Mozarella = Ingredient::create(['naam' => 'Mozarella', 'verkoopPrijs' => 2.0]);
    $Bacon = Ingredient::create(['naam' => 'Bacon', 'verkoopPrijs' => 1.25]);
    $Ananas = Ingredient::create(['naam' => 'Ananas', 'verkoopPrijs' => 2.5]);
    $Olijven = Ingredient::create(['naam' => 'Olijven', 'verkoopPrijs' => 1.5]);
    $Champignon = Ingredient::create(['naam' => 'Champignon', 'verkoopPrijs' => 1.5]);
    $Basilicum = Ingredient::create(['naam' => 'Basilicum', 'verkoopPrijs' => 0.50]);

    // Create Pizzas
    $Pizza1 = Pizza::create(['naam' => 'Margherita', 'totaalPrijs' => 4.5, 'beschrijving' => 'De klassieker onder de pizzas.', 'imagePath' => 'MozzarellaPizzapng.png']);
    $Pizza2 = Pizza::create(['naam' => 'Salami', 'totaalPrijs' => 5.0, 'beschrijving' => 'Een pizza met salami.', 'imagePath' => 'SalamiPizzapng.png']);
    $Pizza3 = Pizza::create(['naam' => 'Hawaii', 'totaalPrijs' => 8.0, 'beschrijving' => 'Een pizza met ham, bacon en ananas.', 'imagePath' => 'HawaiPizza.png']);
    $Pizza4 = Pizza::create(['naam' => 'Caprese', 'totaalPrijs' => 6.0, 'beschrijving' => 'Een pizza met mozzarella en tomatensaus.', 'imagePath' => 'PizzaCaprese.png']);
    $Pizza5 = Pizza::create(['naam' => 'Marinara', 'totaalPrijs' => 7.0, 'beschrijving' => 'Een pizza met basil en kaas', 'imagePath' => 'PizzaMarinara.png']);
    $Pizza6 = Pizza::create(['naam' => 'Olijf', 'totaalPrijs' => 6.5, 'beschrijving' => 'Een pizza met olijf, champignon', 'imagePath' => 'PizzaOlijf.png']);

    // Attach ingredients to pizzas
    $Pizza1->ingredientErbij([$Deeg->id, $Tomatensaus->id, $Mozarella->id]);
    $Pizza2->ingredientErbij([$Deeg->id, $Tomatensaus->id, $Kaas->id, $Salami->id]);
    $Pizza3->ingredientErbij([$Deeg->id, $Tomatensaus->id, $Kaas->id, $Ham->id, $Bacon->id, $Ananas->id]);
    $Pizza4->ingredientErbij([$Deeg->id, $Tomatensaus->id, $Kaas->id, $Mozarella->id]);
    $Pizza5->ingredientErbij([$Deeg->id, $Tomatensaus->id, $Kaas->id, $Basilicum->id]);
    $Pizza6->ingredientErbij([$Deeg->id, $Tomatensaus->id, $Kaas->id, $Olijven->id, $Champignon->id]);

    // Create Users
    $user1 = User::create(['name' => 'User1', 'email' => 'user1@example.com', 'password' => bcrypt('password123')]);
    $user2 = User::create(['name' => 'User2', 'email' => 'user2@example.com', 'password' => bcrypt('password123')]);

    // Create Winkelmandje entries
    $winkelmandje1 = Winkelmandje::create([
        'user_id' => $user1->id,
        'product_id' => $Pizza1->id,
        'size' => 'Normaal',
        'quantity' => 2,
    ]);
    $winkelmandje2 = Winkelmandje::create([
        'user_id' => $user2->id,
        'product_id' => $Pizza3->id,
        'size' => 'Groot',
        'quantity' => 1,
    ]);


    $winkelmandje1->extraIngredients()->attach([$Salami->id, $Bacon->id]);  
    $winkelmandje2->extraIngredients()->attach([$Mozarella->id, $Olijven->id]);  



    $afmetingKlein = Bestelregel::create(['factor' => 0.8, 'afmeting' => 'Klein']);
    $afmetingNormaal = Bestelregel::create(['factor' => 1,'afmeting' => 'Normaal']);
    $afmetingGroot = Bestelregel::create(['factor' => 1.2,'afmeting' => 'Groot']);

    $vraag1 = FAQ::create(['vraag' => 'Wat zijn de openingstijden?', 'antwoord' => 'Wij zijn elke dag open van 12:00 tot 22:00. Op zaterdagen zijn wij geopend van 12:00 tot 04:00.']);
    $vraag2 = FAQ::create(['vraag' => 'Zijn er veganistische opties?', 'antwoord' => 'Ja, er zijn meerdere veganistische opties.']);
    $vraag3 = FAQ::create(['vraag' => 'Kan ik mijn bestelling volgen', 'antwoord' => 'Ja, u kunt uw bestelling volgen via de website.']);
    $vraag4 = FAQ::create(['vraag' => 'Kan ik mijn bestelling annuleren?', 'antwoord' => 'Ja, u kunt uw bestelling binnen 5 minuten tijd annuleren.']);
    $vraag5 = FAQ::create(['vraag' => 'Zijn de pizzas hoge kwaliteit?', 'antwoord' => 'Ja, wij stoppen hier ons hart en ziel in de pizzas.']);
    $vraag6 = FAQ::create(['vraag' => 'Zijn alle ingrediënten vers?', 'antwoord' => 'Ja, alle ingrediënten komen vers binnen.']);
    $vraag7 = FAQ::create(['vraag' => 'Kan ik een eigen pizza maken?', 'antwoord' => 'Ja, je kunt bestaande pizzas bewerken tot je er tevreden mee bent.']);
    $vraag8 = FAQ::create(['vraag' => 'Kan ik een tafel reserveren?', 'antwoord' => 'Ja, reserveringen zijn mogelijk. U kunt ons bereiken door te bellen naar 06-42069420.']);
    $vraag9 = FAQ::create(['vraag' => 'Zijn er kinderfeestjes mogelijk?', 'antwoord' => 'Kinderfeesten zijn erg welkom hier omdat het goed uitkomt met ons thema!']);
    $vraag10 = FAQ::create(['vraag' => 'Hoeveel medewerkers werken er gemiddeld per vestiging?', 'antwoord' => 'Er werken ongeveer 10 medewerkers per vestiging.']);
}
}
