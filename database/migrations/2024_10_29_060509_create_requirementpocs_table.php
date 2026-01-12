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
        Schema::create('requirementpocs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requirements_id');
            $table->text('req_poc_name')->nullable();
            $table->text('req_poc_num')->nullable();
            $table->text('req_poc_desig')->nullable();
            $table->text('req_poc_visiting_front')->nullable();
            $table->text('req_poc_visiting_back')->nullable();
            $table->text('req_poc_email')->nullable();
            $table->text('req_poc_org_name')->nullable();
            $table->text('req_poc_office_no')->nullable();
            $table->text('req_poc_floor')->nullable();
            $table->text('req_poc_building')->nullable();
            $table->text('req_poc_block')->nullable();
            $table->text('req_poc_area')->nullable();
            $table->text('req_poc_city')->nullable();
            $table->text('req_poc_building_attach')->nullable();
            $table->text('req_poc_pin')->nullable();
            $table->timestamps();

            $table->foreign('requirements_id')->references('id')->on('requirements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirementpocs');
    }
};
