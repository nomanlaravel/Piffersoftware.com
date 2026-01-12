<?php

namespace App\Models;

use App\Models\Regulator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegWeaponLegal extends Model
{
    use HasFactory;

    protected $fillable = [
        'wep_legal_bank',
        'wep_legal_cheque',
        'wep_legal_copy',
        'wep_legal_amount',
        'wep_legal_notes',
        'wep_legal_attach',
        'wep_legal_wb_name',
        'wep_legal_wb_id',
        'wep_legal_wb_desig',
        'wep_legal_wb_cell',
        'wep_legal_wb_email',
        'wep_legal_wb_notes',
        'wep_legal_wb_attach',
        'wep_legal_fee_a',
        'wep_legal_fee_b',
        'wep_legal_fee_t',
        'wep_legal_fee_date',
        'wep_legal_fee_bank',
        'wep_legal_fee_ins',
        'wep_legal_fee_slip',
        'wep_legal_fee_notes',
        'wep_legal_fee_attach',
        'wep_legal_db_name',
        'wep_legal_db_id',
        'wep_legal_db_desig',
        'wep_legal_db_cell',
        'wep_legal_db_email',
        'wep_legal_db_notes',
        'wep_legal_db_attach',
    ];

    public function regulator()
    {
        return $this->belongsTo(Regulator::class, 'regulators_id');
    }
}
