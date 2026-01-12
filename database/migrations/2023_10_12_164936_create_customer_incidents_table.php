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
        Schema::create('customer_incidents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customers_id');
            $table->text('client_name')->nullable();
            $table->text('client_id')->nullable();
            $table->text('client_site_id')->nullable();
            $table->text('client_poc')->nullable();
            $table->text('client_cell')->nullable();
            $table->text('client_email')->nullable();
            $table->text('client_site_address')->nullable();
            $table->text('client_office')->nullable();
            $table->text('client_build')->nullable();
            $table->text('client_street')->nullable();
            $table->text('client_area')->nullable();
            $table->text('client_city')->nullable();
            $table->text('client_fir')->nullable();
            $table->text('arrest')->nullable();
            $table->text('casual')->nullable();
            $table->text('injuired')->nullable();
            $table->text('incident_rep')->nullable();
            $table->text('police_officer_name')->nullable();
            $table->text('station')->nullable();
            $table->text('rank')->nullable();
            $table->text('report_made_by')->nullable();
            $table->date('report_date')->nullable();
            $table->time('report_time')->nullable();
            $table->text('report_apr_by')->nullable();
            $table->text('report_shared')->nullable();
            $table->text('incident_type')->nullable();
            $table->text('weapon_used')->nullable();
            $table->text('detail_of_attacker')->nullable();
            $table->text('attacker_desc')->nullable();
            $table->text('attacker_shoe')->nullable();
            $table->text('attacker_beard')->nullable();
            $table->text('attacker_lang')->nullable();
            $table->text('focused')->nullable();
            $table->text('opening_phrase')->nullable();
            $table->text('any_usual')->nullable();
            $table->text('estimated_loss')->nullable();
            $table->text('desc_loss')->nullable();
            $table->text('officer_response')->nullable();
            $table->text('incident_attach')->nullable();
            $table->longText('incident_note')->nullable();
            $table->timestamps();

            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_incidents');
    }
};
