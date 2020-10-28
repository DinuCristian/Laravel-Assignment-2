<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'genre'
    ];

    public function getPathAttribute()
    {
        return $this->path();
    }

    public function path($append = '')
    {
        return '/movie/' . $this->id . '/' . $append;
    }

    public function imageUrl($width = 448, $height = 299)
    {
        return Helpers::fakeImageUrl($this->id, $width, $height);
    }
}
