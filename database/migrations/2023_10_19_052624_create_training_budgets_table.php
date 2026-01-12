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
        Schema::create('training_budgets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trainings_id');
            $table->boolean('out_of_scope')->default(false);
            $table->text('budget_category')->nullable();
            $table->text('mode_of_payment')->nullable();
            $table->text('budget_ins_no')->nullable();
            $table->text('name_of_bank')->nullable();
            $table->date('date_of_payment')->nullable();
            $table->text('amount_per_unit')->nullable();
            $table->text('total_amount')->nullable();
            $table->text('cheque_attach')->nullable();
            $table->text('voucher_attach')->nullable();
            $table->text('estimated_amount')->nullable();
            $table->text('actual_amount')->nullable();
            $table->text('total_expense')->nullable();
            $table->timestamps();

            $table->foreign('trainings_id')->references('id')->on('trainings')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_budgets');
    }
};
