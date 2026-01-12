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
        Schema::create('uniform_records', function (Blueprint $table) {
         $table->id();
        $table->date('uni_date');
        $table->unsignedBigInteger('branch_id');

        $fields = [
            'stand_uniform', 'white_sleeves', 'ssg_uniform', 't_shirt', 'lady_gown', 'suit', 'dms', 'standard_shows',
            'beige_color_shoes', 'whistile_n_dory', 'employee_card', 'p_gap', 'barret_cap', 'white_belt', 'black_belt',
            'sash', 'qamar_barand', 'white_gloves', 'white_arm_sleves', 'arm_band', 'scarf', 'winter_jacket',
            'high_visibility_jacket', 'jarsee', 'rain_coat', 'umbrella', 'torch', 'others',
            'supervisor_signature', 'manager_operation_signature', 'gm_signature',
        ];

        foreach ($fields as $field) {
            $table->string($field)->nullable(); // use text() if needed
        }

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uniform_records');
    }
};
