<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'img', 'area'];

    public function trips()
    {
        return $this->hasMany(Trip::class, 'p_id');
    }
}
