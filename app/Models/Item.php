<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
     protected $fillable = [
        'payroll_id',
        'name',
        'item_dis'
    ];

public function payroll()
{
    return $this->belongsTo(Payroll::class, 'payroll_id');
}
}
