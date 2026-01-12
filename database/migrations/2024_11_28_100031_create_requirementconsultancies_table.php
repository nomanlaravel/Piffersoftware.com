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
        Schema::create('requirementconsultancies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requirements_id');

            $table->text('consultancy_category')->nullable();
            $table->text('scope_of_work')->nullable();
            $table->date('internal_deadline')->nullable();
            $table->date('consultancy_date_of_submission')->nullable();
            $table->text('consultancy_notes')->nullable();
            $table->text('consultancy_attach')->nullable();

            $table->foreign('requirements_id')->references('id')->on('requirements')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirementconsultancies');
    }
};
