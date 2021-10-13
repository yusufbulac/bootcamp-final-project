<?php

namespace App\Model;

use App\Core\MainModel;

class HomeModel extends MainModel
{
    public static function sliderNews(){
        return self::limit("SELECT*FROM news ORDER BY rand() LIMIT ?,?", 1, 6);
    }

    public static function lastNews(){
        return self::limit("SELECT*FROM news ORDER BY news_date ASC LIMIT ?,?",1,8);
    }


}
