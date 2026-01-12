<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrancheportingTo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'reporting_branch_name',
    ];
}
