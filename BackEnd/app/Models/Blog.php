<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * @OA\Schema(
     *     schema="Blog",
     *     required={"location", "time_read", "content"},
     *     @OA\Property(property="id", type="integer", example=1),
     *     @OA\Property(property="location", type="string", example="Hà Nội"),
     *     @OA\Property(property="up_time", type="string", format="date-time", example="2025-03-25 12:00:00"),
     *     @OA\Property(property="time_read", type="integer", example=5),
     *     @OA\Property(property="content", type="string", example="Nội dung blog..."),
     *     @OA\Property(property="image", type="string", nullable=true, example="https://example.com/image.jpg")
     * )
     */
    use HasFactory;

    protected $fillable = ['location', 'up_time', 'time_read', 'content', 'image'];
}
