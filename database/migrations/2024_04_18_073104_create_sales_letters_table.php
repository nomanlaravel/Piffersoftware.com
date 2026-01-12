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
        Schema::create('sales_letters', function (Blueprint $table) {
            $table->id();
            $table->string('letter_leader_name')->nullable();
            $table->string('letter_employee')->nullable();
            $table->string('letter_cell')->nullable();
            $table->string('letter_email')->nullable();
            $table->date('letter_start_date')->nullable();
            $table->date('letter_end_date')->nullable();
            $table->string('letter_rep_name')->nullable();
            $table->string('letter_rep_desig')->nullable();
            $table->string('letter_rep_cell')->nullable();
            $table->string('letter_rep_email')->nullable();
            $table->text('letter_rep_notes')->nullable();
            $table->string('letter_rep_attach')->nullable();
            $table->string('letter_region')->nullable();
            $table->string('letter_quantity')->nullable();
            $table->string('letter_price')->nullable();
            $table->string('letter_total_price')->nullable();
            $table->string('letter_segment')->nullable();
            $table->string('letter_dispatched')->nullable();
            $table->string('letter_signature')->nullable();
            $table->string('letter_address')->nullable();
            $table->text('letter_notes')->nullable();
            $table->string('letter_attach')->nullable();
            $table->string('letter_courier_name')->nullable();
            $table->string('letter_courier_price')->nullable();
            $table->string('letter_courier_quantity')->nullable();
            $table->string('letter_courier_totalcost')->nullable();
            $table->string('letter_compaign_cost')->nullable();
            $table->string('letter_return')->nullable();
            $table->string('letter_return_reason')->nullable();
            $table->string('salesletter_return_attach')->nullable();
            $table->string('letter_return_cost')->nullable();
            $table->string('letter_return_totalcost')->nullable();
            $table->string('letter_dispatch_name')->nullable();
            $table->string('letter_dispatch_employee')->nullable();
            $table->string('letter_dispatch_desig')->nullable();
            $table->string('letter_dispatch_dept')->nullable();
            $table->text('letter_dispatch_notes')->nullable();
            $table->string('letter_dispatch_attach')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_letters');
    }
};
