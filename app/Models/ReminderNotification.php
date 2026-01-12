<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReminderNotification extends Model
{
    use HasFactory;
        protected $table = 'remindersnotification';
      protected $fillable = [
        'user_id',
        'entity_type',
        'entity_id',
        'title',
        'message',
        'is_read',
    ];
}
