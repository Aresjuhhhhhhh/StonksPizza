<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            
            // Foreign key linking to the 'orders' table
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            
            // Foreign key linking to the 'pizzas' table (the product ordered)
            $table->foreignId('product_id')->constrained('pizzas')->onDelete('cascade');
            
            // Foreign key linking to the 'bestelregels' table (size of the pizza)
            $table->foreignId('grootte_id')->constrained('bestelregels')->onDelete('cascade');
            
            // Quantity of this particular pizza/item in the order
            $table->integer('quantity');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};
