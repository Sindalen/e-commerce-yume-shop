<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    use HasFactory;

    protected $primaryKey='id';

    protected $fillable = [
        'order_id',
        'amount',
        'payment_method',
        'delivery_name',
        'status',
    ];
}
