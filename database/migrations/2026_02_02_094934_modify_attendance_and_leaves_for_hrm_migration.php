<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
                    // If the foreign key doesn't exist, it will not throw an error
                }
            });
            // Rename user_id to hrm_id
            DB::statement("ALTER TABLE attendances CHANGE user_id hrm_id BIGINT UNSIGNED NOT NULL");
        }

        // Clean bad data before adding FK
        DB::table('attendances')->delete();

        Schema::table('attendances', function (Blueprint $table) {
            // Add the foreign key constraint
            $table->foreign('hrm_id')->references('id')->on('hrms')->onDelete('cascade');
        });

        // Modify employee_leaves table
        if (Schema::hasColumn('employee_leaves', 'owner_id')) {
            Schema::table('employee_leaves', function (Blueprint $table) {
                // Try dropping FK if it exists
                try {
                    $table->dropForeign(['owner_id']);
                } catch (\Exception $e) {
                    // If the foreign key doesn't exist, it will not throw an error
                }
            });

            // Rename owner_id to hrm_id
            DB::statement("ALTER TABLE employee_leaves CHANGE owner_id hrm_id BIGINT UNSIGNED NOT NULL");
        }

        // Clean bad data
        DB::table('employee_leaves')->delete();

        Schema::table('employee_leaves', function (Blueprint $table) {
            // Add the foreign key constraint
            $table->foreign('hrm_id')->references('id')->on('hrms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reverse changes on attendances table
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropForeign(['hrm_id']);
        });

        DB::statement("ALTER TABLE attendances CHANGE hrm_id user_id BIGINT UNSIGNED NOT NULL");

        Schema::table('attendances', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // Reverse changes on employee_leaves table
        Schema::table('employee_leaves', function (Blueprint $table) {
            $table->dropForeign(['hrm_id']);
        });

        DB::statement("ALTER TABLE employee_leaves CHANGE hrm_id owner_id BIGINT UNSIGNED NOT NULL");

        Schema::table('employee_leaves', function (Blueprint $table) {
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
