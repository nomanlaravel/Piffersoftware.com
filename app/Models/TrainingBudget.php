<?php

namespace App\Models;

use App\Models\Training;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingBudget extends Model
{
    use HasFactory;

    protected $fillable = [
        'out_of_scope',
        'budget_category',
        'mode_of_payment',
        'budget_ins_no',
        'name_of_bank',
        'date_of_payment',
        'amount_per_unit',
        'quantity',
        'total_amount',
        'cheque_attach',
        'voucher_attach',
        
    ];

    public function training()
    {
        return $this->belongsTo(Training::class, 'trainings_id');
    }
}
