<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
class OrderDetail extends Model
{
    use HasFactory;

    protected $primaryKey='id';

    protected $fillable = [
        'customer_id',
        'total_amount',
        'payment_method_id',
        'delivery_id',
        'delivery_date',
        'phone_number',
        'address',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');  //name_table -> name_column_Of_Sub_table
    }

    // public function cart()
    // {
    //     return $this->belongsTo(CartItem::class, 'cart_id');  //name_table -> name_column_Of_Sub_table
    // }

    public function payment()
    {
        return $this->belongsTo(PaymentDetail::class, 'payment_method_id');
    }


    public function delivery()
    {
        return $this->belongsTo(DeliveryMethod::class, 'delivery_id');  //name_table -> name_column_Of_Sub_table
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }


}
