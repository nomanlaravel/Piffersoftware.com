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
        Schema::table('social_media_analytics', function (Blueprint $table) {
                   // ✅ Step 1: Column add karo
        $table->unsignedBigInteger('branch_id')->nullable();

        // ✅ Step 2: Foreign key lagao
        $table->foreign('branch_id')
              ->references('id')
              ->on('admins')
              ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('social_media_analytics', function (Blueprint $table) {
            //
        });
    }
};
