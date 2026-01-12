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
        Schema::create('weapon_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->string('date')->nullable();
            $table->string('weapon_name')->nullable();
            $table->string('weapon_type')->nullable();
            $table->string('repeater')->nullable();
            $table->string('body_guard')->nullable();
            $table->string('wooden_body')->nullable();
            $table->string('g3_style')->nullable();
            $table->string('bore12_total_bullets')->nullable();
            $table->string('bore12_total')->nullable();
            $table->string('seven_shots')->nullable();
            $table->string('fourteen_shots')->nullable();
            $table->string('mp5')->nullable();
            $table->string('kalakov')->nullable();
            $table->string('bore30_total_bullets')->nullable();
            $table->string('bore30_total')->nullable();
            $table->string('mp_5')->nullable();
            $table->string('zagana')->nullable();
            $table->string('breta')->nullable();
            $table->string('glock')->nullable();
            $table->string('mm9_total_bullets')->nullable();
            $table->string('mm9_total')->nullable();
            $table->string('mm7_standard')->nullable();
            $table->string('mm7_total_bullets')->nullable();
            $table->string('rifle_222')->nullable();
            $table->string('rifle_222_bullets')->nullable();
            $table->string('rifle_44')->nullable();
            $table->string('rifle_44_bullets')->nullable();
            $table->string('rifle_223')->nullable();
            $table->string('rifle_223_bullets')->nullable();
            $table->string('rifle_223_m4')->nullable();
            $table->string('rifle_223_m4_bullets')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weapon_records');
    }
};
