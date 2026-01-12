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
        Schema::create('reg_weapon_divisions', function (Blueprint $table) {
            $table->unsignedBigInteger('regulators_id');
            $table->text('division_category')->nullable();
            $table->text('division_quantity')->nullable();
            $table->boolean('division_book')->default(false);
            $table->boolean('division_card')->default(false);
            $table->text('division_caliber')->nullable();
            $table->text('division_juris')->nullable();
            $table->text('division_sanc')->nullable();
            $table->text('division_sanc_copy')->nullable();
            $table->boolean('division_nbp')->default(false);
            $table->boolean('division_pb')->default(false);
            $table->text('division_notes')->nullable();
            $table->text('division_attach')->nullable();
            $table->timestamps();
            $table->foreign('regulators_id')->references('id')->on('regulators')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reg_weapon_divisions');
    }
};
