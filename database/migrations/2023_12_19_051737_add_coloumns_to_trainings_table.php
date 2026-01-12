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
        Schema::table('trainings', function (Blueprint $table) {
            $table->text('estimated_amount')->after('other_info')->nullable();
            $table->text('actual_amount')->after('estimated_amount')->nullable();
            $table->text('total_expense')->after('actual_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->dropColumn('estimated_amount');
            $table->dropColumn('actual_amount');
            $table->dropColumn('total_expense');
        });
    }
};
