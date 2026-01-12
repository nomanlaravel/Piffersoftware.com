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
        Schema::create('training_equipments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trainings_id');
            $table->text('sec_equip_category')->nullable();
            $table->text('sec_equip_type')->nullable();
            $table->text('sec_equip_quantity')->nullable();
            $table->text('person_responsible_sec_equip')->nullable();
            $table->text('sec_equip_attach')->nullable();
            $table->longText('sec_equip_notes')->nullable();
            $table->text('red_flag_quantity')->nullable();
            $table->text('target_quantity')->nullable();
            $table->timestamps();

            $table->foreign('trainings_id')->references('id')->on('trainings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_equipments');
    }
};
