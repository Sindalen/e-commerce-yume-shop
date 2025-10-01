<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShoppingSession extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    protected $fillable=[
        'customer_id',
        'total_cost',
        'created_at',
        'updated_at',
    ];

    public function Customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
