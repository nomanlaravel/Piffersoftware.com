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
        Schema::create('reg_weapon_consultants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('regulators_id');
            $table->text('wep_name')->nullable();
            $table->text('wep_desig')->nullable();
            $table->text('wep_org')->nullable();
            $table->text('wep_cell')->nullable();
            $table->text('wep_email')->nullable();
            $table->text('wep_fee')->nullable();
            $table->text('wep_front')->nullable();
            $table->text('wep_back')->nullable();
            $table->text('wep_bank')->nullable();
            $table->text('wep_acc')->nullable();
            $table->text('wep_acc_no')->nullable();
            $table->text('wep_fin')->nullable();
            $table->LongText('wep_notes')->nullable();
            $table->text('wep_attach')->nullable();
            $table->text('wep_office')->nullable();
            $table->text('wep_build')->nullable();
            $table->text('wep_block')->nullable();
            $table->text('wep_area')->nullable();
            $table->text('wep_city')->nullable();
            $table->text('wep_photo')->nullable();
            $table->text('wep_a_email')->nullable();
            $table->text('wep_web')->nullable();
            $table->text('wep_pin')->nullable();
            $table->text('wep_gps')->nullable();
            $table->LongText('wep_ex_notes')->nullable();
            $table->text('wep_ex_attach')->nullable();
            $table->timestamps();
            $table->foreign('regulators_id')->references('id')->on('regulators')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reg_weapon_consultants');
    }
};
