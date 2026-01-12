<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingEmergency extends Model
{
    use HasFactory;

    protected $fillable = [
        'train_emer_ser',
        'train_emer_pic',
        'train_emer_poc_name',
        'train_emer_poc_desig',
        'train_emer_poc_cell',
        'train_emer_poc_email',
        'train_emer_poc_notes',
        'train_emer_poc_attach',
        'train_emer_office',
        'train_emer_building',
        'train_emer_block',
        'train_emer_area',
        'train_emer_city',
        'train_emer_buildphoto',
        'train_emer_email',
        'train_emer_web',
        'train_emer_pin',
        'train_emer_app_rental',
        'train_emer_attach',
        'train_emer_note',
    ];

    public function training()
    {
        return $this->belongsTo(Training::class, 'trainings_id');
    }
}
