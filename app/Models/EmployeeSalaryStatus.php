<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSalaryStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'time_period',
        'last_increment',
        'last_increment_amount',
        'next_increment',
        'increment_amount',
        'before_increment',
        'salary_start',
        'status',
        'can_view',
        'employee_id',
        'user_id'
    ];

    public function employee()
    {
        return $this->belongsTo(Hrm::class, 'employee_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
