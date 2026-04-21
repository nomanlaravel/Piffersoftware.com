<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PipelineReport extends Model
{
    use HasFactory;

    protected $table = 'sales_pipeline_reports';
    protected $fillable = [
        'admin_id',
        'region_id',
        'sales_visit',
        'proposal_sent',
        'quotation_sent',
        'prospect_name',
        'required_services',
        'remarks',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
