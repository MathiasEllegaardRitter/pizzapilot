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
            $table->dateTime("start_date");
            $table->dateTime("end_date");
            $table->string("name");
            $table->string("reason");
            $table->foreignId("schedule_id")->constrained('schedules')->cascadeOnDelete()->nullable();
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
