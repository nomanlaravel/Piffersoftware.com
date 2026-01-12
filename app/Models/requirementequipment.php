<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requirementequipment extends Model
{
    use HasFactory;
    protected $fillable = [
        'equipment_category',
        'equipment_ownership',
        'equipment_rental',
        'equipment_no_of_days',
        'equipment_quality',
        'equipment_training',
        'equipment_delivery',
        'equipment_dilevery_loc',
        'equipment_del_office_no',
        'equipment_del_floor',
        'equipment_del_building',
        'equipment_del_block',
        'equipment_del_area',
        'equipment_del_city',
        'equipment_del_photo_building',
        'equipment_del_pin_loc',
        'equipment_installation_req',
        'equipment_ins_loc',
        'equipment_ins_office_no',
        'equipment_ins_floor',
        'equipment_ins_building',
        'equipment_ins_block',
        'equipment_ins_area',
        'equipment_ins_city',
        'equipment_ins_photo_building',
        'equipment_ins_pin_location',
        'equipment_notes',
        'equipment_attachment',
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirements_id');
    }
}
