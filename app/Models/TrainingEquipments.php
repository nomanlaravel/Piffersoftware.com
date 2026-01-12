<?php

namespace App\Models;

use App\Models\Training;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingEquipments extends Model
{
    use HasFactory;

    protected $fillable = [
        'sec_equip_category',
        'sec_equip_type',
        'sec_equip_pricepu',
        'sec_equip_quantity',
        'sec_equip_totalprice',
        'person_responsible_sec_equip',
        'sec_equip_attach',
        'sec_equip_notes',
        'red_flag_quantity',
        'target_quantity',
    ];

    public function training()
    {
        return $this->belongsTo(Training::class, 'trainings_id');
    }
}
