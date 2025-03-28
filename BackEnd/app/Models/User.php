<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'phone_number', 'email_address', 'role', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function historyBookings()
    {
        return $this->hasMany(HistoryBooking::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
