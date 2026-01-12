<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emerser extends Model
{
    protected $table = 'emerser';
    use HasFactory;

    protected $fillable = [
        'emerser_name',
    ];
}
