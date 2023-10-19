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
        Schema::create('breakes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime("startTime");
            $table->dateTime("endTime");
            $table->string("name");
            $table->string("reason");
            $table->foreignId("schedule_id")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('breakes');
    }
};
