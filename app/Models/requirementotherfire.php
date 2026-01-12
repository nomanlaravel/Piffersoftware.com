<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requirementotherfire extends Model
{
    use HasFactory;

    protected $fillable = [
        'other_fire_category',
        'other_equip_name',
        'other_article_no',
        'other_model',
        'other_year_of_manufacture',
        'other_expiry_date',
        'other_warranty_period',
        'other_color',
        'other_quantity',
        'other_specifications',
        'other_scope_of_work',
        'other_instruction',
        'other_picture_of_building',
        'other_complete_cost',
        'other_delivery_charges',
        'other_installtion_cost',
        'other_fire_notes',
        'other_fire_attachment',
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirements_id');
    }
}
