<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requirementconsultancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultancy_category',
        'scope_of_work',
        'internal_deadline',
        'consultancy_date_of_submission',
        'consultancy_notes',
        'consultancy_attach',
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirements_id');
    }
}
