<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requirementbarrier extends Model
{
    use HasFactory;
    protected $fillable = [
        'barrier_ownership',
        'barrier_rental',
        'barrier_no_of_days',
        'barrier_model',
        'barrier_brand',
        'barrier_specifications',
        'barrier_quantity',
        'barrier_unit',
        'barrier_price',
        'detector_model',
        'detector_brand',
        'detector_specifications',
        'detector_quantity',
        'detector_unit',
        'detector_price',
        'traffic_model',
        'traffic_brand',
        'traffic_specifications',
        'traffic_quantity',
        'traffic_unit',
        'traffic_price',
        'coupler_model',
        'coupler_brand',
        'coupler_specification',
        'coupler_quantity',
        'coupler_unit',
        'coupler_price',
        'tag_model',
        'tag_brand',
        'tag_specifications',
        'tag_quantity',
        'tag_unit',
        'tag_price',
        'Etag_model',
        'Etag_brand',
        'Etag_specifications',
        'Etag_quantity',
        'Etag_unit',
        'Etag_price',
        'pole_model',
        'pole_brand',
        'pole_specifications',
        'pole_quantity',
        'pole_unit',
        'pole_price',
        'breaker_model',
        'breaker_brand',
        'breaker_specifications',
        'breaker_quantity',
        'breaker_unit',
        'breaker_price',
        'barrier_installation',
        'barrier_training',
        'barrier_upload_training',
        'barrier_delivery',
        'barrier_del_loc',
        'barrier_office_no',
        'barrier_floor',
        'barrier_building',
        'barrier_block',
        'barrier_area',
        'barrier_city',
        'barrier_photo_building',
        'barrier_pin_loc',
        'barrier_ins_loc',
        'barrier_ins_office',
        'barrier_ins_floor',
        'barrier_ins_building',
        'barrier_ins_block',
        'barrier_ins_area',
        'barrier_ins_city',
        'barrier_ins_photo_building',
        'barrier_ins_pin_loc',
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirements_id');
    }
}
