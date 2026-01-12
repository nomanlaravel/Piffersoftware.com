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
            $table->boolean('fbr')->after('list_curr')->default(false);
            $table->boolean('pra')->after('fbr')->default(false);
            $table->boolean('kpra')->after('pra')->default(false);
            $table->boolean('srb')->after('kpra')->default(false);
            $table->boolean('bra')->after('srb')->default(false);
            $table->boolean('ajk')->after('bra')->default(false);
            $table->boolean('gb')->after('ajk')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            //
        });
    }
};
