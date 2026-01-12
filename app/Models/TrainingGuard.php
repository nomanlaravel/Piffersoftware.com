<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingGuard extends Model
{
    use HasFactory;
    protected $table = 'training_guard';

    protected $fillable = [
        'training_id',
        'guard_id',
    ];

    public $timestamps = false;

     public function guardtrains()
    {
        return $this->belongsTo(Hrm::class, 'guard_id');
    }
    public function training()
        {
            return $this->belongsTo(Training::class);
        }



}
