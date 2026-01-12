<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporateRenewals extends Model
{
    use HasFactory;

    protected $fillable = [
        'fee_category',
        'wf_bank_name',
        'wf_cheque',
        'wf_cheque_attach',
        'wf_amount',
        'wf_notes',
        'wf_attach',
        'wb_name',
        'wb_id',
        'wb_desig',
        'wb_cell',
        'wb_email',
        'wb_notes',
        'wb_attach',
        'fee',
        'fee_date',
        'fee_bank',
        'fee_ins',
        'fee_slip',
        'fee_notes',
        'fee_attach',
        'db_name',
        'db_id',
        'db_desig',
        'db_cell',
        'db_email',
        'db_notes',
        'db_attach',
    ];


    public function corporates()
    {
        return $this->belongsTo(Corporate::class, 'corporates_id');
    }
}
