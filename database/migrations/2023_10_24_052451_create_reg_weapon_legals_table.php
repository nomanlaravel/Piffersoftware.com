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
        Schema::create('reg_weapon_legals', function (Blueprint $table) {
            $table->unsignedBigInteger('regulators_id');
            $table->text('wep_legal_bank')->nullable();
            $table->text('wep_legal_cheque')->nullable();
            $table->text('wep_legal_copy')->nullable();
            $table->text('wep_legal_amount')->nullable();
            $table->longText('wep_legal_notes')->nullable();
            $table->text('wep_legal_attach')->nullable();
            $table->text('wep_legal_wb_name')->nullable();
            $table->text('wep_legal_wb_id')->nullable();
            $table->text('wep_legal_wb_desig')->nullable();
            $table->text('wep_legal_wb_cell')->nullable();
            $table->text('wep_legal_wb_email')->nullable();
            $table->longText('wep_legal_wb_notes')->nullable();
            $table->text('wep_legal_wb_attach')->nullable();
            $table->text('wep_legal_fee_a')->nullable();
            $table->text('wep_legal_fee_b')->nullable();
            $table->text('wep_legal_fee_t')->nullable();
            $table->text('wep_legal_fee_date')->nullable();
            $table->text('wep_legal_fee_bank')->nullable();
            $table->text('wep_legal_fee_ins')->nullable();
            $table->text('wep_legal_fee_slip')->nullable();
            $table->longText('wep_legal_fee_notes')->nullable();
            $table->text('wep_legal_fee_attach')->nullable();
            $table->text('wep_legal_db_name')->nullable();
            $table->text('wep_legal_db_id')->nullable();
            $table->text('wep_legal_db_desig')->nullable();
            $table->text('wep_legal_db_cell')->nullable();
            $table->text('wep_legal_db_email')->nullable();
            $table->longText('wep_legal_db_notes')->nullable();
            $table->text('wep_legal_db_attach')->nullable();
            $table->timestamps();
            $table->foreign('regulators_id')->references('id')->on('regulators')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reg_weapon_legals');
    }
};
