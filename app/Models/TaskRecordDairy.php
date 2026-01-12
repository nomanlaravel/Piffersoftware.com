<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskRecordDairy extends Model
{
    use HasFactory;
    protected $table = 'task_record_dairies';
    protected $fillable = [
        'sr_no',
        'description_task',
        'dependence_department_organization',
        'task_assigned_by',
        'review_date',
        'completion_date',
        'signature'
    ];

}
