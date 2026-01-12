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
        Schema::create('moveables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admins_id');
            $table->text('type_of_vehicle')->nullable();
            $table->text('vehicle_no')->nullable(); 
            $table->text('vehicle_model')->nullable();
            $table->text('vehicle_pic')->nullable(); 
            $table->text('vehicle_book_pic')->nullable();
            $table->text('payment_type')->nullable(); 
            $table->text('vehicle_name')->nullable();
            $table->text('engine_no')->nullable();  
            $table->text('chasis_no')->nullable();
            $table->text('vehicle_color')->nullable(); 
            $table->timestamps();

            $table->foreign('admins_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moveables');
    }
};
