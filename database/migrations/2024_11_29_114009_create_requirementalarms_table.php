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
        Schema::create('requirementalarms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requirements_id');

            $table->text('alarm_category')->nullable();
            $table->text('alarm_equipment')->nullable();
            $table->text('alarm_voltage')->nullable();
            $table->text('alarm_ampere')->nullable();
            $table->text('alarm_article_no')->nullable();
            $table->text('alarm_model')->nullable();
            $table->text('alarm_year')->nullable();
            $table->text('alarm_expiry')->nullable();
            $table->text('alarm_warranty')->nullable();
            $table->text('alarm_color')->nullable();
            $table->text('alarm_quantity')->nullable();
            $table->text('alarm_scope')->nullable();
            $table->text('alarm_ins')->nullable();
            $table->text('alarm_drawings')->nullable();
            $table->text('alarm_pictures')->nullable();
            $table->text('alarm_cost')->nullable();
            $table->text('alarm_charges')->nullable();
            $table->text('alarm_ins_cost')->nullable();
            $table->text('alarm_length')->nullable();
            $table->text('alarm_width')->nullable();
            $table->text('alarm_height')->nullable();
            $table->text('alarm_thickness')->nullable();
            $table->text('alarm_diameter')->nullable();
            $table->text(column: 'alarm_ins_smoke')->nullable();
            $table->text('alarm_ins_cost_smoke')->nullable();
            $table->text('alarm_internal_shifting')->nullable();
            $table->text('alarm_internal_shifting_charges')->nullable();
            $table->text('alarm_reinstall')->nullable();
            $table->text('alarm_reinstall_charges')->nullable();
            $table->text('alarm_qrf')->nullable();
            $table->text('alarm_qrf_monthly_charges')->nullable();
            $table->text('alarm_qrf_yearly_charges')->nullable();
            $table->text('alarm_police_req')->nullable();
            $table->text('alarm_police_monthly_charges')->nullable();
            $table->text('alarm_police_yearly_charges')->nullable();
            $table->text('alarm_visit_charges')->nullable();
            $table->text('alarm_visit_city')->nullable();
            $table->text('alarm_notes')->nullable();
            $table->date('alarm_attachments')->nullable();

            $table->foreign('requirements_id')->references('id')->on('requirements')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirementalarms');
    }
};
