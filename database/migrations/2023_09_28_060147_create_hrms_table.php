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
        Schema::create('hrms', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('fname')->nullable();
            $table->string('cnic')->nullable();
            $table->text('employee_no')->nullable();
            $table->string('bank')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('cell')->nullable();
            $table->text('photo')->nullable();
            $table->text('category')->nullable();
            $table->text('rank')->nullable();
            $table->text('designation')->nullable();
            $table->text('unit')->nullable();
            $table->text('hired_at')->nullable();
            //Basic Information
            $table->date('dob')->nullable();
            $table->text('religion')->nullable();
            $table->text('caste')->nullable();
            $table->text('gender')->nullable();
            $table->text('p_cell')->nullable();
            $table->string('e_cell')->nullable();
            $table->string('blood')->nullable();
            $table->text('email')->nullable();
            $table->text('cnic_front')->nullable();
            $table->text('cnic_back')->nullable();
            $table->text('f_attach')->nullable();
            $table->text('m_status')->nullable();
            $table->text('no_of_kids')->nullable();
            $table->text('m_kids')->nullable();
            $table->text('f_kids')->nullable();
            $table->date('cnic_issue')->nullable();
            $table->date('cnic_expire')->nullable();
            $table->longText('notes')->nullable();
            //Address Details
            $table->string('t_address')->nullable();
            $table->text('t_area')->nullable();
            $table->text('t_city')->nullable();
            $table->text('t_police')->nullable();
            $table->text('t_district')->nullable();
            $table->text('t_post')->nullable();
            $table->text('t_tehsil')->nullable();
            $table->text('t_province')->nullable();
            $table->text('t_postal')->nullable();
            $table->date('t_residing')->nullable();
            $table->text('t_gps')->nullable();
            $table->text('t_attach')->nullable();
            $table->longText('t_note')->nullable();
            $table->text('p_address')->nullable();
            $table->text('p_area')->nullable();
            $table->text('p_city')->nullable();
            $table->text('p_police')->nullable();
            $table->text('p_district')->nullable();
            $table->text('p_post')->nullable();
            $table->text('p_tehsil')->nullable();
            $table->text('p_province')->nullable();
            $table->text('p_postal')->nullable();
            $table->date('p_residing')->nullable();
            $table->text('p_gps')->nullable();
            $table->text('p_attach')->nullable();
            $table->longText('p_note')->nullable();
            //Next of Kin
            $table->string('nok_name')->nullable();
            $table->text('nok_cnic')->nullable();
            $table->text('nok_fname')->nullable();
            $table->text('nok_relation')->nullable();
            $table->text('nok_death')->nullable();
            $table->text('nok_frc')->nullable();
            // Verifications
            $table->text('h_verify')->nullable();
            $table->text('b_verify')->nullable();
            $table->text('p_verify')->nullable();
            $table->text('d_book')->nullable();
            $table->text('v_verify')->nullable();
            $table->text('copy_bill')->nullable();
            $table->text('n_verify')->nullable();
            $table->text('insurrance')->nullable();
            $table->text('guard_bank')->nullable();
            $table->text('bio_verify')->nullable();
            $table->text('c_verify')->nullable();
            $table->text('dpo_verify')->nullable();
            $table->text('form_send')->nullable();
            $table->text('sent_on')->nullable();
            $table->text('form_attach')->nullable();
            $table->date('form_rec')->nullable();
            $table->date('rec_on')->nullable();
            $table->string('rec_attach')->nullable();
            $table->text('eight_verify')->nullable();
            $table->longText('sahulat_v')->nullable();
            $table->date('look_back1')->nullable();
            $table->text('frequency1')->nullable();
            $table->longText('notes1')->nullable();
            $table->date('look_back2')->nullable();
            $table->text('frequency2')->nullable();
            $table->longText('notes2')->nullable();
            $table->date('look_back3')->nullable();
            $table->text('frequency3')->nullable();
            $table->longText('notes3')->nullable();
            $table->date('look_back4')->nullable();
            $table->text('frequency4')->nullable();
            $table->longText('notes4')->nullable();
            $table->date('look_back5')->nullable();
            $table->text('frequency5')->nullable();
            $table->longText('notes5')->nullable();
            $table->date('look_back6')->nullable();
            $table->text('frequency6')->nullable();
            $table->longText('notes6')->nullable();
            $table->date('look_back7')->nullable();
            $table->text('frequency7')->nullable();
            $table->longText('notes7')->nullable();
            $table->date('look_back8')->nullable();
            $table->text('frequency8')->nullable();
            $table->longText('notes8')->nullable();
            $table->date('look_back9')->nullable();
            $table->text('frequency9')->nullable();
            $table->longText('notes9')->nullable();
            $table->date('look_back10')->nullable();
            $table->text('frequency10')->nullable();
            $table->longText('notes10')->nullable();
            $table->date('look_back11')->nullable();
            $table->text('frequency11')->nullable();
            $table->longText('notes11')->nullable();
            $table->date('look_back12')->nullable();
            $table->text('frequency12')->nullable();
            $table->longText('notes12')->nullable();
            $table->date('look_back13')->nullable();
            $table->text('frequency13')->nullable();
            $table->longText('notes13')->nullable();
            $table->date('look_back14')->nullable();
            $table->text('frequency14')->nullable();
            $table->longText('notes14')->nullable();
            //FingerPrint Samples
            $table->text('l_finger')->nullable();
            $table->text('f_finger')->nullable();
            $table->text('m_finger')->nullable();
            $table->text('i_finger')->nullable();
            $table->text('t_finger')->nullable();
            $table->text('additionals')->nullable();
            $table->text('f_attachment')->nullable();
            $table->Longtext('finger_note')->nullable();
            //Health
            $table->text('h_age')->nullable();
            $table->text('weight')->nullable();
            $table->text('height')->nullable();
            $table->text('complection')->nullable();
            $table->text('ay_other_d')->nullable();
            $table->text('medical_category')->nullable();
            $table->text('vaccine_card')->nullable();
            $table->text('medical_fit_card')->nullable();
            $table->text('medical_fit_attach')->nullable();
            $table->text('medical_fit_note')->nullable();
            $table->text('phy_name')->nullable();
            $table->text('phy_cell')->nullable();
            $table->text('phy_office')->nullable();
            $table->text('phy_building')->nullable();
            $table->text('phy_block')->nullable();
            $table->text('phy_area')->nullable();
            $table->text('phy_city')->nullable();
            $table->text('phy_loc')->nullable();
            $table->Longtext('phy_note')->nullable();
            $table->text('phy_attach')->nullable();
            $table->text('vac_type')->nullable();
            $table->text('vac_pr')->nullable();
            // Complainces (EOBI)
            $table->text('c_eobi')->nullable();
            $table->text('f_eobi')->nullable();
            $table->text('sub_eobi')->nullable();
            $table->text('front_eobi')->nullable();
            $table->text('back_eobi')->nullable();
            // Complainces (SS)
            $table->text('ss_staff')->nullable();
            $table->text('fall_ss')->nullable();
            $table->text('sub_ss')->nullable();
            $table->text('front_ss')->nullable();
            $table->text('back_ss')->nullable();
            // Complainces (gli)
            $table->text('gli_ins')->nullable();
            $table->text('gli_name')->nullable();
            $table->text('gli_policy')->nullable();
            $table->text('type_ins')->nullable();
            $table->text('sum_gli')->nullable();
            $table->date('date_ins')->nullable();
            $table->text('snc_pol')->nullable();
            //Next OF Kin
            $table->text('next_name')->nullable();
            $table->text('next_cnic')->nullable();
            $table->text('next_fname')->nullable();
            $table->text('next_relation')->nullable();
            $table->text('next_death')->nullable();
            $table->text('next_frc')->nullable();
            $table->text('next_legal')->nullable();
            $table->text('next_photo')->nullable();
            $table->text('next_claim')->nullable();
            $table->text('next_amount')->nullable();
            $table->text('next_check')->nullable();
            $table->date('next_date')->nullable();
            $table->text('next_copy')->nullable();
            $table->text('next_bank')->nullable();
            $table->text('next_ins')->nullable();
            $table->text('next_attach')->nullable();
            $table->text('ex_next_attach')->nullable();
            $table->Longtext('ex_next_note')->nullable();
            //Security Guard License
            $table->text('s_license')->nullable();
            $table->text('s_issuing')->nullable();
            $table->date('s_v_date')->nullable();
            $table->date('s_date')->nullable();
            $table->text('s_fee')->nullable();
            $table->text('s_front')->nullable();
            $table->text('s_back')->nullable();
            $table->text('s_notes')->nullable();
            $table->Longtext('s_attach')->nullable();
            //Site inspection
            $table->text('insp_no')->nullable();
            $table->text('insp_name')->nullable();
            $table->text('insp_cell')->nullable();
            $table->date('insp_date')->nullable();
            $table->text('insp_pic')->nullable();
            $table->text('rem_petr')->nullable();
            $table->text('insp_attach')->nullable();
            $table->text('insp_notes')->nullable();
            //Observation And Appraisal
            $table->text('observ_mon')->nullable();
            $table->text('observ_type')->nullable();
            $table->text('hr_remark')->nullable();
            $table->text('ex_observ_attach')->nullable();
            $table->text('appraisal')->nullable();
            $table->text('appraisal_attach')->nullable();
            $table->text('appraisal_notes')->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrms');
    }
};
