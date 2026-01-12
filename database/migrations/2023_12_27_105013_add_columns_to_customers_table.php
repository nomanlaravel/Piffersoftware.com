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
            $table->text('scr_cus_name')->after('meeting_alert_notes')->nullable();
            $table->text('scr_cus_region')->after('scr_cus_name')->nullable();
            $table->text('scr_cus_id')->after('scr_cus_region')->nullable();
            $table->text('scr_cus_site_id')->after('scr_cus_id')->nullable();
            $table->text('scr_cus_report')->after('scr_cus_site_id')->nullable();
            $table->text('scr_cus_date')->after('scr_cus_report')->nullable();
            $table->text('cus_poc_name')->after('scr_cus_date')->nullable();
            $table->text('cus_poc_signature')->after('cus_poc_name')->nullable();
            $table->text('cus_poc_cell')->after('cus_poc_signature')->nullable();
            $table->text('cro_name')->after('cus_poc_cell')->nullable();
            $table->text('cro_signature')->after('cro_name')->nullable();
            $table->text('cro_cell')->after('cro_signature')->nullable();
            $table->text('gm_name')->after('cro_cell')->nullable();
            $table->text('gm_signature')->after('gm_name')->nullable();
            $table->text('gm_cell')->after('gm_signature')->nullable();
            $table->text('sc_cus_name')->after('gm_cell')->nullable();
            $table->text('sc_cus_region')->after('sc_cus_name')->nullable();
            $table->text('sc_cus_id')->after('sc_cus_region')->nullable();
            $table->text('sc_cus_siteid')->after('sc_cus_id')->nullable();
            $table->text('sc_cus_report')->after('sc_cus_siteid')->nullable();
            $table->double('marks1_schf')->after('sc_cus_report')->nullable();
            $table->double('marks1_rsv')->after('marks1_schf')->nullable();
            $table->double('marks1_rsgc')->after('marks1_rsv')->nullable();
            $table->double('marks1_cd')->after('marks1_rsgc')->nullable();
            $table->double('marks1_tm1')->after('marks1_cd')->nullable();
            $table->double('marks2_us')->after('marks1_tm1')->nullable();
            $table->double('marks2_tm2')->after('marks2_us')->nullable();
            $table->double('marks3_wfds')->after('marks2_tm2')->nullable();
            $table->double('marks3_av')->after('marks3_wfds')->nullable();
            $table->double('marks3_tm3')->after('marks3_av')->nullable();
            $table->double('marks4_elfat')->after('marks3_tm3')->nullable();
            $table->double('marks4_athb')->after('marks4_elfat')->nullable();
            $table->double('marks4_tm4')->after('marks4_athb')->nullable();
            $table->double('marks5_apapc')->after('marks4_tm4')->nullable();
            $table->double('marks5_gs')->after('marks5_apapc')->nullable();
            $table->double('marks5_finance')->after('marks5_gs')->nullable();
            $table->double('marks5_tm5')->after('marks5_finance')->nullable();
            $table->double('marks6_sff')->after('marks5_tm5')->nullable();
            $table->double('marks6_tm6')->after('marks6_sff')->nullable();
            $table->double('marks7_mvtm')->after('marks6_tm6')->nullable();
            $table->double('marks7_mprs')->after('marks7_mvtm')->nullable();
            $table->double('marks7_srlms')->after('marks7_mprs')->nullable();
            $table->double('marks7_risite')->after('marks7_srlms')->nullable();
            $table->double('marks7_risurr')->after('marks7_risite')->nullable();
            $table->double('marks7_sdnl')->after('marks7_risurr')->nullable();
            $table->double('marks7_tm7')->after('marks7_sdnl')->nullable();
            $table->double('marks_grand_total')->after('marks7_tm7')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
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
};
