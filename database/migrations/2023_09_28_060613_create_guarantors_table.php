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
        Schema::create('guarantors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hrms_id'); // Foreign key to link guarantor to an HRMS record
            $table->string('g_name')->nullable();
            $table->string('g_fname')->nullable();
            $table->string('g_relation')->nullable();
            $table->string('g_tenure_rel')->nullable();
            $table->string('g_cnic_f')->nullable();
            $table->string('g_cnic_b')->nullable();
            $table->string('pos_verify')->nullable();
            $table->string('head_office_no')->nullable();
            $table->string('head_floor_no')->nullable();
            $table->string('head_building')->nullable();
            $table->string('head_block')->nullable();
            $table->string('head_area')->nullable();
            $table->string('head_city')->nullable();
            $table->string('head_attach')->nullable();
            $table->timestamps();

            $table->foreign('hrms_id')->references('id')->on('hrms')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guarantors');
    }
};
