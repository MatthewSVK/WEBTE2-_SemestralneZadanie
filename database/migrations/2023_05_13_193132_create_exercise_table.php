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
        Schema::create('exercises', function (Blueprint $table) {
            $table->unsignedBigInteger("task_id")->autoIncrement()->index(); // Add index to the 'task_id' column
            $table->string('id');
            $table->string("task");
            $table->string("image");
            $table->string("solution");
            $table->string("file_name")->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercise');
    }
};
