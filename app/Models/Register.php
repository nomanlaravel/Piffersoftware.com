<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $fillable = [
        'register_name',
    ];

    public function taskGroup()
    {
        return $this->belongsTo(TaskGroup::class, 'task_group_id');
    }
}