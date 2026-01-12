<?php

// Migration for vendor_pocs table
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendor_pocs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendors_id');
            $table->text('v_poc_name')->nullable();
            $table->text('v_poc_cell')->nullable();
            $table->text('v_poc_email')->nullable();
            $table->text('v_poc_cnic')->nullable();
            $table->text('v_poc_front_attach')->nullable();
            $table->text('v_poc_back_attach')->nullable();
            $table->text('v_poc_notes')->nullable();
            $table->text('v_poc_attach')->nullable();
            $table->timestamps();

            $table->foreign('vendors_id')->references('id')->on('vendors')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendor_pocs');
    }
};

