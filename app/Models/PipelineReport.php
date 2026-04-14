<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PipelineReport extends Model
{
    use HasFactory;

    protected $table = 'sales_pipeline_reports';
    protected $fillable = [
        'region_id',
        'prospect_name',
        'required_services',
        'remarks',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
