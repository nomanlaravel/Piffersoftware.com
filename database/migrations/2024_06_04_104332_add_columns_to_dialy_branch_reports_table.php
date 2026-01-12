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
        Schema::table('dialy_branch_reports', function (Blueprint $table) {
            $table->text('any_site_closed')->after('no_of_guards')->nullable();
            $table->text('no_of_guards_of_closed_site')->after('any_site_closed')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dialy_branch_reports', function (Blueprint $table) {
            //
        });
    }
};
