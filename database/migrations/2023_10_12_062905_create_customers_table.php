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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->text('customers_id')->nullable();
            $table->text('customers_name')->nullable();
            $table->text('city_of_deployment')->nullable();
            $table->text('display_name_as')->nullable();
            $table->text('nature_of_business')->nullable();
            $table->text('website')->nullable();
            $table->text('phone')->nullable();
            $table->text('email')->nullable();
            $table->text('sub_customer')->nullable();
            $table->boolean('approved_com')->default(false);
            $table->boolean('quick_box')->default(false);
            $table->text('approved_attach')->nullable();
            $table->text('quickbooks_attach')->nullable();
            $table->text('applicable_compliances')->nullable();

            //Contract Management
            $table->text('sum_apr')->nullable();
            $table->text('acm_status')->nullable();
            $table->text('meal_detail')->nullable();
            $table->text('apr_kpi')->nullable();
            $table->boolean('approv_q_s')->default(false);
            $table->text('approv_q_s_attach')->nullable();
            $table->boolean('approv_q_c')->default(false);
            $table->text('approv_q_c_attach')->nullable();
            $table->boolean('approv_q_cfo')->default(false);
            $table->text('approv_q_cfo_attach')->nullable();
            $table->date('c_e_date')->nullable();
            $table->date('c_end_date')->nullable();
            $table->date('c_r_date')->nullable();
            $table->text('c_r_rem')->nullable();
            $table->boolean('sales_dept')->default(false);
            $table->boolean('cmd')->default(false);
            $table->boolean('ops_dept')->default(false);
            $table->boolean('finance_dept')->default(false);
            $table->boolean('directors')->default(false);
            $table->boolean('signed_ser')->default(false);
            $table->text('signed_ser_attach')->nullable();
            $table->boolean('com_ins')->default(false);
            $table->text('com_ins_attach')->nullable();
            $table->boolean('testimonials')->default(false);
            $table->text('testimonials_attach')->nullable();
            $table->boolean('sales_inc')->default(false);
            $table->text('sales_inc_attach')->nullable();
            //Performance Guaranty
            $table->text('insc_name')->nullable();
            $table->date('insc_date')->nullable();
            $table->text('per_guan')->nullable();
            $table->text('perfom_attach')->nullable();
            $table->text('perform_note')->nullable();
            //Payment Terms
            $table->text('pay_terms')->nullable();
            $table->text('ntn_fbr')->nullable();
            //Relevant Details of Manager Billing of Customer
            $table->text('poc_name')->nullable();
            $table->text('poc_desig')->nullable();
            $table->text('poc_cell')->nullable();
            $table->text('poc_email')->nullable();
            $table->text('poc_bill_c')->nullable();
            $table->text('poc_bill_d')->nullable();
            $table->text('poc_bill_l')->nullable();
            $table->text('poc_office')->nullable();
            $table->text('poc_building')->nullable();
            $table->text('poc_block')->nullable();
            $table->text('poc_area')->nullable();
            $table->text('poc_city')->nullable();
            $table->text('poc_photo')->nullable();
            $table->text('poc_pin')->nullable();
            $table->longText('poc_note')->nullable();
            $table->text('poc_attach')->nullable();
            //Customer's CFO Details :
            $table->text('cf_name')->nullable();
            $table->text('cf_desig')->nullable();
            $table->text('cf_no')->nullable();
            $table->text('cf_office')->nullable();
            $table->text('cf_building')->nullable();
            $table->text('cf_block')->nullable();
            $table->text('cf_area')->nullable();
            $table->text('cf_city')->nullable();
            $table->text('cf_photo')->nullable();
            $table->text('cf_pin')->nullable();
            $table->longText('cf_note')->nullable();
            $table->text('cf_attach')->nullable();
            //List Of Currency
            $table->text('list_curr')->nullable();
            $table->text('list_prov')->nullable();
            $table->text('currency_attach')->nullable();
            $table->LongText('currency_note')->nullable();
            //Salary and other benefits
            $table->text('cat_name')->nullable();
            $table->text('sal_cat')->nullable();
            $table->text('sal_days')->nullable();
            $table->text('leaves_a')->nullable();
            $table->text('other_ben')->nullable();
            $table->text('sal_attach')->nullable();
            $table->longText('sal_note')->nullable();
            //Patrolling Vehicle
            $table->text('pat_name')->nullable();
            $table->text('pat_model')->nullable();
            $table->text('pat_make')->nullable();
            $table->text('pat_reg')->nullable();
            $table->text('pat_quan')->nullable();
            $table->text('pat_price')->nullable();
            $table->longText('pat_val')->nullable();
            //Meeting with Customer
            $table->text('meeting_date')->nullable();
            $table->text('meeting_chaired')->nullable();
            $table->text('meeting_minutes')->nullable();
            $table->text('meeting_attach')->nullable();
            $table->text('meeting_comment')->nullable();
            $table->text('meeting_main_point')->nullable();
            $table->text('meeting_ex_attach')->nullable();
            $table->text('meeting_freq')->nullable();
            $table->text('meeting_freq_attach')->nullable();
            $table->longText('meeting_freq_note')->nullable();
            $table->text('meeting_freq_alert')->nullable();
            $table->text('meeting_alert_attach')->nullable();
            $table->text('meeting_alert_notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
