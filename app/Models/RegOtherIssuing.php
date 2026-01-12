<?php

namespace App\Models;

use App\Models\Regulator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegOtherIssuing extends Model
{
    use HasFactory;

    protected $fillable = [
        'other_iss_co_name',
        'other_iss_co_desig',
        'other_iss_co_dept',
        'other_iss_co_section',
        'other_iss_co_ptcl',
        'other_iss_co_cell',
        'other_iss_co_email',
        'other_iss_co_web',
        'other_iss_co_front',
        'other_iss_co_back',
        'other_iss_co_notes',
        'other_iss_co_attach',
    ];

    public function regulator()
    {
        return $this->belongsTo(Regulator::class, 'regulators_id');
    }
}
