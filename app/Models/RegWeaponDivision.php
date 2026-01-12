<?php

namespace App\Models;

use App\Models\Regulator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegWeaponDivision extends Model
{
    use HasFactory;

    protected $fillable = [
        'division_category',
        'division_quantity',
        'division_book',
        'division_card',
        'division_caliber',
        'division_juris',
        'division_sanc',
        'division_sanc_copy',
        'division_nbp',
        'division_pb',
        'division_notes',
        'division_attach',
    ];

    public function regulator()
    {
        return $this->belongsTo(Regulator::class, 'regulators_id');
    }
}
