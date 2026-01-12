<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CctvBrand extends Model
{
    use HasFactory;
    protected $fillable = [
        'cb_name',
    ];
}
