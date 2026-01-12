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
        Schema::create('requirementequipments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requirements_id');

            $table->text('equipment_category')->nullable();
            $table->text('equipment_ownership')->nullable();
            $table->text('equipment_rental')->nullable();
            $table->text('equipment_no_of_days')->nullable();
            $table->text('equipment_quality')->nullable();
            $table->text('equipment_training')->nullable();
            $table->text('equipment_delivery')->nullable();
            $table->boolean('equipment_dilevery_loc')->default(false);
            $table->text('equipment_del_office_no')->nullable();
            $table->text('equipment_del_floor')->nullable();
            $table->text('equipment_del_building')->nullable();
            $table->text('equipment_del_block')->nullable();
            $table->text('equipment_del_area')->nullable();
            $table->text('equipment_del_city')->nullable();
            $table->text('equipment_del_photo_building')->nullable();
            $table->text('equipment_del_pin_loc')->nullable();
            $table->text('equipment_installation_req')->nullable();
            $table->boolean('equipment_ins_loc')->default(false);
            $table->text('equipment_ins_office_no')->nullable();
            $table->text('equipment_ins_floor')->nullable();
            $table->text('equipment_ins_building')->nullable();
            $table->text('equipment_ins_block')->nullable();
            $table->text('equipment_ins_area')->nullable();
            $table->text('equipment_ins_city')->nullable();
            $table->text('equipment_ins_photo_building')->nullable();
            $table->text(column: 'equipment_ins_pin_location')->nullable();
            $table->text('equipment_notes')->nullable();
            $table->text('equipment_attachment')->nullable();

            $table->foreign('requirements_id')->references('id')->on('requirements')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirementequipments');
    }
};
