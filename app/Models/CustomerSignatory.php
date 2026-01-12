<?php

namespace App\Models;


use App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSignatory extends Model
{
    use HasFactory;

    protected $fillable = [
        'sign_name',
        'sign_desig',
        'sign_cell',
        'sign_email',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id');
    }
}
