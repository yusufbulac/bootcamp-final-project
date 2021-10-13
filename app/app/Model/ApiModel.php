<?php

namespace App\Model;

use App\Core\MainModel;

class ApiModel extends MainModel
{
    public static function news($name)
    {
        return parent::getRowAssoc("SELECT*FROM news WHERE news_title=?", [$name]);
    }

    public static function newsAsCategory($name)
    {
        return parent::getRowAssoc("SELECT news.*, category.category_id, category.category_name FROM news
        INNER JOIN category ON category.category_id=news.category_id
        WHERE category_name=?", [$name]);
    }
}