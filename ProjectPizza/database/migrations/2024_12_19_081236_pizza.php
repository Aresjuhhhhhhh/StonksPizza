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
        Schema::create('pizzas', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->decimal('totaalPrijs', 5, 2)->default(0);
            $table->timestamps();
        });
        Schema::create('ingredienten', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->decimal('verkoopPrijs', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pizzas');
        Schema::dropIfExists('ingredienten');
    }
};
