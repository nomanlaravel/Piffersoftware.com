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
        Schema::create('customer_feedback', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customers_id');
            $table->text('feed_client_name')->nullable();
            $table->text('feed_client_poc_name')->nullable();
            $table->text('feed_client_email')->nullable();
            $table->text('feed_client_id')->nullable();
            $table->text('feed_client_site_id')->nullable();
            $table->text('feed_desig')->nullable();
            $table->text('feed_cell')->nullable();
            $table->text('feed_month')->nullable();
            $table->integer('q1')->nullable();
            $table->integer('q2')->nullable();
            $table->integer('q3')->nullable();
            $table->integer('q4')->nullable();
            $table->integer('q5')->nullable();
            $table->integer('q6')->nullable();
            $table->integer('q7')->nullable();
            $table->integer('q8')->nullable();
            $table->integer('q9')->nullable();
            $table->integer('q10')->nullable();
            $table->text('feed_company_name')->nullable();
            $table->text('feed_poc_name')->nullable();
            $table->text('feed_comment')->nullable();
            $table->text('feedback_form')->nullable();
            $table->text('feed_email')->nullable();
            $table->text('feed_telephone')->nullable();
            $table->text('feed_signature')->nullable();
            $table->text('feed_received')->nullable();
            $table->text('feed_remarks')->nullable();
            $table->text('feed_attach')->nullable();
            $table->timestamps();

            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_feedback');
    }
};
