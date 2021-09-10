<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_name_en',
        'subcategory_name_pt',
        'subcategory_slug_en',
        'subcategory_slug_pt',
    ];

    public function category() { // Criando uma relação para visualizar o nome das categorias na tabela em 'subcategory.index'
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
