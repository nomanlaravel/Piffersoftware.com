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
        Schema::create('admin_notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admins_id');
            $table->text('notification_no')->nullable();
            $table->text('notification_related')->nullable(); 
            $table->text('notification_notes')->nullable();
            $table->text('notification_attach')->nullable(); 
            $table->text('notification_to')->nullable(); 
            $table->timestamps();

            $table->foreign('admins_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_notifications');
    }
};
