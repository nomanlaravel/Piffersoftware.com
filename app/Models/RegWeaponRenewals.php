<?php

namespace App\Models;

use App\Models\Regulator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegWeaponRenewals extends Model
{
    use HasFactory;

    protected $fillable = [
        'wep_fee_category',
        'wep_finance_bank',
        'wep_finance_cheque',
        'wep_finance_copy',
        'wep_finance_amount',
        'wep_finance_notes',
        'wep_finance_attach',
        'wep_finance_wb_name',
        'wep_finance_wb_id',
        'wep_finance_wb_desig',
        'wep_finance_wb_cell',
        'wep_finance_wb_email',
        'wep_finance_wb_notes',
        'wep_finance_wb_attach',
        'wep_finance_fee',
        'wep_finance_fee_date',
        'wep_finance_fee_bank',
        'wep_finance_fee_ins',
        'wep_finance_slip_attach',
        'wep_finance_fee_notes',
        'wep_finance_fee_attach',
        'wep_finance_db_name',
        'wep_finance_db_id',
        'wep_finance_db_desig',
        'wep_finance_db_cell',
        'wep_finance_db_email',
        'wep_finance_db_notes',
        'wep_finance_db_attach',
    ];

    public function regulator()
    {
        return $this->belongsTo(Regulator::class, 'regulators_id');
    }
}
