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
        Schema::create('delivery_checkers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('zipcode_id')->references('id')->on('zipcodes')->onDelete('cascade');
            $table->foreignId('pizza_store_id')->references('id')->on('pizza_stores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_checkers');
    }
};
