<?php

namespace App\Models;

use App\Models\CorporateConsultant;
use App\Models\CorporateIssuing;
use App\Models\CorporateRenewals;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corporate extends Model
{
    use HasFactory;

    protected $fillable = [
        'corporate_activation',
        'regulatory_id',
        'name_of_certification',
        'registration_no',
        'certification_no',
        'initial_reg_date',
        'latest_certification',
        'validity_from',
        'expiry_date',
        'notes',
        'attachments',
        'a_office',
        'a_build',
        'a_block',
        'a_area',
        'a_city',
        'a_photo',
        'a_email',
        'a_website',
        'a_pin',
        'a_gps',
        'a_notes',
        'a_attach',
        'application_date',
        'application_letter',
        'application_notes',
        'application_attach',
        'corespondence_date',
        'corespondence_letter',
        'corespondence_notes',
        'corespondence_attach',
        'approval_date',
        'approval_letter',
        'approval_notes',
        'approval_attach',
        'laws_notes',
        'laws_attach',
    ];


    public function corporateconsultants()
    {
        return $this->hasMany(CorporateConsultant::class, 'corporates_id');
    }

    public function corporateissuings()
    {
        return $this->hasMany(CorporateIssuing::class, 'corporates_id');
    }

    public function corporaterenewals()
    {
        return $this->hasMany(CorporateRenewals::class, 'corporates_id');
    }
}
