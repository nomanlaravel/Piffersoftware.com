<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirementguard extends Model
{
    use HasFactory;

    protected $fillable = [
        'guard_category',
        'guard_quantity',
        'guard_shift_timing',
        'guard_food',
        'guard_accomodation',
        'guard_transportation',
        'guard_required_monthly',
        'guard_required_dialy',
        'no_of_days_guard_required',
        'financial_working_excel_attach',
        'financial_working_word_attach',
        'financial_working_pdf_attach',
        'guard_notes',
        'guard_attach',
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirements_id');
    }
}
