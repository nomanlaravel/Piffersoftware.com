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
        Schema::create('customer_man_powers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customers_id');
            $table->text('man_post')->nullable();
            $table->text('man_cat')->nullable();
            $table->text('man_uni')->nullable();
            $table->text('man_uni_no')->nullable();
            $table->text('man_weapon')->nullable();
            $table->text('man_ammu')->nullable();
            $table->text('man_equip')->nullable();
            $table->text('man_equip_attach')->nullable();
            $table->date('s_start_date')->nullable();
            $table->date('s_end_date')->nullable();
            $table->time('s_start_time')->nullable();
            $table->time('s_end_time')->nullable();
            $table->date('man_start_date')->nullable();
            $table->date('man_end_date')->nullable();
            $table->time('man_start_time')->nullable();
            $table->time('man_end_time')->nullable();
            $table->text('man_quan')->nullable();
            $table->text('man_hours')->nullable();
            $table->text('man_jd')->nullable();
            $table->text('man_any_sp')->nullable();
            $table->text('man_apr_l')->nullable();
            $table->text('man_salary')->nullable();
            $table->timestamps();

            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_man_powers');
    }
};
