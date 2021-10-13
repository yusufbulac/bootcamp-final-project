<?php

namespace App\Model;

use App\Core\MainModel;

class CategoryModel extends MainModel
{
    public static function categories():array
    {
        return parent::getRows("SELECT*FROM category ORDER BY category_name ASC");
    }

    public static function category($name):array
    {
        return parent::getRows("SELECT*FROM category WHERE category_name=?", [$name]);
    }

    public static function news($categoryid):array
    {
        return parent::getRows("SELECT*FROM news WHERE category_id=?", [$categoryid]);
    }
}