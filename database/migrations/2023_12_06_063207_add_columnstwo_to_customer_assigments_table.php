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
        Schema::table('customer_assigments', function (Blueprint $table) {
            $table->text('longitude4')->after('incharge_pin')->nullable();
            $table->text('latitude4')->after('longitude4')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_assigments', function (Blueprint $table) {
            $table->dropColumn('longitude4');
            $table->dropColumn('latitude4');
        });
    }
};
