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
        Schema::create('requirementcanines', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('requirements_id');

            $table->text('canine_req_for')->nullable();
            $table->text('canine_category')->nullable();
            $table->text('canine_req_for_days')->nullable();
            $table->text('canine_color')->nullable();
            $table->text('canine_no')->nullable();
            $table->text('canine_req_handler')->nullable();
            $table->text('canine_handler_name')->nullable();
            $table->text('canine_handler_cnic_no')->nullable();
            $table->text('canine_handler_age')->nullable();
            $table->text('canine_handler_exp')->nullable();
            $table->text('canine_handler_cell')->nullable();
            $table->text('canine_handler_cnic_front')->nullable();
            $table->text('canine_handler_cnic_back')->nullable();
            $table->date('canine_duty_start_date')->nullable();
            $table->date('canine_duty_end_date')->nullable();
            $table->time('canine_duty_start_time')->nullable();
            $table->time('canine_duty_end_time')->nullable();
            $table->text('canine_shift_duration')->nullable();
            $table->text('canine_no_of_shifts')->nullable();
            $table->text('canine_pic_of_dogs')->nullable();
            $table->text('canine_notes')->nullable();
            $table->text('canine_attach')->nullable();

            $table->foreign('requirements_id')->references('id')->on('requirements')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirementcanines');
    }
};
