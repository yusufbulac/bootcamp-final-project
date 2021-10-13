<?php

namespace App\Controller;


use App\Core\MainController;
use App\helpers\helper;

class LogoutController extends MainController
{
    public static function logout()
    {
        session_destroy();
        helper::redirect("/");
    }

}