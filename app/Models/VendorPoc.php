<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vendor;

class VendorPoc extends Model
{
    use HasFactory;

    protected $fillable = [
        'v_poc_name',
        'v_poc_cell',
        'v_poc_email',
        'v_poc_cnic',
        'v_poc_front_attach',
        'v_poc_back_attach',
        'v_poc_notes',
        'v_poc_attach',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendors_id');
    }
}
