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
        Schema::create('order_item_ingredients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_item_id')->constrained('order_items')->onDelete('cascade');
            $table->foreignId('ingredient_id')->constrained('ingredienten')->onDelete('cascade');
            $table->integer('quantity')->default(1); // Quantity of the ingredient
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_item_ingredients');
    }
};
