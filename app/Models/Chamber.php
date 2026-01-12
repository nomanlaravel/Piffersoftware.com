<?php

namespace App\Models;

use App\Models\ChamberConsultant;
use App\Models\ChamberIssuing;
use App\Models\ChamberRenewals;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chamber extends Model
{
    use HasFactory;

    protected $fillable = [
        'chamber_activation',
        'chamber_regulatory_id',
        'chamber_type',
        'chamber_jurisdication',
        'chamber_membership_no',
        'chamber_serial_no',
        'chamber_book_no',
        'chamber_membership_type',
        'chamber_member_since',
        'chamber_latest_certification',
        'chamber_validity_from',
        'chamber_expiry_date',
        'chamber_person',
        'chamber_membership_front',
        'chamber_membership_back',
        'chamber_notes',
        'chamber_attachments',
        'chamber_a_office',
        'chamber_a_build',
        'chamber_a_block',
        'chamber_a_area',
        'chamber_a_city',
        'chamber_a_photo',
        'chamber_a_email',
        'chamber_a_website',
        'chamber_a_pin',
        'chamber_a_gps',
        'chamber_a_notes',
        'chamber_a_attach',
        'chamber_application_date',
        'chamber_application_letter',
        'chamber_application_notes',
        'chamber_application_attach',
        'chamber_corespondence_date',
        'chamber_corespondence_letter',
        'chamber_corespondence_notes',
        'chamber_corespondence_attach',
        'chamber_approval_date',
        'chamber_approval_letter',
        'chamber_approval_notes',
        'chamber_approval_attach',
        'chamber_laws_notes',
        'chamber_laws_attach',
    ];

    public function chamberconsultants()
    {
        return $this->hasMany(ChamberConsultant::class, 'chambers_id');
    }

    public function chamberissuings()
    {
        return $this->hasMany(ChamberIssuing::class, 'chambers_id');
    }

    public function chamberrenewals()
    {
        return $this->hasMany(ChamberRenewals::class, 'chambers_id');
    }
}
