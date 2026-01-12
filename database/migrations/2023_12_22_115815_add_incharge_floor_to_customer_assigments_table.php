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
        Schema::table('customer_assigments', function (Blueprint $table) {
            $table->integer('incharge_floor')->after('incharge_offc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_assigments', function (Blueprint $table) {
            $table->dropColumn('incharge_floor');
        });
    }
};
