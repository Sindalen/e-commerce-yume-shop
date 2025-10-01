<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Customer extends Authenticatable implements AuthenticatableContract
{
    use HasFactory, Notifiable;

    protected $guard = 'customer';

    protected $fillable = [
        'username',
        'user_avatar',
        'email',
        'address',
        'phone_number',
        'password',
        'gender_id',
        'province_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function Gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function Province()
    {
        return $this->belongsTo(Province::class);
    }
    
    public function createdBy()
    {
        return $this->belongsTo(Customer::class, 'created_by');
    }

    public function getAvatarUrlAttribute()
    {
        return $this->user_avatar 
            ? asset('storage/' . $this->user_avatar)
            : asset('images/default-avatar.jpg');
    }
}
