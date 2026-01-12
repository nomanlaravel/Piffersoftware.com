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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hrms_id');
            $table->text('degree')->nullable();
            $table->date('degree_date')->nullable();
            $table->text('degree_pic')->nullable();
            $table->text('institute_name')->nullable();
            $table->text('a_body')->nullable();
            $table->Longtext('ex_notes')->nullable();
            $table->text('degree_no')->nullable();
            $table->text('degree_level')->nullable();
            $table->text('obmarks')->nullable();
            $table->text('t_marks')->nullable();
            $table->text('grade')->nullable();
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->text('adress_inst')->nullable();
            $table->text('deg_attach')->nullable();
            $table->timestamps();

            $table->foreign('hrms_id')->references('id')->on('hrms')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
