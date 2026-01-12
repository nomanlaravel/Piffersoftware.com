<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardpost extends Model
{
    use HasFactory;

    protected $fillable = [
        'guard_post',
    ];
}
