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
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('cat_name');
            $table->dropColumn('sal_cat');
            $table->dropColumn('sal_days');
            $table->dropColumn('leaves_a');
            $table->dropColumn('other_ben');
            $table->dropColumn('sal_attach');
            $table->dropColumn('sal_note');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->text('cat_name')->nullable();
            $table->text('sal_cat')->nullable();
            $table->text('sal_days')->nullable();
            $table->text('leaves_a')->nullable();
            $table->text('other_ben')->nullable();
            $table->text('sal_attach')->nullable();
            $table->longTexttext('sal_note')->nullable();
        });
    }
};
