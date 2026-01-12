<?php

namespace App\Models;

use App\Models\InventoryArticle;
use App\Models\InventoryCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventorySubcategory extends Model
{
    use HasFactory;

    protected $fillable = ['subcategory_name', 'subcategory_image', 'category_id'];

    public function category()
    {
        return $this->belongsTo(InventoryCategory::class, 'category_id');
    }

    public function articles()
    {
        return $this->hasMany(InventoryArticle::class, 'subcategory_id');
    }
}
