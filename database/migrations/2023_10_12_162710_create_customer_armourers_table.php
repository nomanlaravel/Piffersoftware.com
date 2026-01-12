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
        Schema::create('customer_armourers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customers_id');
            $table->text('arm_branch_name')->nullable();
            $table->text('arm_branch_id')->nullable();
            $table->text('arm_site_id')->nullable();
            $table->text('arm_client_name')->nullable();
            $table->text('arm_weapon_no')->nullable();
            $table->text('arm_weapon_bore')->nullable();
            $table->text('arm_weapon_type')->nullable();
            $table->text('arm_work_detail')->nullable();
            $table->text('arm_sign_cus')->nullable();
            $table->text('arm_auth')->nullable();
            $table->text('arm_auth_no')->nullable();
            $table->date('arm_auth_date')->nullable();
            $table->text('arm_auth_issue')->nullable();
            $table->text('arm_weapon_cleaned')->nullable();
            $table->text('type_weapon_cleaned')->nullable();
            $table->text('arm_pic_b')->nullable();
            $table->text('arm_pic_a')->nullable();
            $table->text('arm_cost_day')->nullable();
            $table->text('arm_cost_bill')->nullable();
            $table->text('arm_next_clean')->nullable();
            $table->longText('arm_auth_notes')->nullable();
            $table->text('arm_auth_attach')->nullable();
            $table->timestamps();

            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_armourers');
    }
};
