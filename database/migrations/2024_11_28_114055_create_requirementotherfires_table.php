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
        Schema::create('requirementotherfires', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requirements_id');

            $table->text('other_fire_category')->nullable();
            $table->text('other_equip_name')->nullable();
            $table->text('other_article_no')->nullable();
            $table->text('other_model')->nullable();
            $table->text('other_year_of_manufacture')->nullable();
            $table->text('other_expiry_date')->nullable();
            $table->text('other_warranty_period')->nullable();
            $table->text('other_color')->nullable();
            $table->text('other_quantity')->nullable();
            $table->text('other_specifications')->nullable();
            $table->text('other_scope_of_work')->nullable();
            $table->text('other_instruction')->nullable();
            $table->text('other_picture_of_building')->nullable();
            $table->text('other_complete_cost')->nullable();
            $table->text('other_delivery_charges')->nullable();
            $table->text('other_installtion_cost')->nullable();
            $table->text('other_fire_notes')->nullable();
            $table->text('other_fire_attachment')->nullable();

            $table->foreign('requirements_id')->references('id')->on('requirements')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirementotherfires');
    }
};
