<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirementaddress extends Model
{
    use HasFactory;

    protected $fillable = [
       'office_no',
        'floor',
        'building',
        'block',
        'area',
        'city',
        'builidng_attach',
        'pin_location',
        'company',
        'email',
        'website',
        'attachments',
        'notes',
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirements_id');
    }
}
