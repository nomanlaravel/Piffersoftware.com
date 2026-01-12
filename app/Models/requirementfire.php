<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requirementfire extends Model
{
    use HasFactory;

    protected $fillable = [
        'fireClass',
        'waterCylinder',
        'dryChemical',
        'CoTwo',
        'foam',
        'wetChemical',
        'dryChemicalAbe',
        'dryChemicalBe',
        'Co2',
        'foam2',
        'dryChemicalPowderABE',
        'dryChemicalPowderBE',
        'dryChemicalPowderABE1',
        'dryChemicalPowderBE1',
        'dryChemicalPowderABE2',
        'dryChemicalPowderBE2',
        'cd2',
        'dryChemicalPowderBE3',
        'foam3',
        'wetChemical2',
        'fire_equipment_name',
        'fire_cylinder_type',
        'fire_article_no',
        'fire_model',
        'fire_year_of_manufacturing',
        'fire_expiry_date',
        'fire_warranty_period',
        'fire_color',
        'fire_quantity',
        'fire_specifications',
        'fire_notes',
        'fire_attach',
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirements_id');
    }
}
