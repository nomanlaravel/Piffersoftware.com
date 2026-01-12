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
        Schema::create('requirementcctvs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('requirements_id');

            $table->text('cctv_category')->nullable();
            $table->text('cctv_brand')->nullable();
            $table->text('cctv_model')->nullable();
            $table->text('cctv_year_of_manu')->nullable();
            $table->text('cctv_pixels')->nullable();
            $table->text('cctv_night_vision')->nullable();
            $table->text('cctv_type')->nullable();
            $table->text('cctv_backup')->nullable();
            $table->text('cctv_nvr')->nullable();
            $table->text('cctv_powercable')->nullable();
            $table->text('cctv_poe')->nullable();
            $table->text('cctv_quantity')->nullable();
            $table->text('cctv_monthly_cost')->nullable();
            $table->text('cctv_req_on')->nullable();
            $table->text('cctv_no_of_days')->nullable();
            $table->boolean('cctv_del_loc')->default(false);
            $table->text('cctv_del_office')->nullable();
            $table->text('cctv_del_floor')->nullable();
            $table->text('cctv_del_building')->nullable();
            $table->text('cctv_del_block')->nullable();
            $table->text('cctv_del_area')->nullable();
            $table->text('cctv_del_city')->nullable();
            $table->text('cctv_del_photo_building')->nullable();
            $table->boolean('cctv_ins_loc')->default(false);
            $table->text('cctv_ins_office')->nullable();
            $table->text('cctv_ins_floor')->nullable();
            $table->text('cctv_ins_building')->nullable();
            $table->text('cctv_ins_block')->nullable();
            $table->text('cctv_ins_area')->nullable();
            $table->text('cctv_ins_city')->nullable();
            $table->text('cctv_ins_photo_building')->nullable();
            $table->text(column: 'cctv_ins_pin_location')->nullable();
            $table->text('cctv_maintenance_req')->nullable();
            $table->text('cctv_maintenance_req_basis')->nullable();
            $table->text('cctv_notes')->nullable();
            $table->text('cctv_attachments')->nullable();


            $table->foreign('requirements_id')->references('id')->on('requirements')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirementcctvs');
    }
};
