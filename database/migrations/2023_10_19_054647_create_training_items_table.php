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
        Schema::create('training_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trainings_id');
            $table->text('list_items_category')->nullable();
            $table->text('item_category')->nullable();
            $table->text('item_type')->nullable();
            $table->text('item_supplier')->nullable();
            $table->text('item_quantity')->nullable();
            $table->text('item_price')->nullable();
            $table->text('item_total_price')->nullable();
            $table->longText('item_notes')->nullable();
            $table->text('item_attach')->nullable();
            $table->text('item_vendor')->nullable();
            $table->text('vendor_cell')->nullable();
            $table->text('vendor_building')->nullable();
            $table->text('vendor_block')->nullable();
            $table->text('vendor_area')->nullable();
            $table->text('vendor_city')->nullable();
            $table->text('vendor_email')->nullable();
            $table->text('vendor_website')->nullable();
            $table->text('vendor_gps')->nullable();
            $table->text('vendor_notes')->nullable();
            $table->text('vendor_attach')->nullable();
            $table->timestamps();
            $table->foreign('trainings_id')->references('id')->on('trainings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_items');
    }
};
