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
        Schema::create('training_weapons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trainings_id');
            $table->text('type_of_weapon')->nullable();
            $table->text('weapon_no')->nullable();
            $table->text('caliber')->nullable();
            $table->text('bore')->nullable();
            $table->text('weapon_quantity')->nullable();
            $table->text('person_responsible_weapon')->nullable();
            $table->text('weapon_attach')->nullable();
            $table->longText('weapon_notes')->nullable();
            $table->timestamps();

            $table->foreign('trainings_id')->references('id')->on('trainings')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_weapons');
    }
};
