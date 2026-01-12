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
        Schema::create('requirementfacilitations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('requirements_id');

            $table->time('guest_arrival_time')->nullable();
            $table->time('security_reporting_time')->nullable();
            $table->text('photograph_of_guest')->nullable();
            $table->text('photograph_of_passport')->nullable();
            $table->text('nationality_of_guest')->nullable();
            $table->boolean('security_staff_rep_loc')->default(false);
            $table->boolean('airline_details')->default(false);
            $table->text('name_of_airline')->nullable();
            $table->text('contact_of_airline')->nullable();
            $table->text('email_of_airline')->nullable();
            $table->text('web_of_airline')->nullable();
            $table->boolean('poc_of_airline')->default(false);
            $table->text('facility_poc_name')->nullable();
            $table->text('facility_poc_desig')->nullable();
            $table->text('facility_poc_contact')->nullable();
            $table->text('facility_poc_email')->nullable();
            $table->text('facility_poc_office')->nullable();
            $table->text('facility_poc_floor')->nullable();
            $table->text('facility_poc_building')->nullable();
            $table->text('facility_poc_block')->nullable();
            $table->text('facility_poc_area')->nullable();
            $table->text('facility_poc_city')->nullable();
            $table->text('facility_poc_building_photo')->nullable();
            $table->text('facility_poc_loc')->nullable();
            $table->text('flight_number')->nullable();
            $table->text('flying_from')->nullable();
            $table->text('guest_number')->nullable();
            $table->date('copy_of_guest_ticket')->nullable();
            $table->date('copy_of_guest_visa')->nullable();
            $table->time('guest_schedule')->nullable();
            $table->time('hand_carry')->nullable();
            $table->text('luggage_weight')->nullable();
            $table->text('tag_number')->nullable();
            $table->text('color_of_bags')->nullable();
            $table->text('weight_of_bags')->nullable();
            $table->text('picture_of_bags')->nullable();
            $table->text('facilitation_notes')->nullable();
            $table->text('facilitation_attach')->nullable();

            $table->foreign('requirements_id')->references('id')->on('requirements')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirementfacilitations');
    }
};
