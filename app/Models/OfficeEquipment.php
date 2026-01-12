<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeEquipment extends Model
{
    use HasFactory;
    
    protected $fillable = ['adminequipment_name'];
}
