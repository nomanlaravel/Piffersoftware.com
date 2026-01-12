<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dropdown extends Model
{
    use HasFactory;
    protected $fillable = ['cctv_type','cctv_backup_storage' , 'cctv_nvr','cctv_poe_switch'];
}
