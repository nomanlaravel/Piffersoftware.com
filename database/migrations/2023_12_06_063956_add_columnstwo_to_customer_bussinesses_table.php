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
        Schema::table('customer_bussinesses', function (Blueprint $table) {
            $table->text('longitude5')->after('bussiness_pin')->nullable();
            $table->text('latitude5')->after('longitude5')->nullable();
            $table->dropColumn('bussiness_gps');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_bussinesses', function (Blueprint $table) {
            $table->text('longitude5')->after('bussiness_pin')->nullable();
            $table->text('latitude5')->after('longitude5')->nullable();
            $table->dropColumn('bussiness_gps');
        });
    }
};
