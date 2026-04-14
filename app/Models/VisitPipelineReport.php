<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitPipelineReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'region_id',
        'branch_office_name',
        'customer_name',
        'sales_visit',
        'proposal_sent',
        'quotation_sent',
        'guard_deployed_by_ho',
        'new_client_name',
        'contractual_value',
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
