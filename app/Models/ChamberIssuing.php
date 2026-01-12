<?php

namespace App\Models;


use App\Models\Chamber;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChamberIssuing extends Model
{
    use HasFactory;

    protected $fillable = [
        'cofficer_name',
        'cofficer_desig',
        'cofficer_ptcl',
        'cofficer_cell',
        'cofficer_email',
        'cofficer_website',
        'cofficer_front',
        'cofficer_back',
        'cofficer_notes',
        'cofficer_attach',
        'sj_name',
        'sj_desig',
        'sj_ptcl',
        'sj_cell',
        'sj_email',
        'sj_web',
        'sj_front',
        'sj_back',
        'sj_notes',
        'sj_attach',
    ];

    public function chambers()
    {
        return $this->belongsTo(Chamber::class, 'chambers_id');
    }
}
