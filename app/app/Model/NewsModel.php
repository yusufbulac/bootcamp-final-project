<?php

namespace App\Model;

use App\Core\MainModel;

class NewsModel extends MainModel
{
    public static function news($name): object
    {
        return parent::getRow("SELECT*FROM news WHERE news_title=?", [$name]);
    }

    public static function comments($news_id): array
    {
        return parent::getRows("SELECT comments.*, users.user_id, users.user_name FROM comments INNER JOIN users ON comments.user_id =users.user_id WHERE news_id=?", [$news_id]);
    }


    public static function otherNews($par1, $par2): array
    {
        return parent::limit("SELECT*FROM news ORDER BY rand() LIMIT ?,?", $par1, $par2);
    }

    public static function categories(): array
    {
        return parent::getRows("SELECT*FROM category ORDER BY category_name ASC");
    }

    public static function newComment($user_id, $news_id, $comment_title, $comment_content, $comment_isanonymous)
    {
        return parent::Insert("INSERT INTO comments SET
        user_id=?,
        news_id=?,
        comment_title=?,
        comment_content=?,
        comment_isanonymous=?
        ", array($user_id, $news_id, $comment_title, $comment_content, $comment_isanonymous));
    }


    public static function myNews($user_id)
    {
        return parent::getRows("SELECT category.category_id,news.* FROM category
        INNER JOIN userCategory ON category.category_id=userCategory.category_id
        INNER JOIN users ON users.user_id=userCategory.user_id
        INNER JOIN news ON news.category_id=category.category_id
        WHERE users.user_id=?", array($user_id));
    }

}
