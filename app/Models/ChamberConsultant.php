<?php

namespace App\Models;

use App\Models\Chamber;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChamberConsultant extends Model
{
    use HasFactory;

    protected $fillable = [
        'c_name',
        'c_desig',
        'c_org',
        'c_cell',
        'c_email',
        'c_fee',
        'c_bank',
        'c_acc',
        'c_acc_num',
        'c_cheque',
        'c_notes',
        'c_attach',
        'c_office',
        'c_building',
        'c_block',
        'c_area',
        'c_city',
        'c_loc',
        'c_a_email',
        'c_website',
        'c_pin',
        'c_map',
        'c_ex_notes',
        'c_ex_attach',
    ];


    public function chambers()
    {
        return $this->belongsTo(Chamber::class, 'chambers_id');
    }
}
