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
        Schema::create('requirementaddresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requirements_id');
            $table->text('office_no')->nullable();
            $table->text('floor')->nullable();
            $table->text('building')->nullable();
            $table->text('block')->nullable();
            $table->text('area')->nullable();
            $table->text('city')->nullable();
            $table->text('builidng_attach')->nullable();
            $table->text('pin_location')->nullable();
            $table->text('company')->nullable();
            $table->text('email')->nullable();
            $table->text('website')->nullable();
            $table->text('attachments')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('requirements_id')->references('id')->on('requirements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirementaddresses');
    }
};
