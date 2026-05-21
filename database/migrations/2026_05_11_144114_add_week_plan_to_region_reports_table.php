<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('region_reports', function (Blueprint $table) {
        $table->text('week_plan')->nullable();
    });
}

public function down()
{
    Schema::table('region_reports', function (Blueprint $table) {
        $table->dropColumn('week_plan');
    });
}
};
