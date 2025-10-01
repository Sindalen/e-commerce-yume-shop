<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discount extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    protected $fillable=[
        'discount_name',
        'discount_percent',
        'active',
        'created_by',
    ];

    public function DiscountProducts()
    {
        return $this->hasMany(Product::class, 'discount_id');
    }
    
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updated_by()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
