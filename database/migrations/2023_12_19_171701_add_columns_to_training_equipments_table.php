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
        Schema::table('training_equipments', function (Blueprint $table) {
            $table->text('sec_equip_pricepu')->after('sec_equip_type')->nullable();
            $table->text('sec_equip_totalprice')->after('sec_equip_quantity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('training_equipments', function (Blueprint $table) {
            $table->dropColumn('sec_equip_pricepu');
            $table->dropColumn('sec_equip_totalprice');
        });
    }
};
