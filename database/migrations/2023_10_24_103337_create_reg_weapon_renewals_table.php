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
        Schema::create('reg_weapon_renewals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('regulators_id');
            $table->text('wep_fee_category')->nullable();
            //Widthdrawal From
            $table->text('wep_finance_bank')->nullable();
            $table->text('wep_finance_cheque')->nullable();
            $table->text('wep_finance_copy')->nullable();
            $table->text('wep_finance_amount')->nullable();
            $table->LongText('wep_finance_notes')->nullable();
            $table->text('wep_finance_attach')->nullable();
            //Widthdrawal By
            $table->text('wep_finance_wb_name')->nullable();
            $table->text('wep_finance_wb_id')->nullable();
            $table->text('wep_finance_wb_desig')->nullable();
            $table->text('wep_finance_wb_cell')->nullable();
            $table->text('wep_finance_wb_email')->nullable();
            $table->LongText('wep_finance_wb_notes')->nullable();
            $table->text('wep_finance_wb_attach')->nullable();
            //Fee
            $table->text('wep_finance_fee')->nullable();
            $table->Longtext('wep_finance_fee_date')->nullable();
            $table->text('wep_finance_fee_bank')->nullable();
            $table->text('wep_finance_fee_ins')->nullable();
            $table->text('wep_finance_slip_attach')->nullable();
            $table->LongText('wep_finance_fee_notes')->nullable();
            $table->text('wep_finance_fee_attach')->nullable();
            //Deposited By :
            $table->text('wep_finance_db_name')->nullable();
            $table->text('wep_finance_db_id')->nullable();
            $table->text('wep_finance_db_desig')->nullable();
            $table->text('wep_finance_db_cell')->nullable();
            $table->text('wep_finance_db_email')->nullable();
            $table->LongText('wep_finance_db_notes')->nullable();
            $table->text('wep_finance_db_attach')->nullable();

            $table->timestamps();
            $table->foreign('regulators_id')->references('id')->on('regulators')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reg_weapon_renewals');
    }
};




