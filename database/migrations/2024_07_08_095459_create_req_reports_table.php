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
        Schema::create('req_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requisition_id'); // Corrected foreign key name
            $table->date('date')->nullable();
            $table->text('item_name')->nullable(); 
            $table->text('item_code')->nullable();
            $table->text('quantity')->nullable();
            $table->text('description')->nullable(); 
            $table->text('manufacturing')->nullable();
            $table->text('size')->nullable();
            $table->text('article_no')->nullable(); 
            $table->text('any_special_ins')->nullable();
            $table->text('notes')->nullable();
            $table->text('attachments')->nullable();
            $table->timestamps();
            
            $table->foreign('requisition_id')->references('id')->on('requisitions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('req_reports');
    }
};
