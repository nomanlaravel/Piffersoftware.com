<?php

namespace App\Models;

use App\Models\Training;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'list_items_category',
        'item_category',
        'item_type',
        'item_supplier',
        'item_quantity',
        'item_price',
        'item_total_price',
        'item_notes',
        'item_attach',
        'item_vendor',
        'vendor_cell',
        'vendor_floor',
        'vendor_building',
        'vendor_block',
        'vendor_area',
        'vendor_city',
        'vendor_email',
        'vendor_website',
        'vendor_gps',
        'vendor_notes',
        'vendor_attach',
    ];

    public function training()
    {
        return $this->belongsTo(Training::class, 'trainings_id');
    }
}
