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
        Schema::create('branch_employees', function (Blueprint $table) {
$table->id();
            $table->string('branch_office_name');
            $table->string('branch_id');
            $table->string('region');
            $table->string('employee_name');
            $table->string('employee_designation');
            $table->string('status')->default('active');
            $table->text('notes')->nullable();
            $table->foreignId('admin_id')->constrained('admins')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_employees');
    }
};
