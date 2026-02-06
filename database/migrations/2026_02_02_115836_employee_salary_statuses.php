<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('employee_salary_statuses', function (Blueprint $table) {
            $table->id();

            $table->string('time_period')->nullable(); // monthly / yearly
            $table->date('last_increment')->nullable();
            $table->decimal('last_increment_amount', 12, 2)->default(0);

            $table->date('next_increment')->nullable();
            $table->decimal('increment_amount', 12, 2)->default(0);
            $table->decimal('before_increment', 12, 2)->default(0);
            $table->date('salary_start')->nullable();

            $table->string('status')->default('active'); // active, frozen
            $table->boolean('can_view')->default(true);

            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('user_id')->nullable(); // created by

            $table->timestamps();

            // Indexes
            $table->index('employee_id');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employee_salary_statuses');
    }
};
