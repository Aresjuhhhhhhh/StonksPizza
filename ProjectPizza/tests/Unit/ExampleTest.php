<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\IngredientController;
use Illuminate\Http\Request;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_method_pizza()
    {
        $pizzaController = new PizzaController();
        $request = new Request([
            'naam' => 'TestPizza',
            'totaalPrijs' => 10.5,
            'beschrijving' => 'Een test pizza.',
            'imagePath' => 'testpizza.png',
        ]);
        $pizzaController->store($request);
        $this->assertDatabaseHas('pizzas', [
            'naam' => 'TestPizza',
            'totaalPrijs' => 10.5,
        ]);
    }

    public function test_store_method_ingredient()
    {
        $ingredientController = new IngredientController();
        $request = new Request([
            'naam' => 'TestIngredient',
            'verkoopPrijs' => 3.0,
        ]);
        $ingredientController->store($request);
        $this->assertDatabaseHas('ingredienten', [
            'naam' => 'TestIngredient',
            'verkoopPrijs' => 3.0,
        ]);
    }
}