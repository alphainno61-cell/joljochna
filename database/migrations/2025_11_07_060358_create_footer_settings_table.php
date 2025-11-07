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
        Schema::create('footer_settings', function (Blueprint $table) {
            $table->id();
            $table->string('project_name')->nullable();
            $table->text('project_description')->nullable();
            $table->string('phone_numbers')->nullable();
            $table->string('email')->nullable();
            $table->string('project_address')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->boolean('show_payment_methods')->default(true);
            $table->string('google_map_url')->nullable();
            $table->string('logo_image')->nullable();
            $table->string('project_roadmap_image')->nullable();
            $table->string('qr_code_image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_settings');
    }
};
