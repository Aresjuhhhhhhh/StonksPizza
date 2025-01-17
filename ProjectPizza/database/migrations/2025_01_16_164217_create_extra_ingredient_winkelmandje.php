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
        Schema::create('extra_ingredient_winkelmandje', function (Blueprint $table) {
            $table->id();
            $table->foreignId('winkelmandje_id')->constrained('winkelmandje'); 
            $table->foreignId('ingredient_id')->constrained('ingredienten'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extra_ingredient_winkelmandje');
    }
};
