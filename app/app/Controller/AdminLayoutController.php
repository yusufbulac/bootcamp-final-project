<?php

namespace App\Controller;



use App\Core\MainController;

class AdminLayoutController extends MainController
{
    //header
    public static function header(): void
    {
        self::render("admin/header");
    }

    //footer
    public static function footer(): void
    {
        self::render("admin/footer");
    }
}