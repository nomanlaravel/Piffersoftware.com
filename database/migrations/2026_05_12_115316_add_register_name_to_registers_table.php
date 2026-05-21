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
    Schema::table('registers', function (Blueprint $table) {
        $table->string('register_name')->nullable();
        $table->dropColumn('task_group_id');
    });
}

public function down()
{
    Schema::table('registers', function (Blueprint $table) {
        $table->unsignedBigInteger('task_group_id')->nullable();
        $table->dropColumn('register_name');
    });
}
};
