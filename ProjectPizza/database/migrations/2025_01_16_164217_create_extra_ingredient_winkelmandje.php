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
            $table->foreignId('winkelmandje_id')->constrained('winkelmandje')->onDelete('cascade'); 
            $table->foreignId('ingredient_id')->constrained('ingredienten')->onDelete('cascade'); 
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
