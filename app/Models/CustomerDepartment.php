<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDepartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'dept_type',
        'dept_name',
        'dept_email',
        'dept_cell',
        'dept_address',
        'dept_desig',
        'dept_front',
        'dept_back',
        'dept_notes',
        'dept_attach',
        'dept_office',
        'dept_floor',
        'dept_build',
        'dept_block',
        'dept_area',
        'dept_city',
        'dept_photo',
        'dept_pin',
        'dept_gps',
        'dept_ex_notes',
        'dept_ex_attach',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id');
    }
}
