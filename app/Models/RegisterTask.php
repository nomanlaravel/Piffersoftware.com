<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterTask extends Model
{
    protected $fillable = [
        'register_id',
        'group_id',
        'task_number',
        'task_description',
    ];

  public function group()
{
    return $this->belongsTo(RegisterGroup::class, 'group_id');
}

    public function register()
    {
        return $this->belongsTo(Register::class);
    }

   public function assignments()
{
    return $this->hasMany(RegisterTaskAssignment::class, 'register_task_id');
}
}