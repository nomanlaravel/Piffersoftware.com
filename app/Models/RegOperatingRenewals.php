<?php

namespace App\Models;

use App\Models\Regulator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegOperatingRenewals extends Model
{
    use HasFactory;

    protected $fillable = [
        'oper_fee_category',
        'oper_finance_bank',
        'oper_finance_cheque',
        'oper_finance_copy',
        'oper_finance_amount',
        'oper_finance_notes',
        'oper_finance_attach',
        'oper_finance_wb_name',
        'oper_finance_wb_id',
        'oper_finance_wb_desig',
        'oper_finance_wb_cell',
        'oper_finance_wb_email',
        'oper_finance_wb_notes',
        'oper_finance_wb_attach',
        'oper_finance_fee',
        'oper_finance_fee_date',
        'oper_finance_fee_bank',
        'oper_finance_fee_ins',
        'oper_finance_slip_attach',
        'oper_finance_fee_notes',
        'oper_finance_fee_attach',
        'oper_finance_db_name',
        'oper_finance_db_id',
        'oper_finance_db_desig',
        'oper_finance_db_cell',
        'oper_finance_db_email',
        'oper_finance_db_notes',
        'oper_finance_db_attach',
    ];

    public function regulator()
    {
        return $this->belongsTo(Regulator::class, 'regulators_id');
    }
}
