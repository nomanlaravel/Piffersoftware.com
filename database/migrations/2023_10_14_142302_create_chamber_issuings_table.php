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
        Schema::create('chamber_issuings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chambers_id');
            $table->text('cofficer_name')->nullable();
            $table->text('cofficer_desig')->nullable();
            $table->text('cofficer_ptcl')->nullable();
            $table->text('cofficer_cell')->nullable();
            $table->text('cofficer_email')->nullable();
            $table->text('cofficer_website')->nullable();
            $table->text('cofficer_front')->nullable();
            $table->text('cofficer_back')->nullable();
            $table->longText('cofficer_notes')->nullable();
            $table->text('cofficer_attach')->nullable();
            //Secretary Journal
            $table->text('sj_name')->nullable();
            $table->text('sj_desig')->nullable();
            $table->text('sj_ptcl')->nullable();
            $table->text('sj_cell')->nullable();
            $table->text('sj_email')->nullable();
            $table->text('sj_web')->nullable();
            $table->text('sj_front')->nullable();
            $table->text('sj_back')->nullable();
            $table->longText('sj_notes')->nullable();
            $table->text('sj_attach')->nullable();
            $table->timestamps();

            $table->foreign('chambers_id')->references('id')->on('chambers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chamber_issuings');
    }
};
