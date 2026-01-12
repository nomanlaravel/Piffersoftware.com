<?php

namespace App\Models;

use App\Models\Training;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingPoc extends Model
{
    use HasFactory;

    protected $fillable = [
        'poc_name',
        'poc_desig',
        'poc_fax',
        'poc_phone',
        'poc_mobile',
        'poc_web',
        'poc_email',
        'poc_loc',
        'poc_document',
        'system_id',
        'other_info',
    ];

    public function training()
    {
        return $this->belongsTo(Training::class, 'trainings_id');
    }
}
