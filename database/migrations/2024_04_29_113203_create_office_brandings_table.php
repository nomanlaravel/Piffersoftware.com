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
        Schema::create('office_brandings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admins_id');
            $table->text('b_type')->nullable();
            $table->text('picture_of_b')->nullable(); 
            $table->text('site_of_b')->nullable();
            $table->text('cost_of_b')->nullable();
            $table->text('periodical_m')->nullable();
            $table->text('vendor_id')->nullable(); 
            $table->text('v_name')->nullable();
            $table->text('v_cell')->nullable();
            $table->text('v_office')->nullable();
            $table->text('v_floor')->nullable(); 
            $table->text('v_building')->nullable();
            $table->text('v_block')->nullable();
            $table->text('v_area')->nullable();
            $table->text('v_city')->nullable(); 
            $table->text('v_photo_b')->nullable();
            $table->text('v_pin')->nullable();
            $table->text('v_notes')->nullable();
            $table->text('v_attach')->nullable();
            $table->timestamps();

            $table->foreign('admins_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('office_brandings');
    }
};
