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
        // Modify attendances table
        if (Schema::hasColumn('attendances', 'user_id')) {
            Schema::table('attendances', function (Blueprint $table) {
                // Try dropping FK if it exists, use array syntax which Laravel guesses name for
                try {
                    $table->dropForeign(['user_id']);
                } catch (\Exception $e) {
                }
            });
            // Rename
            DB::statement("ALTER TABLE attendances CHANGE user_id hrm_id BIGINT UNSIGNED NOT NULL");
        }

        // Clean bad data before adding FK
        DB::table('attendances')->delete();

        Schema::table('attendances', function (Blueprint $table) {
            // Check if FK exists? indexes? Just add it.
            $table->foreign('hrm_id')->references('id')->on('hrms')->onDelete('cascade');
        });

        // Modify employee_leaves table
        if (Schema::hasColumn('employee_leaves', 'owner_id')) {
            Schema::table('employee_leaves', function (Blueprint $table) {
                try {
                    $table->dropForeign(['owner_id']);
                } catch (\Exception $e) {
                }
            });

            DB::statement("ALTER TABLE employee_leaves CHANGE owner_id hrm_id BIGINT UNSIGNED NOT NULL");
        }

        // Clean bad data
        DB::table('employee_leaves')->delete();

        Schema::table('employee_leaves', function (Blueprint $table) {
            $table->foreign('hrm_id')->references('id')->on('hrms')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropForeign(['hrm_id']);
        });

        DB::statement("ALTER TABLE attendances CHANGE hrm_id user_id BIGINT UNSIGNED NOT NULL");

        Schema::table('attendances', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('employee_leaves', function (Blueprint $table) {
            $table->dropForeign(['hrm_id']);
        });

        DB::statement("ALTER TABLE employee_leaves CHANGE hrm_id owner_id BIGINT UNSIGNED NOT NULL");

        Schema::table('employee_leaves', function (Blueprint $table) {
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
