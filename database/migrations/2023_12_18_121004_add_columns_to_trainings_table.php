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
        Schema::table('trainings', function (Blueprint $table) {
            $table->text('guard_resp_attach')->after('copy_booking_attach')->nullable();
            $table->text('list_guard_attach')->after('guard_resp_attach')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->dropColumn('guard_resp_attach');
            $table->dropColumn('list_guard_attach');
        });
    }
};
