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
        Schema::create('requirementpassives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requirements_id');

            $table->text('passive_category')->nullable();
            $table->text('passive_dimension')->nullable();
            $table->text('passive_width')->nullable();
            $table->text('passive_height')->nullable();
            $table->text('passive_depth')->nullable();
            $table->text('passive_quantity')->nullable();
            $table->text('passive_material')->nullable();
            $table->text('passive_equipment')->nullable();
            $table->text('passive_article')->nullable();
            $table->text('passive_model')->nullable();
            $table->text('passive_year_of_manufacture')->nullable();
            $table->text('passive_expiry')->nullable();
            $table->text('passive_warranty')->nullable();
            $table->text('passive_color')->nullable();
            $table->text('passive_second_quantity')->nullable();
            $table->text('passive_scope_of_work')->nullable();
            $table->text('passive_instruction')->nullable();
            $table->text('passive_building_picture')->nullable();
            $table->text('passive_complete_cost')->nullable();
            $table->text('passive_delivery_charges')->nullable();
            $table->text('passive_cost')->nullable();
            $table->text('passive_drawings')->nullable();
            $table->text('passive_pictures')->nullable();
            $table->text('passive_complete_equip_charges')->nullable();

            $table->foreign('requirements_id')->references('id')->on('requirements')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirementpassives');
    }
};
