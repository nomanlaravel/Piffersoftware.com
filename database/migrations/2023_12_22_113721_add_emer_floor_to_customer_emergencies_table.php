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
            $table->integer('emer_floor')->after('emer_office')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_emergencies', function (Blueprint $table) {
            $table->dropColumn('emer_floor');
        });
    }
};
