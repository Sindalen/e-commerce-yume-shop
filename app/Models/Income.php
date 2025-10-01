<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    protected $fillable=[
        'user_avatar',
        'username',
        'total_price',
        'status',
        'date',
        'time'

    ];
}
