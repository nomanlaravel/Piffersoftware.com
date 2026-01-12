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
        Schema::create('customer_departments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customers_id');
            $table->text('dept_type')->nullable();
            $table->text('dept_name')->nullable();
            $table->text('dept_email')->nullable();
            $table->text('dept_cell')->nullable();
            $table->text('dept_address')->nullable();
            $table->text('dept_desig')->nullable();
            $table->text('dept_front')->nullable();
            $table->text('dept_back')->nullable();
            $table->longText('dept_notes')->nullable();
            $table->text('dept_attach')->nullable();
            $table->text('dept_office')->nullable();
            $table->text('dept_build')->nullable();
            $table->text('dept_block')->nullable();
            $table->text('dept_area')->nullable();
            $table->text('dept_city')->nullable();
            $table->text('dept_photo')->nullable();
            $table->text('dept_pin')->nullable();
            $table->text('dept_gps')->nullable();
            $table->longText('dept_ex_notes')->nullable();
            $table->text('dept_ex_attach')->nullable();
            $table->timestamps();

            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_departments');
    }
};
