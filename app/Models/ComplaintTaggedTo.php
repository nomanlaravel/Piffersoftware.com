<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintTaggedTo extends Model
{
    use HasFactory;

    protected $fillable = [
        'tagged_to_name',
    ];
}
