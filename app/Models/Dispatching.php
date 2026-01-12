<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispatching extends Model
{
    use HasFactory;
     protected $fillable = ['dispatch_name'];
}
