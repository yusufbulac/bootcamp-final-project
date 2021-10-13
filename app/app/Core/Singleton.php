<?php

namespace App\Core;

class Singleton
{
    private static $instances = [];


    public function __wakeup()
    {
        throw new \Exception("Can't Unserialize!");
    }

    public static function getInstance()
    {

        $subclass = static::class;
        if (!isset(self::$instances[$subclass])) {
            self::$instances[$subclass] = new static();
        }
        return self::$instances[$subclass];
    }
}
