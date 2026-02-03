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
        Schema::create('employee_bank_details', function (Blueprint $table) {
            $table->id();
            $table->string('account_title');
            $table->string('account_number');
            $table->string('bank_name');
            $table->string('branch_name');
            $table->unsignedBigInteger('hrm_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('hrm_id')->references('id')->on('hrms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_bank_details');
    }
};
