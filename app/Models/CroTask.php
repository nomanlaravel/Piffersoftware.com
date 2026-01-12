<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CroTask extends Model
{
    use HasFactory;
       protected $fillable = [
        'task_group_id',
        'task_number',
        'task_description',
    ];
      public function group()
    {
        return $this->belongsTo(TaskGroup::class, 'task_group_id');
    }

    public function assignments()
    {
        return $this->hasMany(TaskAssignment::class);
    }

}
