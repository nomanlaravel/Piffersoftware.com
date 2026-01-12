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
        Schema::create('complainesshownwhts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requirements_id');

            $table->text('wc_sw_category')->nullable();
            $table->text('wc_sw_social_check')->nullable();
            $table->text('wc_sw_weapon')->nullable();
            $table->text('wc_sw_monthly_rate')->nullable();
            $table->text('wc_sw_total_monthly_rate')->nullable();
            $table->text('wc_sw_salary')->nullable();
            $table->text('wc_sw_group')->nullable();
            $table->text('wc_sw_training_cost')->nullable();
            $table->text('wc_sw_app_gst')->nullable();
            $table->text('wc_sw_monthly_gst')->nullable();
            $table->text('wc_sw_rel_allowance')->nullable();
            $table->text('wc_sw_eobi')->nullable();
            $table->text('wc_sw_uni_cost')->nullable();
            $table->text('wc_sw_app_wht')->nullable();
            $table->text('wc_sw_wht')->nullable();
            $table->text('wc_sw_admin_cost')->nullable();

            $table->foreign('requirements_id')->references('id')->on('requirements')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complainesshownwhts');
    }
};
