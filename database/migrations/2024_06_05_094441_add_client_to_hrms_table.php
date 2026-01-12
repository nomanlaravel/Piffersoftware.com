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
            $table->text('client_id')->after('hrm_location')->nullable();
            $table->text('client_name')->after('client_id')->nullable();
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
