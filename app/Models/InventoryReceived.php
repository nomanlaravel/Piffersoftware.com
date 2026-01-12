<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryReceived extends Model
{
    use HasFactory;

    protected $fillable = [
        'lot_number',
        'vendor_id',
        'category',
        'sub_category',
        'article_name',
        'condition',
        'date',
        'item_name',
        'item_code',
        'description',
        'manufacturing',
        'size',
        'article_number',
        'quantity',
        'price_per_unit',
        'total_price',
        'purchase_order_number',
        'po_attachment',
        'vendor_lot_number',
        'vendor_name',
        'vendor_id',
        'invoice_number',
        'invoice_attachment',
        'any_spec_ins',
        'ins_attachment',
        'notes',
        'attachment'
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

}
