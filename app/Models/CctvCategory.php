<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CctvCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'cc_name',
    ];
}
