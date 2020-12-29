<?php

namespace App\Models;

class Helpers
{
    public static function fakeImageUrl($id, $width, $height)
    {
        return "https://picsum.photos/id/$id/$width/$height";
    }

    public static function paragraphsAsHtml($str, $margin)
    {
        if ($margin) {
            $open_tag = "<p class=\"mb-{$margin}\">";
        } else {
            $open_tag = "<p>";
        }

        return $open_tag . str_replace("\n\n", $open_tag . "</p>", $str) . "</p>";
    }
}