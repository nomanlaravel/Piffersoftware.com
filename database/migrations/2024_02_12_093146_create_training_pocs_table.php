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
        Schema::create('training_pocs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trainings_id');
            $table->text('poc_name')->nullable();
            $table->text('poc_desig')->nullable();
            $table->text('poc_fax')->nullable();
            $table->text('poc_phone')->nullable();
            $table->text('poc_mobile')->nullable();
            $table->text('poc_web')->nullable();
            $table->text('poc_email')->nullable();
            $table->text('poc_loc')->nullable();
            $table->text('poc_document')->nullable();
            $table->text('system_id')->nullable();
            $table->text('other_info')->nullable();
            $table->timestamps();

            $table->foreign('trainings_id')->references('id')->on('trainings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_pocs');
    }
};
