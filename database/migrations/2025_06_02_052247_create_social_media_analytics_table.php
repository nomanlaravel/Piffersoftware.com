<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialMediaAnalyticsTable extends Migration
{
    public function up(): void
    {
        Schema::create('social_media_analytics', function (Blueprint $table) {
            $table->id();
            $table->date('date')->unique();
            $table->text('description')->nullable();

            // LinkedIn columns
            $table->string('linkedin_morning_post')->nullable();
            $table->string('linkedin_why_pifra')->nullable();
            $table->string('linkedin_what_we_do')->nullable();
            $table->string('linkedin_subscribers')->nullable();
            $table->string('linkedin_comments')->nullable();
            // Facebook columns
            $table->string('facebook_morning_post')->nullable();
            $table->string('facebook_why_pifra')->nullable();
            $table->string('facebook_what_we_do')->nullable();
            $table->string('facebook_subscribers')->nullable();
            $table->string('facebook_comments')->nullable();
            // Instagram columns
            $table->string('instagram_morning_post')->nullable();
            $table->string('instagram_why_pifra')->nullable();
            $table->string('instagram_what_we_do')->nullable();
            $table->string('instagram_subscribers')->nullable();
            $table->string('instagram_comments')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('social_media_analytics');
    }
}

