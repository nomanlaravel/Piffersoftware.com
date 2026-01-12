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
        Schema::create('customer_bussinesses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customers_id');
            $table->text('bussiness_name')->nullable();
            $table->text('bussiness_nature')->nullable();
            $table->text('bussiness_office_no')->nullable();
            $table->text('bussiness_building')->nullable();
            $table->text('bussiness_block')->nullable();
            $table->text('bussiness_area')->nullable();
            $table->text('bussiness_city')->nullable();
            $table->text('bussiness_photo')->nullable();
            $table->text('bussiness_email')->nullable();
            $table->text('bussiness_web')->nullable();
            $table->text('bussiness_gps')->nullable();
            $table->longText('bussiness_notes')->nullable();
            $table->text('bussiness_attach')->nullable();
            $table->timestamps();

            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_bussinesses');
    }
};
