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
        Schema::create('customer_complaints', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customers_id');
            $table->text('complaint_no')->nullable();
            $table->text('complaint_guards_duty')->nullable();
            $table->longText('complaint_gaurd_note')->nullable();
            $table->text('complaint_guard_attach')->nullable();
            $table->text('wea_uni_equip')->nullable();
            $table->longText('wue_note')->nullable();
            $table->text('finance_dept')->nullable();
            $table->longText('fd_note')->nullable();
            $table->text('fd_attach')->nullable();
            $table->text('src_complaint')->nullable();
            $table->longText('src_note')->nullable();
            $table->text('src_attach')->nullable();
            $table->text('mng_feed')->nullable();
            $table->text('mng_attach')->nullable();
            $table->longText('mng_note')->nullable();
            $table->text('complaint_poc_name')->nullable();
            $table->text('complaint_poc_desig')->nullable();
            $table->text('complaint_poc_dept')->nullable();
            $table->text('complaint_poc_email')->nullable();
            $table->text('complaint_poc_contact')->nullable();
            $table->text('complaint_picture')->nullable();
            $table->text('details_complaint')->nullable();
            $table->text('details_attach')->nullable();
            $table->text('complaint_tagged')->nullable();
            $table->text('complaint_arressed')->nullable();
            $table->text('complaint_addressed_attach')->nullable();
            $table->longText('complaint_addressed_note')->nullable();
            $table->timestamps();

            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_complaints');
    }
};
