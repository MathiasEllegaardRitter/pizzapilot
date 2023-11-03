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
        Schema::create('day_schedules', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('day_id')->references('id')->on('days')->onDelete('cascade');
            $table->foreignId('schedule_id')->references('id')->on('schedules')->onDelete('cascade');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->date('date')->nullable();
            $table->boolean('is_special')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('day_schedules');
    }
};
