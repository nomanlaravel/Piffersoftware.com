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
         Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->date('do_date')->nullable();
            $table->string('do_number')->nullable();
            $table->date('po_date')->nullable();
            $table->string('po_number')->nullable();
            $table->string('vendor_id')->nullable();
            $table->string('name_of_bank')->nullable();
            $table->string('poc_name')->nullable();
            $table->string('address_of_bank')->nullable();
            $table->string('cell_number')->nullable();
            $table->string('title_of_account')->nullable();
            $table->string('office_number')->nullable();
            $table->string('account_number')->nullable();
            $table->string('rec_staff')->nullable();
            $table->string('location')->nullable();
            $table->string('rec_cell_number')->nullable();
            $table->string('rec_city')->nullable();
            $table->string('rec_fax')->nullable();
            $table->string('rec_office_number')->nullable();
            $table->string('instructions')->nullable();
            $table->string('taxable')->nullable();
            $table->string('tax_rate')->nullable();
            $table->string('total_tax')->nullable();
            $table->string('shipping_cost')->nullable();
            $table->string('others')->nullable();
            $table->string('total')->nullable();
            $table->string('raised_by_name')->nullable();
            $table->string('raised_by_cell')->nullable();
            $table->string('raised_by_signature')->nullable();
            $table->string('vetted_by_name')->nullable();
            $table->string('vetted_by_cell')->nullable();
            $table->string('vetted_by_signature')->nullable();
            $table->string('approved_by_name')->nullable();
            $table->string('approved_by_cell')->nullable();
            $table->string('approved_by_signature')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
