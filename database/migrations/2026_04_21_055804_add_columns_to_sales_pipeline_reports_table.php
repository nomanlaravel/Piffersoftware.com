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
        Schema::table('sales_pipeline_reports', function (Blueprint $table) {
                $table->unsignedBigInteger('admin_id')->nullable()->after('prospect_name');
                $table->string('sales_visit')->nullable()->after('admin_id');
                $table->string('proposal_sent')->nullable()->after('sales_visit');
                $table->string('quotation_sent')->nullable()->after('proposal_sent');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sales_pipeline_reports', function (Blueprint $table) {
            //
        });
    }
};
