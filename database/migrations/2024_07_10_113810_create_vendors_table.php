<?php

// Migration for vendors table
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->text('vendor_id')->nullable();
            $table->text('vendor_name')->nullable();
            $table->text('desc_vendor')->nullable();
            $table->text('vendor_profile_attach')->nullable();
            $table->text('vendor_email')->nullable();
            $table->text('vendor_website')->nullable();
            $table->text('vendor_notes')->nullable();
            $table->text('vendor_attach')->nullable();

            // Office Address
            $table->text('office_no')->nullable();
            $table->text('o_floor')->nullable();
            $table->text('o_building')->nullable();
            $table->text('o_block')->nullable();
            $table->text('o_area')->nullable();
            $table->text('o_city')->nullable();
            $table->text('o_photo')->nullable();
            $table->text('o_pin')->nullable();
            $table->text('o_email')->nullable();
            $table->text('o_website')->nullable();

            // Factory Address
            $table->text('f_office_no')->nullable();
            $table->text('f_floor')->nullable();
            $table->text('f_building')->nullable();
            $table->text('f_block')->nullable();
            $table->text('f_area')->nullable();
            $table->text('f_city')->nullable();
            $table->text('f_photo')->nullable();
            $table->text('f_pin')->nullable();
            $table->text('f_email')->nullable();
            $table->text('f_website')->nullable();

            // Warehouse Address
            $table->text('w_office_no')->nullable();
            $table->text('w_floor')->nullable();
            $table->text('w_building')->nullable();
            $table->text('w_block')->nullable();
            $table->text('w_area')->nullable();
            $table->text('w_city')->nullable();
            $table->text('w_photo')->nullable();
            $table->text('w_pin')->nullable();
            $table->text('w_email')->nullable();
            $table->text('w_website')->nullable();

            // Corporate Details
            $table->text('vendor_cuin')->nullable();
            $table->text('vendor_ntn')->nullable();
            $table->text('vendor_sin')->nullable();
            $table->text('vendor_secp_attach')->nullable();
            $table->text('cop_notes')->nullable();
            $table->text('cop_attach')->nullable();
            $table->text('type_of_entity')->nullable();
            $table->text('certification_attach')->nullable();
            $table->text('directors_attach')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
