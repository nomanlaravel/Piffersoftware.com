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
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admins_id');
            $table->text('serial_no')->nullable();
            $table->text('r_desc')->nullable(); 
            $table->text('r_amount')->nullable();
            $table->text('r_pay_by')->nullable();
            $table->date('r_date')->nullable();
            $table->text('repair_company_name')->nullable(); 
            $table->text('r_poc_name')->nullable();
            $table->text('r_poc_web')->nullable();
            $table->text('r_poc_email')->nullable();
            $table->text('r_poc_cell')->nullable(); 
            $table->text('r_poc_office')->nullable();
            $table->text('r_poc_floor')->nullable();
            $table->text('r_poc_building')->nullable();
            $table->text('r_poc_block')->nullable();
            $table->text('r_poc_area')->nullable();
            $table->text('r_poc_city')->nullable();
            $table->text('r_poc_loc')->nullable(); 
            $table->text('r_poc_pin')->nullable();
            $table->text('r_warranty')->nullable();
            $table->text('warranty_note')->nullable();
            $table->text('repair_note')->nullable(); 
            $table->text('repair_attach')->nullable();
            $table->timestamps();

            $table->foreign('admins_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repairs');
    }
};
