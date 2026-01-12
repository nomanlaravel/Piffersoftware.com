<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requirementjet extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_of_days_private_jet',
        'fuel_for_private_jet',
        'rate_of_fuel_for_jet',
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirements_id');
    }
}
