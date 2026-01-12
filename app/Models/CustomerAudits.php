<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAudits extends Model
{
    use HasFactory;

    protected $fillable = [
        'audit_file',
        'audit_sign',
        'audit_date',
        'audit_attach',
        'audit_checked_by',
        'audit_ex_attach',
        'audit_note',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id');
    }
}
