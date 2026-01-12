<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkedby extends Model
{
    protected $table = 'checkedby';
    use HasFactory;

    protected $fillable = [
        'checkedby_name',
    ];
}
