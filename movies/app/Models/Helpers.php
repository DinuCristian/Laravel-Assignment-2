<?php

namespace App\Models;

class Helpers
{
    public static function fakeImageUrl($id, $width, $height)
    {
        return "https://picsum.photos/id/$id/$width/$height";
    }
}