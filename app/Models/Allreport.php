<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allreport extends Model
{
    use HasFactory;
      protected $fillable = [
        'branch_id',
        'report_name',
        'date',
        'attachment',
    ];

    public function branch()
        {
            return $this->belongsTo(\App\Models\Admin::class, 'branch_id');
        }

        public function cro()
        {
            return $this->belongsTo(Cro::class, 'cro_id');
        }

}
