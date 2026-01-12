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
        Schema::create('requirementattendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requirements_id');

            $table->text('attendance_category')->nullable();
            $table->text('attendance_rate')->nullable();
            $table->text('attendance_sheet')->nullable();
            $table->text('attendance_specifications')->nullable();
            $table->text('attendance_notes')->nullable();
            $table->text('attendance_attachment')->nullable();

            $table->foreign('requirements_id')->references('id')->on('requirements')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirementattendances');
    }
};
