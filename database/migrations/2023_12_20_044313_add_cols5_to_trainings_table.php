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
            $table->text('hospital_floor')->after('nearest_hospital')->nullable();
            $table->text('hospital_builduing')->after('hospital_floor')->nullable();
            $table->text('hospital_block')->after('hospital_builduing')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->dropColumn('hospital_floor');
            $table->dropColumn('hospital_builduing');
            $table->dropColumn('hospital_block');
        });
    }
};
