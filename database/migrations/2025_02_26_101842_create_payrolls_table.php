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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hrm_id')->constrained('hrms')->onDelete('cascade');
            $table->string('client_id');
            $table->string('client_name');
            $table->string('payroll_month');
            $table->string('prepared_by');
            $table->string('category');
            $table->string('guard_name');
            $table->string('civil_ex_army')->nullable();
            $table->string('cnic_number');
            $table->integer('cnic_digits');
            $table->string('father_name');
            $table->string('mobile_no');
            $table->date('dob');
            $table->string('bank_name');
            $table->string('bank_code');
            $table->string('iban');
            $table->integer('account_digits');
            $table->integer('days_worked');
            $table->integer('time_hours');
            $table->integer('days_payable');
            $table->integer('days_in_month');
            $table->string('paid_extra')->default('No');
            $table->decimal('eobi', 10, 2)->nullable();
            $table->decimal('food_allowance', 10, 2)->nullable();
            $table->decimal('arrears', 10, 2)->nullable();
            $table->decimal('overtime', 10, 2)->nullable();
            $table->decimal('payable_salary', 10, 2);
            $table->decimal('eobi_deduction', 10, 2)->nullable();
            $table->decimal('other_deductions', 10, 2)->nullable();
            $table->decimal('net_payable_salary', 10, 2);
            $table->string('location');
            $table->text('remarks')->nullable();
            $table->string('paid_status')->default('Unpaid');
            $table->string('region');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
