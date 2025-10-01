<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariation extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'product_id',
        'size',
        'color',
        'code',
        'in_stock',
    ];

    public function Product()
    {
        return $this->belongsTo(Product::class, 'product_id');  //name_table -> name_column_Of_Sub_table
    }
}
