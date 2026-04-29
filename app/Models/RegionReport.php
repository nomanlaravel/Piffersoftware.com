<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionReport extends Model
{
    use HasFactory;

protected $fillable = [
    'admin_id',
    'region_id',
    'branch_office_name',
    'branch_id',
    'employee_name',
    'designation',
    'type',
    'created_at',
    'monday',
];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
