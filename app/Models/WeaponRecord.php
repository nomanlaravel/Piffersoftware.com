<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeaponRecord extends Model
{
    use HasFactory;
    protected $table = 'weapon_records';
    protected $fillable = [
        'branch_id',
        'date',

        'weapon_type',
        'repeater',
        'body_guard',
        'wooden_body',
        'g3_style',
        'bore12_total_bullets',
        'bore12_total',
        'seven_shots',
        'fourteen_shots',
        'mp5',
        'kalakov',
        'bore30_total_bullets',
        'bore30_total',
        'mp_5',
        'zagana',
        'breta',
        'glock',
        'mm9_total_bullets',
        'mm9_total',
        'mm7_standard',
        'mm7_total_bullets',
        'rifle_222',
        'rifle_222_bullets',
        'rifle_44',
        'rifle_44_bullets',
        'rifle_223',
        'rifle_223_bullets',
        'rifle_223_m4',
        'rifle_223_m4_bullets',
    ];

    public function Wbranch()
    {
        return $this->belongsTo(Admin::class, 'branch_id');
    }

}
