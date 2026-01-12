<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VendorPoc;
use App\Models\VendorAccounts;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'vendor_name',
        'desc_vendor',
        'vendor_profile_attach',
        'vendor_email',
        'vendor_website',
        'vendor_notes',
        'vendor_attach',
        'office_no',
        'o_floor',
        'o_building',
        'o_block',
        'o_area',
        'o_city',
        'o_photo',
        'o_pin',
        'o_email',
        'o_website',
        'f_office_no',
        'f_floor',
        'f_building',
        'f_block',
        'f_area',
        'f_city',
        'f_photo',
        'f_pin',
        'f_email',
        'f_website',
        'w_office_no',
        'w_floor',
        'w_building',
        'w_block',
        'w_area',
        'w_city',
        'w_photo',
        'w_pin',
        'w_email',
        'w_website',
        'vendor_cuin',
        'vendor_ntn',
        'vendor_sin',
        'vendor_secp_attach',
        'cop_notes',
        'cop_attach',
        'type_of_entity',
        'certification_attach',
        'directors_attach',
    ];


    public function vendorpocs()
    {
        return $this->hasMany(VendorPoc::class, 'vendors_id');
    }

    public function vendoraccounts()
    {
        return $this->hasMany(VendorAccounts::class, 'vendors_id');
    }
}
