<?php

namespace App\Controller;

use App\Core\MainController;

class ErrorLayoutController extends MainController
{
    //header

    public static function header(): void
    {
        self::render("error/header");
    }

    //footer
    public static function footer(): void
    {
        self::render("error/footer");
    }
}