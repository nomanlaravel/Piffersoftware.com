<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'do_date',
        'do_number',
        'po_date',
        'po_number',
        'vendor_id',
        'name_of_bank',
        'poc_name',
        'address_of_bank',
        'cell_number',
        'title_of_account',
        'office_number',
        'account_number',
        'rec_staff',
        'location',
        'rec_cell_number',
        'rec_city',
        'rec_fax',
        'rec_office_number',
        'instructions',
        'taxable',
        'tax_rate',
        'total_tax',
        'shipping_cost',
        'others',
        'total',
        'raised_by_name',
        'raised_by_cell',
        'raised_by_signature',
        'vetted_by_name',
        'vetted_by_cell',
        'vetted_by_signature',
        'approved_by_name',
        'approved_by_cell',
        'approved_by_signature',
    ];

    public function purchaseOrderProducts()
    {
        return $this->hasMany(PurchaseOrderProduct::class, 'purchase_order_id');
    }

}
