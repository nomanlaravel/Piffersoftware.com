<?php

namespace App\Models;

use App\Models\Training;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingWeapon extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_of_weapon',
        'weapon_no',
        'caliber',
        'bore',
        'weapon_price_pu',
        'weapon_total_price',
        'weapon_quantity',
        'person_responsible_weapon',
        'weapon_attach',
        'weapon_notes',
    ];

    public function training()
    {
        return $this->belongsTo(Training::class, 'trainings_id');
    }
}
