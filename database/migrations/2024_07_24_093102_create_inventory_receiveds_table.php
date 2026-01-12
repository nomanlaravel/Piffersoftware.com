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
        Schema::create('inventory_receiveds', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->string('sub_category')->nullable();
            $table->string('article_name')->nullable();
            $table->string('condition')->nullable();
            $table->date('date')->nullable();
            $table->string('item_name')->nullable();
            $table->string('item_code')->nullable();
            $table->text('description')->nullable();
            $table->string('manufacturing')->nullable();
            $table->string('size')->nullable();
            $table->string('article_number')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('price_per_unit', 10, 2)->nullable();
            $table->decimal('total_price', 10, 2)->nullable();
            $table->string('purchase_order_number')->nullable();
            $table->string('po_attachment')->nullable();
            $table->string('vendor_lot_number')->nullable();
            $table->string('vendor_name')->nullable();
            $table->string('vendor_id')->nullable();
            $table->string('invoice_number')->nullable();
            $table->string('invoice_attachment')->nullable();
            $table->text('any_spec_ins')->nullable();
            $table->string('ins_attachment')->nullable();
            $table->text('notes')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_receiveds');
    }
};
