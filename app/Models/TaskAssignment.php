<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskAssignment extends Model
{
    use HasFactory;
     protected $fillable = [
        'cro_task_id',
        'branch_id',
        'assigned_date',
        'is_assigned',
    ];

    public function task()
    {
        return $this->belongsTo(CroTask::class, 'cro_task_id');
    }

    public function branch()
    {
        return $this->belongsTo(Admin::class, 'branch_id', 'branch_id');
    }
}
