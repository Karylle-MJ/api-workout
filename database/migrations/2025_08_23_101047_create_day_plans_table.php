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
        Schema::create('day_plans', function (Illuminate\Database\Schema\Blueprint $table) {
            $table->id();
            $table->enum('day', [
                'monday','tuesday','wednesday','thursday','friday','saturday','sunday'
            ])->unique();
            $table->string('workout_title');
            $table->text('details')->nullable();
            $table->boolean('is_rest')->default(false);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('day_plans');
    }
};
