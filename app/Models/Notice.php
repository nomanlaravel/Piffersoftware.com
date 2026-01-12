<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;
    protected $fillable = [
    'regulator_name',
    'notice_date',
    'notice_received_on',
    'reporting_date',
    'concern_department',
    'notice_entered',
    'reported_to_cro',
    'notice_description',
];
}
