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
        Schema::create('manytomany_exercises_student', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->unsignedBigInteger('generated_task_id');
            $table->foreign('generated_task_id')->references('id')->on('generated_tasks_by_student')->onDelete('cascade');
            $table->unsignedBigInteger('exercise_task_id'); // Corrected column name
            $table->foreign('exercise_task_id')->references('task_id')->on('exercises')->onDelete('cascade'); // Corrected foreign key reference
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manytomany_exercises_student');
    }
};
