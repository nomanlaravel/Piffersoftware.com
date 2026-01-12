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
        Schema::table('customer_emergencies', function (Blueprint $table) {
            $table->text('longitude2')->after('emer_pin')->nullable();
            $table->text('latitude2')->after('longitude2')->nullable();
            $table->dropColumn('emer_gps');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_emergencies', function (Blueprint $table) {
            $table->dropColumn('longitude2');
            $table->dropColumn('latitude2');
            $table->text('emer_gps')->nullable();
        });
    }
};
