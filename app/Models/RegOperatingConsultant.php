<?php

namespace App\Models;

use App\Models\Regulator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegOperatingConsultant extends Model
{
    use HasFactory;

    protected $fillable = [
        'oper_name',
        'oper_desig',
        'oper_org',
        'oper_cell',
        'oper_email',
        'oper_fee',
        'oper_front',
        'oper_back',
        'oper_bank',
        'oper_account',
        'oper_acc_no',
        'oper_fin',
        'oper_notes',
        'oper_attachments',
        'oper_office',
        'oper_build',
        'oper_block',
        'oper_area',
        'oper_city',
        'oper_photo',
        'oper_a_email',
        'oper_web',
        'oper_pin',
        'oper_gps',
        'oper_ex_notes',
        'oper_ex_attach',
    ];

    public function regulator()
    {
        return $this->belongsTo(Regulator::class, 'regulators_id');
    }

}
