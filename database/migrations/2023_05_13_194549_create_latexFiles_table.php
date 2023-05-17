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
        Schema::create('latexFiles', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->boolean("active")->default(false);
            $table->timestamp("from")->nullable();
            $table->timestamp("to")->nullable();
            $table->integer("points")->default(100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
