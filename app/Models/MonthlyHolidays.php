<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MonthlyHolidays extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'user_id', 'year', 'month', 'date', 'is_paid', 'type'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
