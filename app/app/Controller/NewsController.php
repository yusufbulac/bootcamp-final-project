<?php

namespace App\Controller;


use App\Model\NewsModel;
use App\Core\MainController;
use App\helpers\helper;

class NewsController extends MainController
{
    public function news(string $name): void
    {

        if (($_SERVER["REQUEST_METHOD"] == "POST") || isset($_POST["new_comment"])) {

            $user_name = helper::cleaner($_SESSION["user_name"]);
            $user_id = helper::cleaner($_SESSION["user_id"]);
            $news_id = helper::cleaner($_POST["news_id"]);
            $comment_title = helper::cleaner($_POST["comment_title"]);
            $comment_content = helper::cleaner($_POST["comment_content"]);

            if (isset($_POST["anonymous"])) {
                $comment_isanonymous = 1;
            } else {
                $comment_isanonymous = 0;
            }
            if (empty($comment_title) || empty($comment_content)) {
                $message = "Please fill out all form fields.";
                helper::flashData("messageRegister", $message);
            } else {
                $add = NewsModel::newComment($user_id,
                    $news_id,
                    $comment_title,
                    $comment_content,
                    $comment_isanonymous
                );

                if ($add) {
                    $message = "Your comment has been created.";
                    helper::flashData("messageRegister", $message);
                    helper::redirect($_SERVER['HTTP_REFERER']);
                } else {
                    $message = "Something went wrong.";
                    helper::flashData("messageRegister", $message);
                }
            }

        }


        echo HomeLayoutController::header();
        $news = NewsModel::news($name);

        $news_id = $news->news_id;
        $comments = NewsModel::comments($news_id);

        $otherNews = NewsModel::otherNews("1", "3");

        $categories = NewsModel::categories();

        $this->render("home/news", [
            "news" => $news,
            "comments" => $comments,
            "otherNews" => $otherNews,
            "categories" => $categories
        ]);

        echo HomeLayoutController::footer();
    }


    //MY NEWS
    public function myNews()
    {
        $categories = NewsModel::categories();
        $user_id = helper::cleaner($_SESSION["user_id"]);
        $myNews = NewsModel::myNews($user_id);

        echo HomeLayoutController::header();

        $this->render("home/mynews", [
            "myNews" => $myNews,
            "categories" => $categories]);
        echo HomeLayoutController::footer();
    }


}
