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
        Schema::create('training_emergencies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trainings_id');
            $table->text('train_emer_ser')->nullable();
            $table->text('train_emer_pic')->nullable();
            $table->text('train_emer_poc_name')->nullable();
            $table->text('train_emer_poc_desig')->nullable();
            $table->text('train_emer_poc_cell')->nullable();
            $table->text('train_emer_poc_email')->nullable();
            $table->longText('train_emer_poc_notes')->nullable();
            $table->text('train_emer_poc_attach')->nullable();
            $table->text('train_emer_office')->nullable();
            $table->text('train_emer_building')->nullable();
            $table->text('train_emer_block')->nullable();
            $table->text('train_emer_area')->nullable();
            $table->text('train_emer_city')->nullable();
            $table->text('train_emer_buildphoto')->nullable();
            $table->text('train_emer_email')->nullable();
            $table->text('train_emer_web')->nullable();
            $table->text('train_emer_pin')->nullable();
            $table->text('train_emer_app_rental')->nullable();
            $table->text('train_emer_attach')->nullable();
            $table->longText('train_emer_note')->nullable();
            $table->timestamps();

            $table->foreign('trainings_id')->references('id')->on('trainings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_emergencies');
    }
};
