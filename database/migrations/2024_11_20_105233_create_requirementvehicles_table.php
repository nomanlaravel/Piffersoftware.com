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
        Schema::create('requirementvehicles', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('requirements_id');
            $table->text('vehicle_ownership')->nullable();
            $table->text('vehicle_type')->nullable();
            $table->text('vehicle_category')->nullable();
            $table->text('vehicle_required')->nullable();
            $table->text('vehicle_mantenance')->nullable();
            $table->text('vehicle_fuel')->nullable();
            $table->text('vehicle_rate_per_km')->nullable();
            $table->text('vehicle_km_required')->nullable();
            $table->text('vehicle_toll')->nullable();
            $table->text('vehicle_tol')->nullable();
            $table->text('vehicle_meter_reading')->nullable();
            $table->text('vehicle_meter_picture')->nullable();
            $table->time('vehicle_reporting_time')->nullable();
            $table->boolean('vehicle_reporting_address')->default(false);
            $table->text('vehicle_rep_office_no')->nullable();
            $table->text('vehicle_rep_floor')->nullable();
            $table->text('vehicle_rep_building')->nullable();
            $table->text('vehicle_rep_block')->nullable();
            $table->text('vehicle_rep_area')->nullable();
            $table->text('vehicle_rep_city')->nullable();
            $table->text('vehicle_rep_picture')->nullable();
            $table->text('vehicle_rep_location')->nullable();
            $table->date('vehicle_duty_start_date')->nullable();
            $table->date('vehicle_duty_end_date')->nullable();
            $table->time('vehicle_duty_start_time')->nullable();
            $table->time('vehicle_duty_end_time')->nullable();
            $table->text('vehicle_shift_duration')->nullable();
            $table->text('vehicle_no_of_shifts')->nullable();
            $table->boolean('vehicle_req_with_driver')->default(false);
            $table->text('vehicle_food_by_client')->nullable();
            $table->boolean('vehicle_req_with_security')->default(false);
            $table->text('vehicle_guard_category')->nullable();
            $table->text('vehicle_guard_quantity')->nullable();
            $table->text('vehicle_guard_shift_timing')->nullable();
            $table->text('vehicle_guard_food_by_client')->nullable();
            $table->text('vehicle_guard_accomodation')->nullable();
            $table->text('vehicle_guard_transportation')->nullable();
            $table->text('vehicle_guard_req_monthly')->nullable();
            $table->text('vehicle_guard_req_dialy')->nullable();
            $table->text('vehicle_guard_no')->nullable();
            $table->text('vehicle_guard_notes')->nullable();
            $table->text('vehicle_guard_attach')->nullable();


            $table->foreign('requirements_id')->references('id')->on('requirements')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirementvehicles');
    }
};
