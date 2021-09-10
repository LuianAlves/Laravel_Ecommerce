<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'sub_subcategory_name_en',
        'sub_subcategory_name_pt',
        'sub_subcategory_slug_en',
        'sub_subcategory_slug_pt',
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subcategory() {
        return $this->belongsTo(SubCategory::class, 'subcategory_id', 'id');
    }
}
