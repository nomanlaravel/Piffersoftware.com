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
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->string('regulator_name')->nullable();
            $table->date('notice_date')->nullable();
            $table->date('notice_received_on')->nullable();
            $table->date('reporting_date')->nullable();
            $table->string('concern_department')->nullable();
            $table->boolean('notice_entered')->default(0);
            $table->boolean('reported_to_cro')->default(0);
            $table->text('notice_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notices');
    }
};
