<?php

namespace App\Models;

use App\Models\Training;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingArmourer extends Model
{
    use HasFactory;

    protected $fillable = [
        'armourer_name',
        'armourer_cell',
        'armourer_attach',
        'armourer_notes',
    ];

    public function training()
    {
        return $this->belongsTo(Training::class, 'trainings_id');
    }
}
