<?php


namespace App\Core;

class MainView
{


    public static function render($template, array $data = []): string
    {


        //Does template file exists?
        if (!file_exists(dirname(__DIR__) . "/views/" . $template . ".php")) {
            die($template . " file doesnt exists");
        }
        extract($data, EXTR_SKIP);
        ob_start();
        //header
        include __DIR__ . "/../views/{$template}.php";
        //footer
        return ob_get_clean();


    }

    public static function json(array $data = [])
    {
        $myJSON = json_encode($data);
        echo $myJSON;
    }
}
