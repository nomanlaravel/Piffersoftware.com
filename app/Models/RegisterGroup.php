<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterGroup extends Model
{
    protected $table = 'register_groups';

    protected $fillable = ['register_id', 'title', 'section_number'];

    public function registerTasks()
    {
        return $this->hasMany(RegisterTask::class, 'group_id');
    }
}