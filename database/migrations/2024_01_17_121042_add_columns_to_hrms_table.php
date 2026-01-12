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
        Schema::table('hrms', function (Blueprint $table) {
            $table->text('hrm_region')->after('hired_at')->nullable();
            $table->text('hrm_location')->after('hrm_region')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hrms', function (Blueprint $table) {
            //
        });
    }
};
