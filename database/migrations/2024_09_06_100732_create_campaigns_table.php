<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->string('leader_name')->nullable();
            $table->string('leader_employee_no')->nullable();
            $table->string('leader_cell_no')->nullable();
            $table->string('leader_email_id')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('reporting_to_name')->nullable();
            $table->string('reporting_to_desig')->nullable();
            $table->string('reporting_to_cell')->nullable();
            $table->string('reporting_to_email')->nullable();
            $table->longText('reporting_to_notes')->nullable();
            $table->text('reporting_to_attach')->nullable();
            $table->string('region')->nullable();
            $table->string('item_quantity')->nullable();
            $table->string('item_price')->nullable();
            $table->string('item_total_price')->nullable();
            $table->string('segment')->nullable();
            $table->string('dispatched_to')->nullable();
            $table->string('dispatched_signature')->nullable();
            $table->text('list_of_address_attach')->nullable();
            $table->longText('dispatched_to_notes')->nullable();
            $table->text('dispatched_to_attach')->nullable();
            $table->string('courier_name')->nullable();
            $table->string('courier_price')->nullable();
            $table->string('courier_quantity')->nullable();
            $table->string('courier_total_cost')->nullable();
            $table->string('compaign_cost')->nullable();
            $table->string('no_of_items_return')->nullable();
            $table->string('reason_of_items_return')->nullable();
            $table->text('items_return_attach')->nullable();
            $table->string('items_return_cost')->nullable();
            $table->string('items_return_total_cost')->nullable();
            $table->string('dispatch_by_name')->nullable();
            $table->string('dispatch_by_employee')->nullable();
            $table->string('dispatch_by_desig')->nullable();
            $table->string('dispatch_by_dept')->nullable();
            $table->string('dispatch_by_notes')->nullable();
            $table->text('dispatch_by_attach')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
