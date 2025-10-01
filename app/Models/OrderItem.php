<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'order_id',
        'product_id',
        'size',
        'color',
        'quantity',
        'price',
        'date_time',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(OrderDetail::class, 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');  //name_table -> name_column_Of_Sub_table
    }
}
