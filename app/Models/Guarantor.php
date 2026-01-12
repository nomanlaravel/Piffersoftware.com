<?php

namespace App\Models;

use App\Models\Hrm;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guarantor extends Model
{
    use HasFactory;

    protected $fillable = [
        'g_name',
        'g_fname',
        'g_relation',
        'g_tenure_rel',
        'g_cnic_f',
        'g_cnic_b',
        'pos_verify',
        'head_office_no',
        'head_floor_no',
        'head_building',
        'head_block',
        'head_area',
        'head_city',
        'head_attach',
    ];

    public function hrm()
    {
        return $this->belongsTo(Hrm::class, 'hrms_id');
    }
}
