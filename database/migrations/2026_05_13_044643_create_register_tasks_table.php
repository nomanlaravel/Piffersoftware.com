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
    Schema::create('register_tasks', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('register_id');
        $table->unsignedBigInteger('group_id');
        $table->string('task_number');
        $table->text('task_description');
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('register_tasks');
    }
};
