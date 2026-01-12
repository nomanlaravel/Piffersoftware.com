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
        Schema::create('corporate_issuings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('corporates_id');
            $table->text('i_name')->nullable();
            $table->text('i_desig')->nullable();
            $table->text('i_ptcl')->nullable();
            $table->text('i_cell')->nullable();
            $table->text('i_email')->nullable();
            $table->text('i_website')->nullable();
            $table->text('i_front')->nullable();
            $table->text('i_back')->nullable();
            $table->Longtext('i_notes')->nullable();
            $table->text('i_attach')->nullable();
            $table->timestamps();

            $table->foreign('corporates_id')->references('id')->on('corporates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corporate_issuings');
    }
};
