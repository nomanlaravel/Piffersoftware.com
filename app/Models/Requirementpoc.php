<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirementpoc extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'req_poc_name',
        'req_poc_num',
        'req_poc_desig',
        'req_poc_visiting_front',
        'req_poc_visiting_back',
        'req_poc_email',
        'req_poc_org_name',
        'req_poc_office_no',
        'req_poc_floor',
        'req_poc_building',
        'req_poc_block',
        'req_poc_area',
        'req_poc_city',
        'req_poc_building_attach',
        'req_poc_pin',
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirements_id');
    }
}
