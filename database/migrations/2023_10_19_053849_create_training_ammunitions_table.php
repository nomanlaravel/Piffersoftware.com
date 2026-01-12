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
        Schema::create('training_ammunitions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trainings_id');
            $table->text('ammu_quantity')->nullable();
            $table->text('ammu_type')->nullable();
            $table->text('person_responsible_ammu')->nullable();
            $table->text('price_per_unit_ammu')->nullable();
            $table->text('total_price_ammu')->nullable();
            $table->text('ammu_attach')->nullable();
            $table->longText('ammu_notes')->nullable();
            $table->timestamps();

            $table->foreign('trainings_id')->references('id')->on('trainings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_ammunitions');
    }
};
