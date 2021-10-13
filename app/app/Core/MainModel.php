<?php

namespace App\Core;


abstract class MainModel
{

    public static function limit($query, $p1 = 1, $p2 = NULL)
    {
        return Database::getInstance()->limit($query, $p1, $p2);
    }


    public static function getRows($query, $params = null)
    {
        return Database::getInstance()->getRows($query, $params);

    }


    public static function getRow($query, $params = null)
    {
        return Database::getInstance()->getRow($query, $params);
    }


    public static function getColumn($query, $params = null)
    {
        return Database::getInstance()->getColumn($query, $params);
    }


    public static function Insert($query, $params = null)
    {
        return Database::getInstance()->Insert($query, $params);
    }


    public static function Update($query, $params = null)
    {
        return Database::getInstance()->Update($query, $params);

    }


    public static function Delete($query, $params = null)
    {
        return Database::getInstance()->Delete($query, $params);
    }


    public static function getRowAssoc($query, $params = null)
    {
        return Database::getInstance()->getRowAssoc($query, $params);
    }


}
