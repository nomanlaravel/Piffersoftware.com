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
        Schema::table('lumpsumshownwhts', function (Blueprint $table) {
            $table->text('ls_sw_weapon_cost')->nullable()->change();
            $table->text('ls_sw_monthly_rate')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lumpsumshownwhts', function (Blueprint $table) {
            //
        });
    }
};
