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
            $table->dropColumn('pat_super_time');
            $table->text('pat_super_day')->after('pat_super_date')->nullable();
            $table->time('pat_super_times')->after('pat_super_day')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->text('pat_super_time')->after('pat_super_date')->nullable();
            $table->dropColumn('pat_super_day');
            $table->dropColumn('pat_super_times');
        });
    }
};
