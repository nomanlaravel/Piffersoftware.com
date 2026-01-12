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
        Schema::create('requirementbarriers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requirements_id');

            $table->text('barrier_ownership')->nullable();
            $table->text('barrier_rental')->nullable();
            $table->text('barrier_no_of_days')->nullable();
            $table->text('barrier_model')->nullable();
            $table->text('barrier_brand')->nullable();
            $table->text('barrier_specifications')->nullable();
            $table->text('barrier_quantity')->nullable();
            $table->text('barrier_unit')->nullable();
            $table->text('barrier_price')->nullable();
            $table->text('detector_model')->nullable();
            $table->text('detector_brand')->nullable();
            $table->text('detector_specifications')->nullable();
            $table->text('detector_quantity')->nullable();
            $table->text('detector_unit')->nullable();
            $table->text('detector_price')->nullable();
            $table->text('traffic_model')->nullable();
            $table->text('traffic_brand')->nullable();
            $table->text('traffic_specifications')->nullable();
            $table->text('traffic_quantity')->nullable();
            $table->text('traffic_unit')->nullable();
            $table->text('traffic_price')->nullable();
            $table->text('coupler_model')->nullable();
            $table->text('coupler_brand')->nullable();
            $table->text('coupler_specification')->nullable();
            $table->text('coupler_quantity')->nullable();
            $table->text('coupler_unit')->nullable();
            $table->text('coupler_price')->nullable();
            $table->text('tag_model')->nullable();
            $table->text('tag_brand')->nullable();
            $table->text('tag_specifications')->nullable();
            $table->text('tag_quantity')->nullable();
            $table->text('tag_unit')->nullable();
            $table->text('tag_price')->nullable();
            $table->text('Etag_model')->nullable();
            $table->text('Etag_brand')->nullable();
            $table->text('Etag_specifications')->nullable();
            $table->text('Etag_quantity')->nullable();
            $table->text('Etag_unit')->nullable();
            $table->text('Etag_price')->nullable();
            $table->text('pole_model')->nullable();
            $table->text('pole_brand')->nullable();
            $table->text('pole_specifications')->nullable();
            $table->text('pole_quantity')->nullable();
            $table->text('pole_unit')->nullable();
            $table->text('pole_price')->nullable();
            $table->text('breaker_model')->nullable();
            $table->text('breaker_brand')->nullable();
            $table->text('breaker_specifications')->nullable();
            $table->text('breaker_quantity')->nullable();
            $table->text('breaker_unit')->nullable();
            $table->text('breaker_price')->nullable();
            $table->text('barrier_installation')->nullable();
            $table->text('barrier_training')->nullable();
            $table->text('barrier_upload_training')->nullable();
            $table->text('barrier_delivery')->nullable();
            $table->boolean('barrier_del_loc')->default(false);
            $table->text('barrier_office_no')->nullable();
            $table->text('barrier_floor')->nullable();
            $table->text('barrier_building')->nullable();
            $table->text('barrier_block')->nullable();
            $table->text('barrier_area')->nullable();
            $table->text('barrier_city')->nullable();
            $table->text('barrier_photo_building')->nullable();
            $table->text(column: 'barrier_pin_loc')->nullable();
            $table->boolean('barrier_ins_loc')->default(false);
            $table->text('barrier_ins_office')->nullable();
            $table->text('barrier_ins_floor')->nullable();
            $table->text('barrier_ins_building')->nullable();
            $table->text('barrier_ins_block')->nullable();
            $table->text('barrier_ins_area')->nullable();
            $table->text('barrier_ins_city')->nullable();
            $table->text('barrier_ins_photo_building')->nullable();
            $table->text('barrier_ins_pin_loc')->nullable();
            $table->text('barrier_attachments')->nullable();
            $table->text('barrier_notes')->nullable();

            $table->foreign('requirements_id')->references('id')->on('requirements')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirementbarriers');
    }
};
