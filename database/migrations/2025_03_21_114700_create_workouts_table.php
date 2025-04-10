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
        Schema::create('workouts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key
            $table->foreignId('exercise_id')->constrained()->onDelete('cascade'); // Foreign key
            $table->string('intensity');
            $table->string('type');
            $table->integer('number')->default(1);
            $table->integer('calories');
            $table->integer('duration');
            $table->date('date');
            $table->text('notes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workouts');
    }
};
