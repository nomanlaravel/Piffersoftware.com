<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class OfficeInventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'quantity',
        'notes',
        'attachments',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admins_id');
    }
}
