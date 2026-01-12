<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerIncident extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'client_id',
        'client_site_id',
        'client_poc',
        'client_cell',
        'client_email',
        'client_site_address',
        'client_office',
        'client_build',
        'client_street',
        'client_area',
        'client_city',
        'client_fir',
        'arrest',
        'casual',
        'injuired',
        'incident_rep',
        'police_officer_name',
        'station',
        'rank',
        'report_made_by',
        'report_date',
        'report_time',
        'report_apr_by',
        'report_shared',
        'incident_type',
        'weapon_used',
        'detail_of_attacker',
        'attacker_desc',
        'attacker_shoe',
        'attacker_beard',
        'attacker_lang',
        'focused',
        'opening_phrase',
        'any_usual',
        'estimated_loss',
        'desc_loss',
        'officer_response',
        'incident_attach',
        'incident_note',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id');
    }
}
