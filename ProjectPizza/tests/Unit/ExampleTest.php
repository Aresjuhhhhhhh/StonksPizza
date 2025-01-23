<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Ingredient;
use App\Models\Pizza;
use Illuminate\Http\Request;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_that_true_is_true()
    {
        $this->assertTrue(true);
    }

    public function test_store_method_pizza()
    {
        // Create a new PizzaController instance
        $pizzaController = new Pizza();

        // Call the store method with a new pizza
        $pizzaController->store(new Request([
            'naam' => 'TestPizza',
            'totaalPrijs' => 10.5,
            'beschrijving' => 'Een test pizza.',
            'imagePath' => 'testpizza.png',
        ]));

        // Assert the database contains the new pizza
        $this->assertDatabaseHas('pizzas', [
            'naam' => 'TestPizza',
            'totaalPrijs' => 10.5,
        ]);
    }

    public function test_store_method_ingredient()
    {
        // Create a new IngredientController instance
        $ingredientController = new Ingredient();

        // Call the store method with a new ingredient
        $ingredientController->store(new Request([
            'naam' => 'TestIngredient',
            'verkoopPrijs' => 3.0,
        ]));

        // Assert the database contains the new ingredient
        $this->assertDatabaseHas('ingredients', [
            'naam' => 'TestIngredient',
            'verkoopPrijs' => 3.0,
        ]);
    }
}