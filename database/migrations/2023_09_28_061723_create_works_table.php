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
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hrms_id');
            $table->text('org_name')->nullable();
            $table->text('email_oc')->nullable();
            $table->text('poc')->nullable();
            $table->text('jec')->nullable();
            $table->text('jec_attach')->nullable();
            $table->text('w_desig')->nullable();
            $table->text('w_salary')->nullable();
            $table->text('ser_tenure')->nullable();
            $table->text('ser_other')->nullable();
            $table->text('achivement')->nullable();
            $table->date('join_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('t_exp')->nullable();
            $table->timestamps();

            $table->foreign('hrms_id')->references('id')->on('hrms')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
