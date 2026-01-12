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
        Schema::table('trainings', function (Blueprint $table) {
            $table->dropColumn([
                'poc_name',
                'poc_desig',
                'poc_fax',
                'poc_phone',
                'poc_mobile',
                'poc_web',
                'poc_email',
                'poc_loc',
                'poc_document',
                'system_id',
                'other_info'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // If you ever need to rollback, you can recreate the dropped columns here
        Schema::table('trainings', function (Blueprint $table) {
            $table->text('poc_name')->nullable();
            $table->text('poc_desig')->nullable();
            $table->text('poc_fax')->nullable();
            $table->text('poc_phone')->nullable();
            $table->text('poc_mobile')->nullable();
            $table->text('poc_web')->nullable();
            $table->text('poc_email')->nullable();
            $table->text('poc_loc')->nullable();
            $table->text('poc_document')->nullable();
            $table->text('system_id')->nullable();
            $table->text('other_info')->nullable();
        });
    }
};
