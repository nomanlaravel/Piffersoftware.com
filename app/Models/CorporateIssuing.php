<?php

namespace App\Models;

use App\Models\Corporate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporateIssuing extends Model
{
    use HasFactory;

    protected $fillable = [
        'i_name',
        'i_desig',
        'i_ptcl',
        'i_cell',
        'i_email',
        'i_website',
        'i_front',
        'i_back',
        'i_notes',
        'i_attach',
    ];


    public function corporates()
    {
        return $this->belongsTo(Corporate::class, 'corporates_id');
    }
}
