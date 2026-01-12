<?php

// Migration for vendor_accounts table
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendor_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendors_id');
            $table->text('v_bank_name')->nullable();
            $table->text('v_bank_title')->nullable();
            $table->text('v_bank_number')->nullable();
            $table->text('v_bank_iban')->nullable();
            $table->text('v_bank_terms')->nullable();
            $table->text('v_bank_notes')->nullable();
            $table->text('v_bank_attach')->nullable();
            $table->timestamps();

            $table->foreign('vendors_id')->references('id')->on('vendors')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendor_accounts');
    }
};
