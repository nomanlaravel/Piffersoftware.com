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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->string('office_name')->nullable();
            $table->string('rp_no')->nullable();
            $table->string('type')->nullable();
            $table->string('desc')->nullable();
            $table->string('pic')->nullable();
            $table->string('branch')->nullable();
            $table->string('report_to')->nullable();
            //Care Taker Details
            $table->string('care_name')->nullable();
            $table->string('care_cell')->nullable();
            $table->string('care_cnic')->nullable();
            $table->string('care_attach')->nullable();
            //Plaza Management Details
            $table->string('plaza_name')->nullable();
            $table->string('plaza_cell')->nullable();
            $table->string('plaza_bank')->nullable();
            $table->string('plaza_account')->nullable();
            $table->string('plaza_cnic')->nullable();
            $table->string('plaza_attach')->nullable();
            //Incharge
            $table->string('inc_name')->nullable();
            $table->string('inc_id')->nullable();
            $table->string('inc_desig')->nullable();
            $table->string('inc_cell')->nullable();
            $table->string('inc_email')->nullable();
            $table->string('inc_atatch')->nullable();
            //Address
            $table->string('office_no')->nullable();
            $table->string('building')->nullable();
            $table->string('block')->nullable();
            $table->string('area')->nullable();
            $table->string('city')->nullable();
            $table->string('location')->nullable();
            $table->string('photo_b')->nullable();
            $table->string('gps')->nullable();
            //Property Owner
            $table->string('owner_name')->nullable();
            $table->string('owner_cnic')->nullable();
            $table->string('owner_cell')->nullable();
            $table->string('owner_front')->nullable();
            $table->string('owner_back')->nullable();
            $table->string('owner_bank')->nullable();
            $table->string('owner_acc')->nullable();
            $table->string('owner_acc_no')->nullable();
            //Utility Bills
            $table->string('electric')->nullable();
            $table->string('elec_attach')->nullable();
            $table->string('gas')->nullable();
            $table->string('gas_attach')->nullable();
            $table->date('mov_in')->nullable();
            $table->date('mov_out')->nullable();
            //ast Copy of Paid Bill
            $table->string('last_bill')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
