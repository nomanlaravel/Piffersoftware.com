<?php

namespace App\Models;

use App\Models\InventorySubcategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'category_image',
    ];

    public function subcategories()
    {
        return $this->hasMany(InventorySubcategory::class, 'category_id');
    }
}
