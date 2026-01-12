<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class Moveable extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_of_vehicle',
        'vehicle_no',
        'vehicle_model',
        'vehicle_pic',
        'vehicle_book_pic',
        'payment_type',
        'vehicle_name',
        'engine_no',
        'chasis_no',
        'vehicle_color',
    ];

    
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admins_id');
    }
}
