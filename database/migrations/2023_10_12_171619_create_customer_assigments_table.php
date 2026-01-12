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
        Schema::create('customer_assigments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customers_id');
            $table->text('asig_customer_name')->nullable();
            $table->text('task_assigning')->nullable();
            $table->text('asig_desig')->nullable();
            $table->text('asig_office')->nullable();
            $table->text('asig_building')->nullable();
            $table->text('asig_road')->nullable();
            $table->text('asig_area')->nullable();
            $table->text('asig_city')->nullable();
            $table->text('asig_country')->nullable();
            $table->text('asig_security')->nullable();
            $table->text('asig_contact')->nullable();
            $table->text('incharge_name')->nullable();
            $table->text('incharge_desig')->nullable();
            $table->text('incharge_contact')->nullable();
            $table->text('incharge_help')->nullable();
            $table->text('incharge_desc')->nullable();
            $table->text('incharge_risk')->nullable();
            $table->text('incharge_asig')->nullable();
            $table->text('incharge_signed_by')->nullable();
            $table->date('incharge_date')->nullable();
            $table->text('incharge_offc')->nullable();
            $table->text('incharge_build')->nullable();
            $table->text('incharge_block')->nullable();
            $table->text('incharge_area')->nullable();
            $table->text('incharge_city')->nullable();
            $table->text('incharge_pin')->nullable();
            $table->text('incharge_country')->nullable();
            $table->text('incharge_site')->nullable();
            $table->text('incharge_a_g')->nullable();
            $table->text('incharge_a_ung')->nullable();
            $table->text('incharge_t_g')->nullable();
            $table->text('rec_inc_rel')->nullable();
            $table->text('feq_occ')->nullable();
            $table->text('exp_piff')->nullable();
            $table->text('any_spec')->nullable();
            $table->text('petr_instruc')->nullable();
            $table->text('asig_ex_attach')->nullable();
            $table->longText('asig_ex_notes')->nullable();
            $table->timestamps();

            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_assigments');
    }
};
