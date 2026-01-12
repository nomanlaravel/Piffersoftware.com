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
        Schema::create('usage_movements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admins_id');
            $table->text('usage_vehicle_no')->nullable();
            $table->text('avg_per_liter')->nullable(); 
            $table->date('date_of_m')->nullable();
            $table->time('time_from')->nullable();
            $table->time('time_to')->nullable();
            $table->text('details_of_j')->nullable(); 
            $table->text('purpose_of_j')->nullable();
            $table->text('name_of_officer')->nullable();
            $table->text('meter_reading_to')->nullable();
            $table->text('meter_reading_from')->nullable(); 
            $table->text('distance_covered')->nullable();
            $table->text('signature')->nullable();
            $table->text('p_o_l')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();

            $table->foreign('admins_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usage_movements');
    }
};
