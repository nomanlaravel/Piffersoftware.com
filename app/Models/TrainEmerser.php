<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainEmerser extends Model
{
    protected $table = 'train_emerser';
    use HasFactory;
    protected $fillable = [
        'train_emerser_name',
    ];
}
