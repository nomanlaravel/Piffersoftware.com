<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class InsurranceCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'i_poc_name',
        'i_poc_web',
        'i_poc_email',
        'i_poc_cell',
        'value_of_sum',
        'ins_p_pic',
        'c_of_ins',
        'i_poc_office',
        'i_poc_floor',
        'i_poc_building',
        'i_poc_block',
        'i_poc_area',
        'i_poc_city',
        'i_poc_loc',
        'i_poc_pin',
        'ins_note',
        'ins_attach',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admins_id');
    }
}
