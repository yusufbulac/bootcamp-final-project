<?php

namespace App\Controller;

use App\Core\MainController;
use App\helpers\helper;
use App\Model\ApiModel;

class ApiController extends MainController
{
    public function news(string $name): void
    {

        $news = ApiModel::news($name);
        if(!($news)){
            helper::redirect("error/404");
        }

        $this->json($news);
    }

    public function newsAsCategory($name): void
    {
        $news = ApiModel::newsAsCategory($name);
        if(!($news)){
            helper::redirect("error/404");
        }

        $this->json($news);
    }
}
