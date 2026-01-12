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
        Schema::create('customer_notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customers_id');
            $table->text('notification_no')->nullable();
            $table->text('notification_related')->nullable();
            $table->text('notification_attach')->nullable();
            $table->text('notification_note')->nullable();
            $table->text('notification_shared')->nullable();
            $table->text('notification_ex_attach')->nullable();
            $table->longText('notification_ex_note')->nullable();
            $table->timestamps();

            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_notifications');
    }
};
