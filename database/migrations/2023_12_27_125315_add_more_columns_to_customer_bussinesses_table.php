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
        Schema::table('customer_bussinesses', function (Blueprint $table) {
            $table->text('cb_name')->after('customers_id')->nullable();
            $table->text('cb_desig')->after('cb_name')->nullable();
            $table->text('cb_comp_name')->after('cb_desig')->nullable();
            $table->text('cb_email')->after('cb_comp_name')->nullable();
            $table->text('cb_cno')->after('cb_email')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_bussinesses', function (Blueprint $table) {
            $table->dropColumn('cb_name');
            $table->dropColumn('cb_desig');
            $table->dropColumn('cb_comp_name');
            $table->dropColumn('cb_email');
            $table->dropColumn('cb_cno');
        });
    }
};
