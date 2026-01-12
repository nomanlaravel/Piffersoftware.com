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
        Schema::table('customers', function (Blueprint $table) {
         
            $table->dropColumn('scr_cus_name');
            $table->dropColumn('scr_cus_region');
            $table->dropColumn('scr_cus_id');
            $table->dropColumn('scr_cus_site_id');
            $table->dropColumn('scr_cus_report');
            $table->dropColumn('scr_cus_date');
            $table->dropColumn('cus_poc_name');
            $table->dropColumn('cus_poc_signature');
            $table->dropColumn('cus_poc_cell');
            $table->dropColumn('cro_name');
            $table->dropColumn('cro_signature');
            $table->dropColumn('cro_cell');
            $table->dropColumn('gm_name');
            $table->dropColumn('gm_signature');
            $table->dropColumn('gm_cell');
            $table->dropColumn('sc_cus_name');
            $table->dropColumn('sc_cus_region');
            $table->dropColumn('sc_cus_id');
            $table->dropColumn('sc_cus_siteid');
            $table->dropColumn('sc_cus_report');
            $table->dropColumn('marks1_schf');
            $table->dropColumn('marks1_rsv');
            $table->dropColumn('marks1_rsgc');
            $table->dropColumn('marks1_cd');
            $table->dropColumn('marks1_tm1');
            $table->dropColumn('marks2_us');
            $table->dropColumn('marks2_tm2');
            $table->dropColumn('marks3_wfds');
            $table->dropColumn('marks3_av');
            $table->dropColumn('marks3_tm3');
            $table->dropColumn('marks4_elfat');
            $table->dropColumn('marks4_athb');
            $table->dropColumn('marks4_tm4');
            $table->dropColumn('marks5_apapc');
            $table->dropColumn('marks5_gs');
            $table->dropColumn('marks5_finance');
            $table->dropColumn('marks5_tm5');
            $table->dropColumn('marks6_sff');
            $table->dropColumn('marks6_tm6');
            $table->dropColumn('marks7_mvtm');
            $table->dropColumn('marks7_mprs');
            $table->dropColumn('marks7_srlms');
            $table->dropColumn('marks7_risite');
            $table->dropColumn('marks7_risurr');
            $table->dropColumn('marks7_sdnl');
            $table->dropColumn('marks7_tm7');
            $table->dropColumn('marks_grand_total');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
          
        });
    }
};
