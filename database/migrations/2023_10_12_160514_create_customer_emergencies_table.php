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
        Schema::create('customer_emergencies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customers_id');
            $table->text('emer_ser')->nullable();
            $table->text('emer_pic')->nullable();
            $table->text('emer_poc_name')->nullable();
            $table->text('emer_poc_desig')->nullable();
            $table->text('emer_poc_cell')->nullable();
            $table->text('emer_poc_email')->nullable();
            $table->longText('emer_poc_notes')->nullable();
            $table->text('emer_poc_attach')->nullable();
            $table->text('emer_office')->nullable();
            $table->text('emer_building')->nullable();
            $table->text('emer_block')->nullable();
            $table->text('emer_area')->nullable();
            $table->text('emer_city')->nullable();
            $table->text('emer_loc')->nullable();
            $table->text('emer_email')->nullable();
            $table->text('emer_web')->nullable();
            $table->text('emer_pin')->nullable();
            $table->text('emer_gps')->nullable();
            $table->text('emer_app_rental')->nullable();
            $table->text('emer_attach')->nullable();
            $table->longText('emer_note')->nullable();
            $table->timestamps();

            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_emergencies');
    }
};
