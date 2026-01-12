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
        Schema::create('chambers', function (Blueprint $table) {
            $table->id();
            $table->text('chamber_regulatory_id')->nullable();
            $table->text('chamber_type')->nullable();
            $table->text('chamber_jurisdication')->nullable();
            $table->text('chamber_membership_no')->nullable();
            $table->text('chamber_serial_no')->nullable();
            $table->text('chamber_book_no')->nullable();
            $table->text('chamber_membership_type')->nullable();
            $table->date('chamber_member_since')->nullable();
            $table->text('chamber_latest_certification')->nullable();
            $table->date('chamber_validity_from')->nullable();
            $table->date('chamber_expiry_date')->nullable();
            $table->text('chamber_person')->nullable();
            $table->text('chamber_membership_front')->nullable();
            $table->text('chamber_membership_back')->nullable();
            $table->longText('chamber_notes')->nullable();
            $table->text('chamber_attachments')->nullable();
            //Address Details
            $table->text('chamber_a_office')->nullable();
            $table->text('chamber_a_build')->nullable();
            $table->text('chamber_a_block')->nullable();
            $table->text('chamber_a_area')->nullable();
            $table->text('chamber_a_city')->nullable();
            $table->text('chamber_a_photo')->nullable();
            $table->text('chamber_a_email')->nullable();
            $table->text('chamber_a_website')->nullable();
            $table->text('chamber_a_pin')->nullable();
            $table->text('chamber_a_gps')->nullable();
            $table->LongText('chamber_a_notes')->nullable();
            $table->text('chamber_a_attach')->nullable();
            //Renewals Application
            $table->date('chamber_application_date')->nullable();
            $table->text('chamber_application_letter')->nullable();
            $table->LongText('chamber_application_notes')->nullable();
            $table->text('chamber_application_attach')->nullable();
            //Correspondence
            $table->date('chamber_corespondence_date')->nullable();
            $table->text('chamber_corespondence_letter')->nullable();
            $table->LongText('chamber_corespondence_notes')->nullable();
            $table->text('chamber_corespondence_attach')->nullable();
            //Approval
            $table->date('chamber_approval_date')->nullable();
            $table->text('chamber_approval_letter')->nullable();
            $table->LongText('chamber_approval_notes')->nullable();
            $table->text('chamber_approval_attach')->nullable();
            //Laws
            $table->LongText('chamber_laws_notes')->nullable();
            $table->text('chamber_laws_attach')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chambers');
    }
};
