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
    Schema::table('requirements', function (Blueprint $table) {
        $table->string('tec_pro_attach')->nullable();
    });
}

public function down()
{
    Schema::table('requirements', function (Blueprint $table) {
        $table->dropColumn('tec_pro_attach');
    });
}
};
