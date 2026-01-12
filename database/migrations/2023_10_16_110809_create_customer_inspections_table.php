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
        Schema::create('customer_inspections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customers_id');
            $table->text('inspection_no')->nullable();
            $table->text('inspection_emp_id')->nullable();
            $table->text('inspection_emp_name')->nullable();
            $table->text('inspection_emp_cell')->nullable();
            $table->text('inspection_emp_dept')->nullable();
            $table->text('inspection_date')->nullable();
            $table->text('inspection_pic')->nullable();
            $table->text('inspection_rem_petr')->nullable();
            $table->longText('inspection_note')->nullable();
            $table->text('inspection_attach')->nullable();

            $table->timestamps();
            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_inspections');
    }
};
