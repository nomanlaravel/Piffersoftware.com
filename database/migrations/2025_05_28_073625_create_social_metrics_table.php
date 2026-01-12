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
        Schema::create('social_metrics', function (Blueprint $table) {
            $table->id();
            $table->string('platform'); // e.g., facebook, linkedin
            $table->string('post_type'); // e.g., morning_post, why_pifra
            $table->integer('likes')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_metrics');
    }
};
