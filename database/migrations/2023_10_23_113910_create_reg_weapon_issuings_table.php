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
        Schema::create('reg_weapon_issuings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('regulators_id');
            $table->text('wep_iss_co_name')->nullable();
            $table->text('wep_iss_co_desig')->nullable();
            $table->text('wep_iss_co_dept')->nullable();
            $table->text('wep_iss_co_sec')->nullable();
            $table->text('wep_iss_co_ptcl')->nullable();
            $table->text('wep_iss_co_cell')->nullable();
            $table->text('wep_iss_co_email')->nullable();
            $table->text('wep_iss_co_web')->nullable();
            $table->text('wep_iss_co_front')->nullable();
            $table->text('wep_iss_co_back')->nullable();
            $table->Longtext('wep_iss_co_notes')->nullable();
            $table->text('wep_iss_co_attach')->nullable();
            $table->text('wep_p_co_name')->nullable();
            $table->text('wep_co_p_desig')->nullable();
            $table->text('wep_co_p_dept')->nullable();
            $table->text('wep_co_p_sec')->nullable();
            $table->text('wep_co_p_ptcl')->nullable();
            $table->text('wep_co_p_cell')->nullable();
            $table->text('wep_co_p_email')->nullable();
            $table->text('wep_co_p_web')->nullable();
            $table->text('wep_co_p_front')->nullable();
            $table->text('wep_co_p_back')->nullable();
            $table->Longtext('wep_co_p_notes')->nullable();
            $table->text('wep_co_p_attach')->nullable();
            $table->timestamps();
            $table->foreign('regulators_id')->references('id')->on('regulators')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reg_weapon_issuings');
    }
};
