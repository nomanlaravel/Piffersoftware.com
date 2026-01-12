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
        Schema::table('customer_departments', function (Blueprint $table) {
            $table->text('longitude3')->after('dept_pin')->nullable();
            $table->text('latitude3')->after('longitude3')->nullable();
            $table->dropColumn('dept_gps');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_departments', function (Blueprint $table) {
            $table->dropColumn('longitude3');
            $table->dropColumn('latitude3');
            $table->text('dept_gps')->nullable();
        });
    }
};
