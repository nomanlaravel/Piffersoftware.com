<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cro extends Model
{
    use HasFactory;
    protected $fillable = ['name','phone','region'];

        public function crosDispatche()
    {
        return $this->hasMany(InternalDispatch::class, 'cro_id');
    }
}
