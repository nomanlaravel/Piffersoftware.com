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
        Schema::create('reg_weapon_licenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('regulators_id');
            $table->text('wep_license')->nullable();
            $table->text('wep_lic_no')->nullable();
            $table->text('wep_lic_type')->nullable();
            $table->text('wep_lic_caliber')->nullable();
            $table->text('wep_lic_juris')->nullable();
            $table->text('wep_lic_tenure')->nullable();
            $table->text('wep_lic_cost')->nullable();
            $table->date('wep_lic_expiry')->nullable();
            $table->date('wep_lic_sancdate')->nullable();
            $table->text('wep_lic_attach')->nullable();
            $table->text('wep_lic_dealername')->nullable();
            $table->text('wep_lic_vendorid')->nullable();
            $table->text('wep_lic_scanned')->nullable();
            $table->text('wep_lic_category')->nullable();
            $table->date('wep_lic_endate')->nullable();
            $table->text('wep_lic_encopy')->nullable();
            $table->longText('wep_lic_ex_notes')->nullable();
            $table->text('wep_lic_ex_attach')->nullable();
            $table->timestamps();
            $table->foreign('regulators_id')->references('id')->on('regulators')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reg_weapon_licenses');
    }
};
