<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = ['p_id', 'name', 'img', 'des', 'duration', 'price'];

    public function province()
    {
        return $this->belongsTo(Province::class, 'p_id');
    }

    public function historyBookings()
    {
        return $this->hasMany(HistoryBooking::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
