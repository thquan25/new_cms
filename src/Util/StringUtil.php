<?php

namespace App\Util;

class StringUtil
{
    public function slugify(string $value): string
    {
        $slug = preg_replace('~[^\pL\d]+~u', '-', $value);
        // transliterate
        $slug = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);

        // remove unwanted characters
        $slug = preg_replace('~[^-\w]+~', '', $slug);

        // trim
        $slug = trim($slug, '-');

        // remove duplicate -
        $slug = preg_replace('~-+~', '-', $slug);

        // lowercase
        $slug = strtolower($slug);

        return !empty($slug) ? $slug : 'n-a';
    }
}
