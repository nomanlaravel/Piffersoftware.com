<?php

namespace App\Models\RegulatorModels;
use App\Models\Regulator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegAnyConsultant extends Model
{
    use HasFactory;

    protected $fillable = [
        'other_name',
        'other_desig',
        'other_org',
        'other_cell',
        'other_email',
        'other_fee',
        'other_front',
        'other_back',
        'other_bank',
        'other_acc',
        'other_acc_no',
        'other_fin',
        'other_notes',
        'other_attach',
        'other_office',
        'other_build',
        'other_block',
        'other_area',
        'other_city',
        'other_photo',
        'other_a_email',
        'other_web',
        'other_pin',
        'other_gps',
        'other_ex_notes',
        'other_ex_attach',
    ];

    public function regulator()
    {
        return $this->belongsTo(Regulator::class, 'regulators_id');
    }
}
