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
        Schema::create('visit_pipeline_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('admins')->onDelete('cascade');
    $table->foreignId('region_id')->constrained('regions')->onDelete('cascade');
    $table->string('branch_office_name')->nullable();
    $table->string('customer_name');
    $table->string('sales_visit')->nullable();
    $table->string('proposal_sent')->nullable();
    $table->string('quotation_sent')->nullable();
    $table->string('guard_deployed_by_ho')->nullable();
    $table->string('new_client_name')->nullable();
    $table->string('contractual_value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visit_pipeline_reports');
    }
};
