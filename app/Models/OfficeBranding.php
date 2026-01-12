<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class OfficeBranding extends Model
{
    use HasFactory;

    protected $fillable = [
        'b_type',
        'picture_of_b',
        'site_of_b',
        'cost_of_b',
        'periodical_m',
        'vendor_id',
        'v_name',
        'v_cell',
        'v_office',
        'v_floor',
        'v_building',
        'v_block',
        'v_area',
        'v_city',
        'v_photo_b',
        'v_pin',
        'v_notes',
        'v_attach',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admins_id');
    }
}
