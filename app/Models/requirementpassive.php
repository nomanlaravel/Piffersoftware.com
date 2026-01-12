<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requirementpassive extends Model
{
    use HasFactory;
    protected $fillable = [
        'passive_category',
        'passive_dimension',
        'passive_width',
        'passive_height',
        'passive_depth',
        'passive_quantity',
        'passive_material',
        'passive_equipment',
        'passive_article',
        'passive_model',
        'passive_year_of_manufacture',
        'passive_expiry',
        'passive_warranty',
        'passive_color',
        'passive_quantity',
        'passive_scope_of_work',
        'passive_instruction',
        'passive_building_picture',
        'passive_complete_cost',
        'passive_delivery_charges',
        'passive_cost',
        'passive_drawings',
        'passive_pictures',
        'passive_complete_equip_charges',
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirements_id');
    }
}
