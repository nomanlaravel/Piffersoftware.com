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
        Schema::create('customer_salary', function (Blueprint $table) {
            $table->id();   
            $table->unsignedBigInteger('customers_id');
            $table->text('cat_name')->nullable();
            $table->text('sal_cat')->nullable();
            $table->text('sal_days')->nullable();
            $table->text('leaves_a')->nullable();
            $table->text('other_ben')->nullable();
            $table->text('sal_attach')->nullable();
            $table->longText('sal_note')->nullable();
            $table->timestamps();
            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_salary');
    }
};
