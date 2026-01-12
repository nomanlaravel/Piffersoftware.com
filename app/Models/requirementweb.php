<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requirementweb extends Model
{
    use HasFactory;
    protected $fillable = [
        'web_category',
        'web_scope',
        'web_date',
        'web_sub_date',
        'web_notes',
        'web_attachments',
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirements_id');
    }
}
