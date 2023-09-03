<?php

namespace Core;

class Str
{
    public static function strpos(string $str, string $pos)
    {
        $data = strpos($str, $pos);
        return substr($str, 0,  $data);
    }

    public static function lower(string $str)
    {
        return strtolower($str);
    }
}
