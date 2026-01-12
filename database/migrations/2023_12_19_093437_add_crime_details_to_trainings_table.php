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
            $table->boolean('crime_check')->after('close_guards_cards')->default(false);
            $table->text('crime_video')->after('crime_check')->nullable();
            $table->text('crime_literature')->after('crime_video')->nullable();
            $table->text('crime_trainer_name')->after('crime_literature')->nullable();
            $table->text('crime_trainer_desig')->after('crime_trainer_name')->nullable();
            $table->text('crime_trainer_email')->after('crime_trainer_desig')->nullable();
            $table->text('crime_trainer_cell')->after('crime_trainer_email')->nullable();
            $table->text('crime_trainer_office')->after('crime_trainer_cell')->nullable();
            $table->text('crime_trainer_rhq')->after('crime_trainer_office')->nullable();
            $table->text('crime_trainer_region')->after('crime_trainer_rhq')->nullable();
            $table->text('crime_trainer_cards')->after('crime_trainer_region')->nullable();
            $table->text('crime_guards_cards')->after('crime_trainer_cards')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->dropColumn('crime_check');
            $table->dropColumn('crime_video');
            $table->dropColumn('crime_literature');
            $table->dropColumn('crime_trainer_name');
            $table->dropColumn('crime_trainer_desig');
            $table->dropColumn('crime_trainer_email');
            $table->dropColumn('crime_trainer_cell');
            $table->dropColumn('crime_trainer_office');
            $table->dropColumn('crime_trainer_rhq');
            $table->dropColumn('crime_trainer_region');
            $table->dropColumn('crime_trainer_cards');
            $table->dropColumn('crime_guards_cards');
        });
    }
};
