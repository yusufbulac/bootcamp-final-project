<?php

namespace App\Controller;

use App\Core\MainController;

class ErrorController extends MainController
{

    public static function page404(): void
    {
        echo ErrorLayoutController::header();
        self::render("error/page404");
        echo ErrorLayoutController::footer();
    }

    public static function page500(): void
    {
        echo ErrorLayoutController::header();
        self::render("error/page500");
        echo ErrorLayoutController::footer();
    }
}
