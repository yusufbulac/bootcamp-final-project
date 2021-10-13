<?php

namespace App\Controller;

use App\helpers\helper;

class SessionController
{
    public static function createSession($array = [])
    {
        foreach ($array as $key => $value) {
            $_SESSION[$key] = helper::cleaner($value);
        }
    }


}