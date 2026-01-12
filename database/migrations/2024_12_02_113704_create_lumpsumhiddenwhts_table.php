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
        Schema::create('lumpsumhiddenwhts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('requirements_id');

            $table->text('ls_hw_category')->nullable();
            $table->text('ls_hw_uni_cost')->nullable();
            $table->text('ls_hw_weapon_cost')->nullable();
            $table->text('ls_hw_monthly_rate')->nullable();
            $table->text('ls_hw_total_monthly_rate')->nullable();
            $table->text('ls_hw_salary')->nullable();
            $table->text('ls_hw_social')->nullable();
            $table->text('ls_hw_training_cost')->nullable();
            $table->text('ls_hw_app_gst')->nullable();
            $table->text('ls_hw_gst')->nullable();
            $table->text('ls_hw_admin_cost')->nullable();
            $table->text('ls_hw_eobi')->nullable();
            $table->text('ls_hw_group_life')->nullable();
            $table->text('ls_hw_hidden_admin_cost')->nullable();
            $table->text('ls_hw_app_wht_per')->nullable();
            $table->text('ls_hw_wht')->nullable();
            $table->text('ls_hw_total_admin_cost')->nullable();

            $table->foreign('requirements_id')->references('id')->on('requirements')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lumpsumhiddenwhts');
    }
};
