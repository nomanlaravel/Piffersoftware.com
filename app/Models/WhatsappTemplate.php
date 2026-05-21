<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatsappTemplate extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'label', 'status', 'description'];

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }
}
