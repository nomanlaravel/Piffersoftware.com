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
        Schema::create('wnationwides', function (Blueprint $table) {
            $table->id();
            $table->string('branch_id')->nullable();
            $table->string('new_profiles')->nullable();
            $table->string('old_profiles')->nullable();
            $table->string('sedulous_profiles')->nullable();
            $table->string('handbooks')->nullable();
            $table->string('kay_chains')->nullable();
            $table->string('calenders')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wnationwides');
    }
};
