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
            $table->integer('dept_floor')->after('dept_office')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_departments', function (Blueprint $table) {
            $table->dropColumn('dept_floor');
        });
    }
};
