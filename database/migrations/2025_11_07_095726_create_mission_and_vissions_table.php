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
        Schema::create('mission_and_vissions', function (Blueprint $table) {
            $table->id();
            $table->string('title1')->nullable();
            $table->text('description1')->nullable();
            $table->string('title2')->nullable();
            $table->text('description2')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mission_and_vissions');
    }
};
