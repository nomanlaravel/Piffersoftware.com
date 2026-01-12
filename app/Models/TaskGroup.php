<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskGroup extends Model
{
    use HasFactory;
     protected $fillable = [
        'title',
        'section_number',
    ];

    public function tasks()
    {
        return $this->hasMany(CroTask::class);
    }
}
