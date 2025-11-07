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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('আমাদের ইতিহাস');
            $table->text('paragraph1')->nullable();
            $table->text('paragraph2')->nullable();
            $table->string('card1_title')->nullable();
            $table->text('card1_description')->nullable();
            $table->string('card2_title')->nullable();
            $table->text('card2_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
