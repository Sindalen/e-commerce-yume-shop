<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'image',
        'price',
        'in_stock',
        'product_category_id',
        'discount_id',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function ProductCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function Discount()
    {
        return $this->belongsTo(Discount::class, 'discount_id');
    }

    public function getOriginalPriceAttribute()
    {
        return $this->attributes['price'] / (1 - ($this->discount->percentage / 100));
    }

    public function created_by() {
        return $this->belongsTo(User::class, 'created_by');
    }

    // In app/Models/Product.php
    public function scopeSearch($query, $searchTerm)
    {
        return $query->where(function($q) use ($searchTerm) {
            $q->where('description', 'like', "%$searchTerm%")
            ->orWhere('description', 'like', "%$searchTerm%")
            ->orWhere('sku', 'like', "%$searchTerm%");
        });
    }

    // public function updated_by() {
    //     return $this->belongsTo(User::class, 'updated_by');
    // }

    // public function ProductVariation()
    // {
    //     return $this->hasMany(ProductVariation::class, 'product_id');
    // }
}
