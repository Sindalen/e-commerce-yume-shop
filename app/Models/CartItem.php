<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    use HasFactory;

    protected $primaryKey='id';

    protected $fillable=[
        'customer_id',
        'product_id',
        // 'variation_id',
        'size',
        'color',
        'quantity',
        'price',
        'created_at',
        'updated_at',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // public function variation() {
    //     return $this->belongsTo(ProductVariation::class, 'variation_id');
    // }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');  //name_table -> name_column_Of_Sub_table
    }
}
