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
        Schema::table('rentals', function (Blueprint $table) {
            $table->string('rental_number')->nullable();
            $table->string('amount_advance')->nullable();
            $table->string('instrument_no')->nullable();
            $table->string('voucher_no')->nullable();
            $table->string('name_bank')->nullable();
            $table->text('rental_pic')->nullable();
            $table->LongText('rental_notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rentals', function (Blueprint $table) {
            //
        });
    }
};
