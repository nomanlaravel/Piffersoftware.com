<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vendor;

class VendorAccounts extends Model
{
    use HasFactory;

    protected $fillable = [
        'v_bank_name',
        'v_bank_title',
        'v_bank_number',
        'v_bank_iban',
        'v_bank_terms',
        'v_bank_notes',
        'v_bank_attach',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendors_id');
    }
}
