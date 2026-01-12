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
        Schema::table('requirementfacilitations', function (Blueprint $table) {
            $table->text('copy_of_guest_ticket')->nullable()->change();
            $table->text('copy_of_guest_visa')->nullable()->change();
            $table->text('guest_schedule')->nullable()->change();
            $table->text('hand_carry')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('requirementfacilitations', function (Blueprint $table) {
            //
        });
    }
};
