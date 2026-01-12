<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wnationwide extends Model
{
    use HasFactory;
    protected $fillable = [
    'branch_id',
    'new_profiles',
    'old_profiles',
    'sedulous_profiles',
    'handbooks',
    'kay_chains',
    'calenders',
    'remarks',
    'nationenddate'
];
public function admin()
{
    return $this->belongsTo(Admin::class, 'branch_id', 'branch_id');
}


}
