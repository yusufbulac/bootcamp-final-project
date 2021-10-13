<?php

namespace App\Controller;

use App\Core\MainController;
use App\helpers\helper;
use App\Model\HomeLayoutModel;

class HomeLayoutController extends MainController
{
    //header

    public static function header(): void
    {
        if (isset($_SESSION["user_id"])) {
            $user_id = helper::cleaner($_SESSION["user_id"]);
            $getUser = HomeLayoutModel::getUser($user_id);
            $categories = HomeLayoutModel::categories();
            self::render("home/header", ["navcategories" => $categories, "user" => $getUser]);
        } else {
            $categories = HomeLayoutModel::categories();
            self::render("home/header", ["navcategories" => $categories]);
        }


    }

    //footer
    public static function footer(): void
    {
        self::render("home/footer");
    }
}