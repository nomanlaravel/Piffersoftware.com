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
        Schema::create('dialy_branch_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admins_id');
            $table->text('site_id')->nullable();
            $table->text('branch')->nullable(); 
            $table->text('location')->nullable();
            $table->text('auth_guards')->nullable();
            $table->text('army')->nullable();
            $table->text('ssg')->nullable();
            $table->text('civil')->nullable(); 
            $table->text('absente')->nullable();
            $table->text('leave')->nullable();
            $table->text('reason')->nullable();
            $table->text('r_provided')->nullable(); 
            $table->date('last_comp_date')->nullable();
            $table->text('any_inc')->nullable();
            $table->text('pending_nadra')->nullable();
            $table->text('unsent_dpo_rep')->nullable();
            $table->text('no_of_resigns')->nullable();
            $table->text('guards_wout_bank')->nullable(); 
            $table->text('any_new_site')->nullable();
            $table->text('no_of_guards')->nullable();
            $table->text('escort_duties')->nullable();
            $table->text('event_details')->nullable();
            $table->text('pending_recoveries')->nullable(); 
            $table->text('sign_manager')->nullable();
            $table->text('staff_on_leav')->nullable();
            $table->text('short_leav')->nullable();
            $table->text('utility_bills')->nullable();
            $table->text('bio_matric')->nullable();
            $table->text('bio_register')->nullable();
            $table->text('office_rent')->nullable(); 
            $table->text('ups')->nullable();
            $table->text('guard_file')->nullable();
            $table->text('guard_accomodation')->nullable();
            $table->text('any_maintainence')->nullable();
            $table->text('weapon_register')->nullable();
            $table->text('cctv')->nullable();
            $table->text('attendance_register')->nullable();
            $table->text('kote_register')->nullable();
            $table->timestamps();
            
            $table->foreign('admins_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dialy_branch_reports');
    }
};
