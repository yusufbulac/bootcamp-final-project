<?php


namespace App\Core;


class MainController
{
    public static function render($template, array $data = [])
    {
        echo MainView::render($template, $data);
    }

    public static function json(array $data = [])
    {
        echo MainView::json($data);
    }
}
