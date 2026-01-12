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
        Schema::create('corporates', function (Blueprint $table) {
            $table->id();
            //Mandatory Details
            $table->text('regulatory_id')->nullable();
            $table->text('name_of_certification')->nullable();
            $table->text('registration_no')->nullable();
            $table->text('certification_no')->nullable();
            $table->date('initial_reg_date')->nullable();
            $table->text('latest_certification')->nullable();
            $table->date('validity_from')->nullable();
            $table->date('expiry_date')->nullable();
            $table->Longtext('notes')->nullable();
            $table->text('attachments')->nullable();
            //Address Details
            $table->text('a_office')->nullable();
            $table->text('a_build')->nullable();
            $table->text('a_block')->nullable();
            $table->text('a_area')->nullable();
            $table->text('a_city')->nullable();
            $table->text('a_photo')->nullable();
            $table->text('a_email')->nullable();
            $table->text('a_website')->nullable();
            $table->text('a_pin')->nullable();
            $table->text('a_gps')->nullable();
            $table->LongText('a_notes')->nullable();
            $table->text('a_attach')->nullable();
            //Renewals Application
            $table->date('application_date')->nullable();
            $table->text('application_letter')->nullable();
            $table->LongText('application_notes')->nullable();
            $table->text('application_attach')->nullable();
            //Correspondence
            $table->date('corespondence_date')->nullable();
            $table->text('corespondence_letter')->nullable();
            $table->LongText('corespondence_notes')->nullable();
            $table->text('corespondence_attach')->nullable();
            //Approval
            $table->date('approval_date')->nullable();
            $table->text('approval_letter')->nullable();
            $table->LongText('approval_notes')->nullable();
            $table->text('approval_attach')->nullable();
            //Laws
            $table->LongText('laws_notes')->nullable();
            $table->text('laws_attach')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corporates');
    }
};
