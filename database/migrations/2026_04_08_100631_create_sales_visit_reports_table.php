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
        Schema::create('sales_visit_reports', function (Blueprint $table) {
    $table->id();

    $table->foreignId('region_id')->constrained()->cascadeOnDelete();
    $table->foreignId('branch_id')->constrained()->cascadeOnDelete();

    $table->string('employee_name');
    $table->string('designation');

    // Monday
    $table->string('monday_calls')->nullable();
    $table->text('monday_area')->nullable();

    // Tuesday
    $table->string('tuesday_calls')->nullable();
    $table->text('tuesday_area')->nullable();

    // Wednesday
    $table->string('wednesday_calls')->nullable();
    $table->text('wednesday_area')->nullable();

    // Thursday
    $table->string('thursday_calls')->nullable();
    $table->text('thursday_area')->nullable();

    // Friday
    $table->string('friday_calls')->nullable();
    $table->text('friday_area')->nullable();

    $table->date('week_start_date'); // 30-03-2026

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_visit_reports');
    }
};
