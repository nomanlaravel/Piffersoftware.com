<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterTaskGroup extends Model
{
    protected $table = 'task_groups'; // same table use karega
    
    protected $fillable = ['title', 'section_number'];

    public function registerTasks()
    {
        return $this->hasMany(RegisterTask::class, 'group_id');
    }
}