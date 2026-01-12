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
            $table->string('customers_suffix')->after('customers_name')->nullable();
            $table->boolean('eobi')->after('quick_box')->default(false);
            $table->boolean('social_security')->after('eobi')->default(false);
            $table->boolean('grp_life_ins')->after('social_security')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('customer_suffix');
            $table->dropColumn('eobi');
            $table->dropColumn('social_security');
            $table->dropColumn('grp_life_ins');
        });
    }
};
