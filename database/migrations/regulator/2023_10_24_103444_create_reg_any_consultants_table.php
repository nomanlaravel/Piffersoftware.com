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
        Schema::create('reg_any_consultants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('regulators_id');
            $table->text('other_name')->nullable();
            $table->text('other_desig')->nullable();
            $table->text('other_org')->nullable();
            $table->text('other_cell')->nullable();
            $table->text('other_email')->nullable();
            $table->text('other_fee')->nullable();
            $table->text('other_front')->nullable();
            $table->text('other_back')->nullable();
            $table->text('other_bank')->nullable();
            $table->text('other_account')->nullable();
            $table->text('other_acc_no')->nullable();
            $table->text('other_fin')->nullable();
            $table->LongText('other_notes')->nullable();
            $table->text('other_attachments')->nullable();
            $table->text('other_office')->nullable();
            $table->text('other_build')->nullable();
            $table->text('other_block')->nullable();
            $table->text('other_area')->nullable();
            $table->text('other_city')->nullable();
            $table->text('other_photo')->nullable();
            $table->text('other_a_email')->nullable();
            $table->text('other_web')->nullable();
            $table->text('other_pin')->nullable();
            $table->text('other_gps')->nullable();
            $table->LongText('other_ex_notes')->nullable();
            $table->text('other_ex_attach')->nullable();
            $table->timestamps();

            $table->foreign('regulators_id')->references('id')->on('regulators')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reg_any_consultants');
    }
};



