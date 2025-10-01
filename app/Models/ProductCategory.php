<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
    use HasFactory;
    protected $primaryKey ='id';
    protected $fillable =[
        'name'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'product_category_id');
    }
    
    // public function createdBy()
    // {
    //     return $this->belongsTo(User::class, 'created_by');
    // }

    // public function updated_by()
    // {
    //     return $this->belongsTo(User::class, 'updated_by');
    // }
}
