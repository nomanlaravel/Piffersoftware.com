<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'hrm_id',
        'date',
        'check_in',
        'check_out',
        'status',
        'total_hours',
        'notes',
    ];

    public function hrm()
    {
        return $this->belongsTo(Hrm::class);
    }
}
