<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSalaryAndBenefits extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat_name',
        'sal_cat',
        'sal_days',
        'leaves_a',
        'other_ben',
        'sal_attach',
        'sal_note',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id');
    }
}
