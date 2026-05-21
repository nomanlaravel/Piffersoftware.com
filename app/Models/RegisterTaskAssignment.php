<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterTaskAssignment extends Model
{
    protected $table = 'register_task_assignments';

    protected $fillable = [
        'register_task_id',
        'assigned_date',
    ];
}