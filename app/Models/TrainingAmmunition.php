<?php

namespace App\Models;

use App\Models\Training;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingAmmunition extends Model
{
    use HasFactory;

    protected $fillable = [
        'ammu_quantity',
        'ammu_type',
        'person_responsible_ammu',
        'price_per_unit_ammu',
        'total_price_ammu',
        'ammu_attach',
        'ammu_notes',
    ];

    public function training()
    {
        return $this->belongsTo(Training::class, 'trainings_id');
    }
}
