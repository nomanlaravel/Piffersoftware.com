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
            $table->text('training_region')->after('training_no')->nullable();
            $table->time('guest_invitation')->after('training_e_time')->nullable();
            $table->date('reg_date')->after('guest_invitation')->nullable();
            $table->time('reg_time')->after('reg_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            //
        });
    }
};
