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
        Schema::create('tracker_companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admins_id');
            $table->text('tracker_company_name')->nullable();
            $table->text('t_poc_name')->nullable(); 
            $table->text('t_poc_web')->nullable();
            $table->text('t_poc_email')->nullable();
            $table->text('t_poc_cell')->nullable();
            $table->text('t_poc_office')->nullable(); 
            $table->text('t_poc_floor')->nullable();
            $table->text('t_poc_building')->nullable();
            $table->text('t_poc_block')->nullable();
            $table->text('t_poc_area')->nullable(); 
            $table->text('t_poc_city')->nullable();
            $table->text('t_poc_loc')->nullable();
            $table->text('t_poc_pin')->nullable();
            $table->text('tracker_note')->nullable();
            $table->text('tracker_attach')->nullable();
            $table->timestamps();

            $table->foreign('admins_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracker_companies');
    }
};
