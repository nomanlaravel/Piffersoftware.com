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
        Schema::create('reg_other_issuings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('regulators_id');
            $table->text('other_iss_co_name')->nullable();
            $table->text('other_iss_co_desig')->nullable();
            $table->text('other_iss_co_dept')->nullable();
            $table->text('other_iss_co_section')->nullable();
            $table->text('other_iss_co_ptcl')->nullable();
            $table->text('other_iss_co_cell')->nullable();
            $table->text('other_iss_co_email')->nullable();
            $table->text('other_iss_co_web')->nullable();
            $table->text('other_iss_co_front')->nullable();
            $table->text('other_iss_co_back')->nullable();
            $table->Longtext('other_iss_co_notes')->nullable();
            $table->text('other_iss_co_attach')->nullable();

            $table->timestamps();
            $table->foreign('regulators_id')->references('id')->on('regulators')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reg_other_issuings');
    }
};




