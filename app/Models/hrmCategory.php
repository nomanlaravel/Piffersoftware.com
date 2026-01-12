<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hrmCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'hrmcategory_name',
    ];
}
