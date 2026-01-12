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
        Schema::create('lumpsumshownwhts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('requirements_id');

            $table->text('ls_sw_category')->nullable();
            $table->text('ls_sw_social')->nullable();
            $table->text('ls_sw_weapon_cost')->nullable();
            $table->text('ls_sw_monthly_rate')->nullable();
            $table->text('ls_sw_total_monthly_rate')->nullable();
            $table->text('ls_sw_salary')->nullable();
            $table->text('ls_sw_group_life')->nullable();
            $table->text('ls_sw_training_cost')->nullable();
            $table->text('ls_sw_app_gst')->nullable();
            $table->text('ls_sw_gst')->nullable();
            $table->text('ls_sw_eobi')->nullable();
            $table->text('ls_sw_uni_cost')->nullable();
            $table->text('ls_sw_admin_cost')->nullable();
            $table->text('ls_sw_app_wht')->nullable();
            $table->text('ls_sw_wht')->nullable();

            $table->foreign('requirements_id')->references('id')->on('requirements')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lumpsumshownwhts');
    }
};
