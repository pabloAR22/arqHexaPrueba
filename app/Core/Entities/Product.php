<?php

namespace App\Core\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price',
        'stock'
    ];

    public function scopeCategory($query, $id_category)
    {
        return $query->whereHas('categories', function ($q) use ($id_category) {
            $q->where('categories.id', $categoryId);
        });
    }

    public function scopePrice($query, $price)
    {
        return $query->where('price', '=', $price);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'products_categories', 'id_category', 'id_product');
    }
}
