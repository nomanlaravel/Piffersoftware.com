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
        Schema::create('requirementwebs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requirements_id');

            $table->text('web_category')->nullable();
            $table->text('web_scope')->nullable();
            $table->date('web_date')->nullable();
            $table->date('web_sub_date')->nullable();
            $table->text('web_notes')->nullable();
            $table->text('web_attachments')->nullable();

            $table->foreign('requirements_id')->references('id')->on('requirements')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirementwebs');
    }
};
