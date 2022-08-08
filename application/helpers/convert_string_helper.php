<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('slug')) {
    function slug($string)
    {
        $lower_string = strtolower($string);

        $slug = str_replace(' ', '-', $lower_string);

        return $slug;
    }
}

if (!function_exists('slug_text')) {
    function slug_text($slug)
    {
        return ucwords(str_replace('-', ' ', $slug));
    }
}


if (!function_exists('title')) {
    function title($string)
    {
        return ucwords($string);
    }
}

if (!function_exists('timestampToString')) {
    function timestampToString($timestamp)
    {
        return gmdate("dmY", $timestamp);
    }
}
