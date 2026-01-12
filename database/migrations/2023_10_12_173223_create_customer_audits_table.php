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
        Schema::create('customer_audits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customers_id');
            $table->text('audit_file')->nullable();
            $table->text('audit_sign')->nullable();
            $table->text('audit_date')->nullable();
            $table->text('audit_attach')->nullable();
            $table->text('audit_checked_by')->nullable();
            $table->text('audit_ex_attach')->nullable();
            $table->longText('audit_note')->nullable();
            $table->timestamps();

            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_audits');
    }
};
