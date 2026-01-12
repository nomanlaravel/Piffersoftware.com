<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duties extends Model
{
    use HasFactory;

     protected $fillable = [
        'duty_name',
    ];
}
