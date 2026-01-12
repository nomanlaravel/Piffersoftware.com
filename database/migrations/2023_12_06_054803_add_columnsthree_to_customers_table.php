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
        Schema::table('customers', function (Blueprint $table) {
            $table->text('longitude')->after('poc_pin')->nullable();
            $table->text('latitude')->after('longitude')->nullable();
            $table->text('longitude1')->after('cf_pin')->nullable();
            $table->text('latitude1')->after('longitude1')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('longitude');
            $table->dropColumn('latitude');
            $table->dropColumn('longitude1');
            $table->dropColumn('latitude1');
        });
    }
};
