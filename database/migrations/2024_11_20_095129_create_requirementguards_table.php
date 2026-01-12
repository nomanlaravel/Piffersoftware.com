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
        Schema::create('requirementguards', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('requirements_id');
            $table->text('guard_category')->nullable();
            $table->text('guard_quantity')->nullable();
            $table->text('guard_shift_timing')->nullable();
            $table->text('guard_food')->nullable();
            $table->text('guard_accomodation')->nullable();
            $table->text('guard_transportation')->nullable();
            $table->text('guard_required_monthly')->nullable();
            $table->text('guard_required_dialy')->nullable();
            $table->text('no_of_days_guard_required')->nullable();
            $table->text('financial_working_excel_attach')->nullable();
            $table->text('financial_working_word_attach')->nullable();
            $table->text('financial_working_pdf_attach')->nullable();
            $table->text(column: 'guard_notes')->nullable();
            $table->text('guard_attach')->nullable();

            $table->foreign('requirements_id')->references('id')->on('requirements')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirementguards');
    }
};
