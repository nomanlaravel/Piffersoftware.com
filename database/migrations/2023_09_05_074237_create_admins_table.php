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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->text('branch_office_name')->nullable();
            $table->text('branch_type')->nullable(); 
            $table->text('branch_id')->nullable();
            $table->text('branch_category')->nullable();
            $table->text('branch_ptcl')->nullable();
            $table->text('gm_name')->nullable(); 
            $table->text('gm_cell')->nullable();
            $table->text('gm_email')->nullable();
            $table->text('dgm_name')->nullable();
            $table->text('dgm_cell')->nullable(); 
            $table->text('cro_name')->nullable();
            $table->text('cro_cell')->nullable();
            $table->text('cro_ptcl')->nullable();
            $table->text('branch_office_no')->nullable(); 
            $table->text('branch_building')->nullable();
            $table->text('branch_block')->nullable();
            $table->text('branch_area')->nullable();
            $table->text('branch_city')->nullable(); 
            $table->text('branch_photo')->nullable();
            $table->text('branch_pin')->nullable();
            $table->text('branch_gps')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
