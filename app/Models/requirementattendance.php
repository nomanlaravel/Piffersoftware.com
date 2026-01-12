<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requirementattendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'attendance_category',
        'attendance_rate',
        'attendance_sheet',
        'attendance_specifications',
        'attendance_notes',
        'attendance_attachment',
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirements_id');
    }
}
