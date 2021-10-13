<?php

session_start();
ob_start();
use App\Core\Router;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require dirname(__DIR__) . "/vendor/autoload.php";
require dirname(__DIR__) . "/app/helpers/routes.php";
/*
$log=new Logger("my_log");
$log->pushHandler(new StreamHandler("site.log",Logger::ERROR));
$log->error("Error:");
$log->critical("Critical:");
*/

(new Router($routes))();

ob_end_flush();

