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
        Schema::create('requirementevents', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('requirements_id');

            $table->text('ownership_status')->nullable();
            $table->text('event_req_for')->nullable();
            $table->text('event_no_of_staff')->nullable();
            $table->date('event_duty_start_date')->nullable();
            $table->date('event_duty_end_date')->nullable();
            $table->time('event_duty_start_time')->nullable();
            $table->time('event_duty_end_time')->nullable();
            $table->text('event_shift_duration')->nullable();
            $table->text('event_shift_type')->nullable();
            $table->text('event_no_of_shifts')->nullable();
            $table->boolean('event_reporting_location')->default(false);
            $table->text('event_office_no')->nullable();
            $table->text('event_floor')->nullable();
            $table->text('event_building')->nullable();
            $table->text('event_block')->nullable();
            $table->text('event_area')->nullable();
            $table->text('event_city')->nullable();
            $table->text('event_photo')->nullable();
            $table->text('event_loc')->nullable();
            $table->date('event_date')->nullable();
            $table->text('event_venue')->nullable();
            $table->text('event_deployment_plan')->nullable();
            $table->text('event_security_notes')->nullable();
            $table->text('event_security_attach')->nullable();
            $table->foreign('requirements_id')->references('id')->on('requirements')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirementevents');
    }
};
