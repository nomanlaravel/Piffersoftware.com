<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('hrms', function (Blueprint $table) {
            $table
                ->timestamp('last_whatsapp_interaction_at')
                ->nullable()
                ->after('updated_at');  // adjust position if needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hrms', function (Blueprint $table) {
            $table->dropColumn('last_whatsapp_interaction_at');
        });
    }
};
