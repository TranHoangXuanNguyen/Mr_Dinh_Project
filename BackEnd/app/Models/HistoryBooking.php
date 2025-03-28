<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class HistoryBooking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'trip_id', 'number_of_guest', 'total_price', 'status', 'date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
