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
        Schema::create('tokens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admins_id');
            $table->text('amount_paid')->nullable();
            $table->text('type_of_payment')->nullable(); 
            $table->text('ins_no')->nullable();
            $table->text('voucher_no')->nullable();
            $table->date('payment_date')->nullable();
            $table->text('token_note')->nullable();
            $table->text('token_attach')->nullable();
            $table->timestamps();

            $table->foreign('admins_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tokens');
    }
};
