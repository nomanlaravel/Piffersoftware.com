<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintAddressedBy extends Model
{
    use HasFactory;

    protected $fillable = [
        'addressed_by_name',
    ];
}
