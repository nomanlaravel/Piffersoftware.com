<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationShared extends Model
{
    use HasFactory;

    protected $fillable = [
        'notification_shared_name',
    ];
}
