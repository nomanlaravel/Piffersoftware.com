<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HiredAt extends Model
{
    use HasFactory;

    protected $fillable = ['hiredat_name'];
}
