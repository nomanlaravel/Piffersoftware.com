<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class TrackerCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracker_company_name',
        't_poc_name',
        't_poc_web',
        't_poc_email',
        't_poc_cell',
        't_poc_office',
        't_poc_floor',
        't_poc_building',
        't_poc_block',
        't_poc_area',
        't_poc_city',
        't_poc_loc',
        't_poc_pin',
        'tracker_note',
        'tracker_attach',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admins_id');
    }
}
