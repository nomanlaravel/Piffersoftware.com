<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class Repair extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_no',
        'r_desc',
        'r_amount',
        'r_pay_by',
        'r_date',
        'repair_company_name',
        'r_poc_name',
        'r_poc_web',
        'r_poc_email',
        'r_poc_cell',
        'r_poc_office',
        'r_poc_floor',
        'r_poc_building',
        'r_poc_block',
        'r_poc_area',
        'r_poc_city',
        'r_poc_loc',
        'r_poc_pin',
        'r_warranty',
        'warranty_note',
        'repair_note',
        'repair_attach',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admins_id');
    }
}
