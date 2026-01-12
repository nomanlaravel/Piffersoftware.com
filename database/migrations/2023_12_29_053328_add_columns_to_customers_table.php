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
            $table->text('visit_perf_by')->after('marks_grand_total')->nullable();
            $table->text('pat_super_loc')->after('visit_perf_by')->nullable();
            $table->date('pat_super_date')->after('pat_super_loc')->nullable();
            $table->text('pat_super_time')->after('pat_super_date')->nullable();
            $table->text('pat_super_photo')->after('pat_super_time')->nullable();
            $table->text('pat_super_video')->after('pat_super_photo')->nullable();
            $table->integer('pat_super_inform_email')->after('pat_super_video')->default('0')->nullable();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('visit_perf_by');
            $table->dropColumn('pat_super_loc');
            $table->dropColumn('pat_super_date');
            $table->dropColumn('pat_super_time');
            $table->dropColumn('pat_super_photo');
            $table->dropColumn('pat_super_video');
            $table->dropColumn('pat_super_inform_email');
        });
    }
};
