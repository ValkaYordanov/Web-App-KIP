<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'pic_path', 'stock', 'price', 'url', 'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
