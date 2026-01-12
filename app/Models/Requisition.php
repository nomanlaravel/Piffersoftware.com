<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ReqReport;

class Requisition extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'demand_person_name',
        'demand_employee_id',
        'demand_person_cell',
         'demand_raised_by',
        'demand_raised_to',
    ];
    
    public function reqreports()
    {
        return $this->hasMany(ReqReport::class, 'requisition_id');
    }
}
