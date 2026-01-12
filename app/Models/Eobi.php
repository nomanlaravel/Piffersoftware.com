<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eobi extends Model
{
    use HasFactory;

    protected $fillable = [
        'eobi_city',
    ];
}
