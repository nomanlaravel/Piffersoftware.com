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
        Schema::create('regulators', function (Blueprint $table) {
            $table->id();
            $table->text('reg_id')->nullable();
            $table->text('reg_type')->nullable();
            $table->text('jurisdiction')->nullable();
            $table->text('deptartment')->nullable();
            $table->text('section')->nullable();
            $table->text('license_no')->nullable();
            $table->text('document_no')->nullable();
            $table->text('license_attach')->nullable();
            $table->text('validity_from')->nullable();
            $table->text('expiry_date')->nullable();
            $table->longText('notes')->nullable();
            $table->text('attachments')->nullable();
            //Operating Address :
            $table->text('oper_home_office')->nullable();
            $table->text('oper_home_build')->nullable();
            $table->text('oper_home_block')->nullable();
            $table->text('oper_home_area')->nullable();
            $table->text('oper_home_city')->nullable();
            $table->text('oper_home_photo')->nullable();
            $table->text('oper_home_email')->nullable();
            $table->text('oper_home_web')->nullable();
            $table->text('oper_home_pin')->nullable();
            $table->text('oper_home_gps')->nullable();
            $table->longText('oper_home_notes')->nullable();
            $table->text('oper_home_attach')->nullable();
            // Operating Renewal Application
            $table->text('oper_ra_date')->nullable();
            $table->text('oper_ra_letter')->nullable();
            $table->text('oper_ra_doc')->nullable();
            $table->longText('oper_ra_notes')->nullable();
            $table->text('oper_ra_attach')->nullable();
            $table->text('oper_rc_date')->nullable();
            $table->text('oper_rc_letter')->nullable();
            $table->text('oper_rc_doc')->nullable();
            $table->longText('oper_rc_notes')->nullable();
            $table->text('oper_rc_attach')->nullable();
            $table->text('oper_rap_date')->nullable();
            $table->text('oper_rap_letter')->nullable();
            $table->text('oper_rap_doc')->nullable();
            $table->longText('oper_rap_notes')->nullable();
            $table->text('oper_rap_attach')->nullable();
            //Operating Laws
            $table->longText('oper_laws_notes')->nullable();
            $table->text('oper_laws_attach')->nullable();
            //  Weapon License Details (Address) ..
            $table->text('wep_home_office')->nullable();
            $table->text('wep_home_build')->nullable();
            $table->text('wep_home_block')->nullable();
            $table->text('wep_home_area')->nullable();
            $table->text('wep_home_city')->nullable();
            $table->text('wep_home_photo')->nullable();
            $table->text('wep_home_email')->nullable();
            $table->text('wep_home_web')->nullable();
            $table->text('wep_home_pin')->nullable();
            $table->text('wep_home_gps')->nullable();
            $table->longText('wep_home_notes')->nullable();
            $table->text('wep_home_attach')->nullable();
            // Weapon Renewal Application
            $table->text('wep_ra_date')->nullable();
            $table->text('wep_ra_letter')->nullable();
            $table->text('wep_ra_doc')->nullable();
            $table->longText('wep_ra_notes')->nullable();
            $table->text('wep_ra_attach')->nullable();
            $table->text('wep_rc_date')->nullable();
            $table->text('wep_rc_letter')->nullable();
            $table->text('wep_rc_docs')->nullable();
            $table->longText('wep_rc_notes')->nullable();
            $table->text('wep_rc_attach')->nullable();
            $table->text('wep_rap_date')->nullable();
            $table->text('wep_rap_letter')->nullable();
            $table->text('wep_rap_docs')->nullable();
            $table->longText('wep_rap_notes')->nullable();
            $table->text('wep_rap_attach')->nullable();
            //Weapon Laws
            $table->longText('wep_laws_notes')->nullable();
            $table->text('wep_laws_attach')->nullable();
            //  Any Other License Details (Address) ..
            $table->text('any_a_office')->nullable();
            $table->text('any_a_build')->nullable();
            $table->text('any_a_block')->nullable();
            $table->text('any_a_area')->nullable();
            $table->text('any_a_city')->nullable();
            $table->text('any_a_photo')->nullable();
            $table->text('any_a_email')->nullable();
            $table->text('any_a_web')->nullable();
            $table->text('any_a_pin')->nullable();
            $table->text('any_a_gps')->nullable();
            $table->longText('any_a_notes')->nullable();
            $table->text('any_a_attach')->nullable();
            // Any Other Renewal Application
            $table->text('any_ra_date')->nullable();
            $table->text('any_ra_letter')->nullable();
            $table->text('any_ra_docs')->nullable();
            $table->longText('any_ra_notes')->nullable();
            $table->text('any_ra_attach')->nullable();
            $table->text('any_rc_date')->nullable();
            $table->text('any_rc_letter')->nullable();
            $table->text('any_rc_docs')->nullable();
            $table->longText('any_rc_notes')->nullable();
            $table->text('any_rc_attach')->nullable();
            $table->text('any_rap_date')->nullable();
            $table->text('any_rap_letter')->nullable();
            $table->text('any_rap_docs')->nullable();
            $table->longText('any_rap_notes')->nullable();
            $table->text('any_rap_attach')->nullable();
            //Any Other Laws
            $table->longText('any_laws_notes')->nullable();
            $table->text('any_laws_attach')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regulators');
    }
};
