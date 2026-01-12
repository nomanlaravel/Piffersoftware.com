<?php

namespace App\Models;

use App\Models\Regulator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegOtherRenewals extends Model
{
    use HasFactory;

    protected $fillable = [
        'other_fee_category',
        'other_finance_bank',
        'other_finance_cheque',
        'other_finance_copy',
        'other_finance_amount',
        'other_finance_notes',
        'other_finance_attach',
        'other_finance_wb_name',
        'other_finance_wb_id',
        'other_finance_wb_desig',
        'other_finance_wb_cell',
        'other_finance_wb_email',
        'other_finance_wb_notes',
        'other_finance_wb_attach',
        'other_finance_fee',
        'other_finance_fee_date',
        'other_finance_fee_bank',
        'other_finance_fee_ins',
        'other_finance_slip_attach',
        'other_finance_fee_notes',
        'other_finance_fee_attach',
        'other_finance_db_name',
        'other_finance_db_id',
        'other_finance_db_desig',
        'other_finance_db_cell',
        'other_finance_db_email',
        'other_finance_db_notes',
        'other_finance_db_attach',
    ];

    public function regulator()
    {
        return $this->belongsTo(Regulator::class, 'regulators_id');
    }
}
