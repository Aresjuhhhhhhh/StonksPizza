<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('pizzas')->onDelete('cascade');
            $table->foreignId('grootte_id')->constrained('bestelregels')->onDelete('cascade');
            $table->foreignId('winkelmandje_id')->constrained('winkelmandje')->onDelete('cascade'); 
            $table->date('datum');
            $table->integer('quantity');
            $table->string('status');
            $table->string('bestelmethode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
