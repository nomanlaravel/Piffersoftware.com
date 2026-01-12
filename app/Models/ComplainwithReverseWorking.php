<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplainwithReverseWorking extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'requirement_id',
        'reverseCategory',
        'reverseapplicablepercentageGst',
        'reverseAfterWht',
        'reverseSalary',
        'reverseTotalProfit',
        'reverseapplicablewhtpercent',
        'reverseRate',
        'reverseGst',
        'reverseProfit',
        'reverseWht',
        'reverseAfterGst',
        'reverseQuantity',
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class);
    }
}
