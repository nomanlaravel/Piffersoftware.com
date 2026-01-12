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
        Schema::create('complaineshiddenwhts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('requirements_id');

            $table->text('wc_hw_category')->nullable();
            $table->text('wc_hw_social')->nullable();
            $table->text('wc_hw_weapon')->nullable();
            $table->text('wc_hw_monthly_rate')->nullable();
            $table->text('wc_hw_total_monthly_rate')->nullable();
            $table->text('wc_hw_wht')->nullable();
            $table->text('wc_hw_salary')->nullable();
            $table->text('wc_hw_group')->nullable();
            $table->text('wc_hw_training_cost')->nullable();
            $table->text('wc_hw_app_gst')->nullable();
            $table->text('wc_hw_gst')->nullable();
            $table->text('wc_hw_admin_cost')->nullable();
            $table->text('wc_hw_rel_allowance')->nullable();
            $table->text('wc_hw_eobi')->nullable();
            $table->text('wc_hw_uni_cost')->nullable();
            $table->text('wc_hw_hidden_admin_cost')->nullable();
            $table->text('wc_hw_app_wht_per')->nullable();
            $table->text('wc_hw_total_admin_cost')->nullable();

            $table->foreign('requirements_id')->references('id')->on('requirements')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaineshiddenwhts');
    }
};
