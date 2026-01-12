<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requirementcctv extends Model
{
    use HasFactory;
    protected $fillable = [
        'cctv_category',
        'cctv_brand',
        'cctv_model',
        'cctv_year_of_manu',
        'cctv_pixels',
        'cctv_night_vision',
        'cctv_type',
        'cctv_backup',
        'cctv_nvr',
        'cctv_powercable',
        'cctv_poe',
        'cctv_quantity',
        'cctv_monthly_cost',
        'cctv_req_on',
        'cctv_no_of_days',
        'cctv_del_loc',
        'cctv_del_office',
        'cctv_del_floor',
        'cctv_del_building',
        'cctv_del_block',
        'cctv_del_area',
        'cctv_del_city',
        'cctv_del_photo_building',
        'cctv_ins_loc',
        'cctv_ins_office',
        'cctv_ins_floor',
        'cctv_ins_building',
        'cctv_ins_block',
        'cctv_ins_area',
        'cctv_ins_city',
        'cctv_ins_photo_building',
        'cctv_ins_pin_location',
        'cctv_maintenance_req',
        'cctv_maintenance_req_basis',
        'cctv_notes',
        'cctv_attachments',
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirements_id');
    }
}
