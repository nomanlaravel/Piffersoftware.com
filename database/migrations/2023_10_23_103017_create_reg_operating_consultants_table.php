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
        Schema::create('reg_operating_consultants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('regulators_id');
            $table->text('oper_name')->nullable();
            $table->text('oper_desig')->nullable();
            $table->text('oper_org')->nullable();
            $table->text('oper_cell')->nullable();
            $table->text('oper_email')->nullable();
            $table->text('oper_fee')->nullable();
            $table->text('oper_front')->nullable();
            $table->text('oper_back')->nullable();
            $table->text('oper_bank')->nullable();
            $table->text('oper_account')->nullable();
            $table->text('oper_acc_no')->nullable();
            $table->text('oper_fin')->nullable();
            $table->LongText('oper_notes')->nullable();
            $table->text('oper_attachments')->nullable();
            $table->text('oper_office')->nullable();
            $table->text('oper_build')->nullable();
            $table->text('oper_block')->nullable();
            $table->text('oper_area')->nullable();
            $table->text('oper_city')->nullable();
            $table->text('oper_photo')->nullable();
            $table->text('oper_a_email')->nullable();
            $table->text('oper_web')->nullable();
            $table->text('oper_pin')->nullable();
            $table->text('oper_gps')->nullable();
            $table->LongText('oper_ex_notes')->nullable();
            $table->text('oper_ex_attach')->nullable();
            $table->timestamps();

            $table->foreign('regulators_id')->references('id')->on('regulators')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reg_operating_consultants');
    }
};
