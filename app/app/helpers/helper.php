<?php

namespace App\helpers;

class helper
{


    static function cleaner($text) //for data from inputs
    {
        $array = array('insert', 'update', 'union', 'select', '*');
        $text = str_replace($array, '', $text);
        $text = trim($text);
        $text = strip_tags($text);
        $text = htmlspecialchars($text);
        $text = stripslashes($text);
        return $text;
    }

    static function flashData($key, $value)
    {
        $_SESSION[$key] = $value;
    }


    static function redirect($url, $time = 0)
    {
        if ($time != 0) {
            header("Refresh:$time;url=$url");
        } else {
            header("Location:$url");
        }
    }


}