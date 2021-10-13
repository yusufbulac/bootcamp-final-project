<?php

namespace App\Model;

use App\Core\MainModel;

class HomeLayoutModel extends MainModel
{
    public static function categories(): array
    {
        return parent::getRows("SELECT*FROM category ORDER BY category_name ASC");
    }

    public static function getUser($user_id): object
    {
        return parent::getRow("SELECT*FROM users WHERE user_id=?",array($user_id));
    }
}