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
        Schema::create('requirementfires', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('requirements_id');

            $table->text('fireClass')->nullable();
            $table->boolean('waterCylinder')->default(false);
            $table->boolean('dryChemical')->default(false);
            $table->boolean('CoTwo')->default(false);
            $table->boolean('foam')->default(false);
            $table->boolean('wetChemical')->default(false);
            $table->boolean('dryChemicalAbe')->default(false);
            $table->boolean('dryChemicalBe')->default(false);
            $table->boolean('Co2')->default(false);
            $table->boolean('foam2')->default(false);
            $table->boolean('dryChemicalPowderABE')->default(false);
            $table->boolean('dryChemicalPowderBE')->default(false);
            $table->boolean('dryChemicalPowderABE1')->default(false);
            $table->boolean('dryChemicalPowderBE1')->default(false);
            $table->boolean('dryChemicalPowderABE2')->default(false);
            $table->boolean('dryChemicalPowderBE2')->default(false);
            $table->boolean('cd2')->default(false);
            $table->boolean('dryChemicalPowderBE3')->default(false);
            $table->boolean('foam3')->default(false);
            $table->boolean('wetChemical2')->default(false);
            $table->text('fire_equipment_name')->nullable();
            $table->date('fire_cylinder_type')->nullable();
            $table->date('fire_article_no')->nullable();
            $table->text('fire_model')->nullable();
            $table->text('fire_year_of_manufacturing')->nullable();
            $table->text('fire_expiry_date')->nullable();
            $table->date('fire_warranty_period')->nullable();
            $table->date('fire_color')->nullable();
            $table->text('fire_quantity')->nullable();
            $table->text('fire_specifications')->nullable();
            $table->text('fire_notes')->nullable();
            $table->date('fire_attach')->nullable();

            $table->foreign('requirements_id')->references('id')->on('requirements')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirementfires');
    }
};
