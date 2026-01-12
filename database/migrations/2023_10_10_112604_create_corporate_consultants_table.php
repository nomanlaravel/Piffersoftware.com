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
        Schema::create('corporate_consultants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('corporates_id');
            $table->text('c_name')->nullable();
            $table->text('c_desig')->nullable();
            $table->text('c_org')->nullable();
            $table->text('c_cell')->nullable();
            $table->text('c_email')->nullable();
            $table->text('c_fee')->nullable();
            $table->text('c_bank')->nullable();
            $table->text('c_acc')->nullable();
            $table->text('c_acc_num')->nullable();
            $table->text('c_cheque')->nullable();
            $table->LongText('c_notes')->nullable();
            $table->text('c_attach')->nullable();
            $table->text('c_office')->nullable();
            $table->text('c_building')->nullable();
            $table->text('c_block')->nullable();
            $table->text('c_area')->nullable();
            $table->text('c_city')->nullable();
            $table->text('c_loc')->nullable();
            $table->text('c_a_email')->nullable();
            $table->text('c_website')->nullable();
            $table->text('c_pin')->nullable();
            $table->text('c_map')->nullable();
            $table->LongText('c_ex_notes')->nullable();
            $table->text('c_ex_attach')->nullable();
            $table->timestamps();

            $table->foreign('corporates_id')->references('id')->on('corporates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corporate_consultants');
    }
};
