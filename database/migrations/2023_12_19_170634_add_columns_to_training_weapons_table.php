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
        Schema::table('training_weapons', function (Blueprint $table) {
            $table->text('weapon_price_pu')->after('bore')->nullable();
            $table->text('weapon_total_price')->after('weapon_price_pu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('training_weapons', function (Blueprint $table) {
            $table->dropColumn('weapon_price_pu');
            $table->dropColumn('weapon_total_price');
        });
    }
};
