<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requirementalarm extends Model
{
    use HasFactory;

    protected $fillable = [
        'alarm_category',
        'alarm_equipment',
        'alarm_voltage',
        'alarm_ampere',
        'alarm_article_no',
        'alarm_model',
        'alarm_year',
        'alarm_expiry',
        'alarm_warranty',
        'alarm_color',
        'alarm_quantity',
        'alarm_scope',
        'alarm_ins',
        'alarm_drawings',
        'alarm_pictures',
        'alarm_cost',
        'alarm_charges',
        'alarm_ins_cost',
        'alarm_length',
        'alarm_width',
        'alarm_height',
        'alarm_thickness',
        'alarm_diameter',
        'alarm_ins_smoke',
        'alarm_ins_cost_smoke',
        'alarm_internal_shifting',
        'alarm_internal_shifting_charges',
        'alarm_reinstall',
        'alarm_reinstall_charges',
        'alarm_qrf',
        'alarm_qrf_monthly_charges',
        'alarm_qrf_yearly_charges',
        'alarm_police_req',
        'alarm_police_monthly_charges',
        'alarm_police_yearly_charges',
        'alarm_visit_charges',
        'alarm_visit_city',
        'alarm_notes',
        'alarm_attachments',
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirements_id');
    }
}
