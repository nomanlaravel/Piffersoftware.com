<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class AdminNotification extends Model
{
    use HasFactory;

    protected $fillable = [
        'notification_no',
        'notification_related',
        'notification_notes',
        'notification_attach',
        'notification_to',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admins_id');
    }
}
