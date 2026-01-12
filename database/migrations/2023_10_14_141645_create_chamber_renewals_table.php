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
        Schema::create('chamber_renewals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chambers_id');
            $table->text('fee_category')->nullable();
            //Widthdrawal From
            $table->text('wf_bank_name')->nullable();
            $table->text('wf_cheque')->nullable();
            $table->text('wf_cheque_attach')->nullable();
            $table->text('wf_amount')->nullable();
            $table->LongText('wf_notes')->nullable();
            $table->text('wf_attach')->nullable();
            //Widthdrawal By
            $table->text('wb_name')->nullable();
            $table->Longtext('wb_id')->nullable();
            $table->text('wb_desig')->nullable();
            $table->text('wb_cell')->nullable();
            $table->text('wb_email')->nullable();
            $table->LongText('wb_notes')->nullable();
            $table->text('wb_attach')->nullable();
            //Fee
            $table->text('fee')->nullable();
            $table->Longtext('fee_date')->nullable();
            $table->text('fee_bank')->nullable();
            $table->text('fee_ins')->nullable();
            $table->text('fee_slip')->nullable();
            $table->LongText('fee_notes')->nullable();
            $table->text('fee_attach')->nullable();
            //Deposited By :
            $table->text('db_name')->nullable();
            $table->Longtext('db_id')->nullable();
            $table->text('db_desig')->nullable();
            $table->text('db_cell')->nullable();
            $table->text('db_email')->nullable();
            $table->LongText('db_notes')->nullable();
            $table->text('db_attach')->nullable();
            $table->timestamps();

            $table->foreign('chambers_id')->references('id')->on('chambers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chamber_renewals');
    }
};
