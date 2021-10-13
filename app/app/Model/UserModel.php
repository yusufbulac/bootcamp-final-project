<?php

namespace App\Model;


use App\Core\MainModel;

class UserModel extends MainModel
{

    public static function isHave($user_name, $user_email)
    {
        return parent::getColumn("SELECT*FROM users WHERE user_name=? OR user_email=?", array($user_name, $user_email));
    }

    public static function isHave2($user_name, $user_email)
    {
        return parent::getRow("SELECT*FROM users WHERE user_name=? OR user_email=?", array($user_name, $user_email));
    }

    public static function register($user_firstname, $user_lastname, $user_name, $user_age, $user_email, $user_password, $user_address, $user_city, $user_country)
    {
        return parent::Insert("INSERT INTO users SET
        user_firstname=?,
        user_lastname=?,
        user_name=?,
        user_age=?,
        user_email=?,
        user_password=?,
        user_address=?,
        user_city=?,
        user_country=?
        ", array($user_firstname, $user_lastname, $user_name, $user_age, $user_email, $user_password, $user_address, $user_city, $user_country));
    }


    public static function isUserLogin($user_name, $user_password)
    {
        return parent::getColumn("SELECT*FROM users WHERE user_name=? AND user_password=?", array($user_name, $user_password));
    }

    public static function getUserInfoWithUsername($user_name)
    {
        return parent::getRow("SELECT * FROM users WHERE user_name=?", array($user_name));
    }

    public static function getUser($user_id)
    {
        return parent::getRow("SELECT * FROM users WHERE user_id=?", array($user_id));
    }

    public static function updateUser($user_firstname, $user_lastname, $user_name, $user_age, $user_email, $user_address, $user_city, $user_country, $user_id)
    {
        return parent::Update("UPDATE users SET
        user_firstname=?,
        user_lastname=?,
        user_name=?,
        user_age=?,
        user_email=?,
        user_address=?,
        user_city=?,
        user_country=?
        WHERE user_id=?
        ", array($user_firstname, $user_lastname, $user_name, $user_age, $user_email, $user_address, $user_city, $user_country, $user_id));
    }


    public static function updatePassword($user_password, $user_id)
    {
        return parent::Update("UPDATE users SET
        user_password=?
        WHERE user_id=?
        ", array($user_password, $user_id));
    }

    public static function deleteUser($user_id)
    {
        return parent::Delete("DELETE users, comments,userCategory FROM users
        INNER JOIN comments ON users.user_id=comments.user_id
        INNER JOIN userCategory ON users.user_id=userCategory.user_id
        WHERE users.user_id=?
        ", array($user_id));
    }


    public static function userComment($user_id)
    {
        return parent::getRows("SELECT comments.*,news.news_id,news.news_title FROM comments INNER JOIN news ON comments.news_id =news.news_id WHERE comments.user_id=?", array($user_id));
    }


    public static function deleteComment($comment_id)
    {
        return parent::Delete("DELETE FROM comments
        WHERE comment_id=?
        ", array($comment_id));
    }


    public static function allCategory()
    {
        return parent::getRows("SELECT*FROM category ORDER BY category_name ASC");
    }

    public static function myCategory($user_id)
    {
        return parent::getRows("SELECT category.* FROM category
        INNER JOIN userCategory ON category.category_id=userCategory.category_id
        INNER JOIN users ON users.user_id=userCategory.user_id
        WHERE users.user_id=?", array($user_id));
    }


    public static function deleteAllMyNews($user_id)
    {
        return parent::Delete("DELETE FROM userCategory
        WHERE user_id=?
        ", array($user_id));
    }


    public static function setMyNews($user_id, $category_id)
    {
        return parent::Insert("INSERT INTO userCategory SET
        user_id=?,
        category_id=?
        ", array($user_id, $category_id));
    }


}
