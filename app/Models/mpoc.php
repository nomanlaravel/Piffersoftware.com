<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mpoc extends Model
{
    protected $table = 'mpoc';
    use HasFactory;

    protected $fillable = [
        'mpoc_name',
    ];
}