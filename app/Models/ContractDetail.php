<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractDetail extends Model
{
    use HasFactory;
    protected $fillable = [
    'branch_id','date', 'profile', 'quotations', 'visiting_cards', 'guards', 'contractual_value',
];
public function sales_branch()
{
    return $this->belongsTo(Admin::class, 'branch_id', 'branch_id');
}

public function requirement()
{
    return $this->belongsTo(Requirement::class, 'requirement_id');
}
    
}
