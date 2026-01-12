<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalDispatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'lot_number',
        'lot_id',
        'cro_id',
        'category',
        'sub_category',
        'article_name',
        'condition',
        'date',
        'issued_to',
        'item_name',
        'item_code',
        'description',
        'manufacturing',
        'size',
        'article_number',
        'quantity',
        'price_per_unit',
        'total_price',
        'dispatch_through',
        'tracking_id',
        'tracking_slip_attach',
        'dispatcher_name',
        'dispatcher_employee_id',
        'dispatcher_cell_no',
        'receiver_name',
        'receiver_employee_id',
        'receiver_cell_no',
        'notes',
        'attachment'
    ];
    public function issuedToGuard()
{
    return $this->belongsTo(Hrm::class, 'issued_to');
}

    public function lot()
    {
        return $this->belongsTo(InventoryReceived::class, 'lot_id');
    }

    public function cros()
    {
        return $this->belongsTo(Cro::class, 'cro_id');
    }


}
