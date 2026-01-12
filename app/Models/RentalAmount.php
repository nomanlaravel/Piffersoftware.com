<?php

namespace App\Models;

use App\Models\Rental;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalAmount extends Model
{
    use HasFactory;

    protected $fillable = [
        'rental_amount',
        'agreement_execution_date',
        'agreement_end_date',
        'agreement_attachment',
    ];

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }

}
