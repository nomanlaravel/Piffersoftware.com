<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicalType extends Model
{
    use HasFactory;

    protected $fillable = ['v_type_name'];
}
