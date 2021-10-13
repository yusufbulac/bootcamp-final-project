<?php

namespace App\Controller;

use App\Core\MainController;
use App\Model\HomeModel;

class HomeController extends MainController
{
    public function index(): void
    {
        echo HomeLayoutController::header();
        $sliderNews=HomeModel::sliderNews();
        $lastNews=HomeModel::lastNews();
        $this->render("home/index",["news"=>$sliderNews,"lastNews"=>$lastNews]);
        echo HomeLayoutController::footer();
    }

    public function about(): void
    {
        echo HomeLayoutController::header();
        $this->render("home/about");
        echo HomeLayoutController::footer();
    }

    public function contact(): void
    {
        echo HomeLayoutController::header();
        $this->render("home/contact");
        echo HomeLayoutController::footer();
    }
}
