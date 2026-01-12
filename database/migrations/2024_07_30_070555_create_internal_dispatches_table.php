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
        Schema::create('internal_dispatches', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->string('sub_category')->nullable();
            $table->string('article_name')->nullable();
            $table->string('condition')->nullable();
            $table->date('date')->nullable();
            $table->string('issued_to')->nullable();
            $table->string('item_name')->nullable();
            $table->string('item_code')->nullable();
            $table->text('description')->nullable();
            $table->string('size')->nullable();
            $table->string('article_number')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('price_per_unit', 10, 2)->nullable();
            $table->decimal('total_price', 10, 2)->nullable();
            $table->string('dispatch_through')->nullable();
            $table->string('tracking_id')->nullable();
            $table->string('tracking_slip_attach')->nullable();
            $table->string('dispatcher_name')->nullable();
            $table->string('dispatcher_employee_id')->nullable();
            $table->string('dispatcher_cell_no')->nullable();
            $table->string('receiver_name')->nullable();
            $table->string('receiver_employee_id')->nullable();
            $table->string('receiver_cell_no')->nullable();
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
        Schema::dropIfExists('internal_dispatches');
    }
};
