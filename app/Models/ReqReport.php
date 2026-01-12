<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Requisition;

class ReqReport extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'date',
        'item_name',
        'item_code',
        'quantity',
        'description',
        'manufacturing',
        'size',
        'article_no',
        'any_special_ins',
        'notes',
        'attachments',
    ];
    
    public function requisition()
    {
        return $this->belongsTo(Requisition::class, 'requisition_id');
    }
}
