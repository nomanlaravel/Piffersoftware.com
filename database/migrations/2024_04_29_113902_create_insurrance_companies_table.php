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
        Schema::create('insurrance_companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admins_id');
            $table->text('company_name')->nullable();
            $table->text('i_poc_name')->nullable(); 
            $table->text('i_poc_web')->nullable();
            $table->text('i_poc_email')->nullable();
            $table->text('i_poc_cell')->nullable();
            $table->text('value_of_sum')->nullable(); 
            $table->text('ins_p_pic')->nullable();
            $table->text('c_of_ins')->nullable();
            $table->text('i_poc_office')->nullable();
            $table->text('i_poc_floor')->nullable(); 
            $table->text('i_poc_building')->nullable();
            $table->text('i_poc_block')->nullable();
            $table->text('i_poc_area')->nullable();
            $table->text('i_poc_city')->nullable(); 
            $table->text('i_poc_loc')->nullable();
            $table->text('i_poc_pin')->nullable();
            $table->text('ins_note')->nullable();
            $table->text('ins_attach')->nullable();
            $table->timestamps();

            $table->foreign('admins_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurrance_companies');
    }
};
