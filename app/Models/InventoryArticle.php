<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryArticle extends Model
{
    use HasFactory;

    protected $fillable = ['article_name', 'article_image', 'subcategory_id'];

    public function subcategory()
    {
        return $this->belongsTo(InventorySubcategory::class, 'subcategory_id');
    }
}
