<?php

namespace App\Controller;


use App\Core\MainView;
use App\Core\MainController;
use App\helpers\helper;
use App\Model\UserModel;

class UserController extends MainController
{

    public function registerPage(): void
    {

        if (isset($_SESSION["user_name"])) {
            helper::redirect("/");
        }
        //USER REGISTER
        if (($_SERVER["REQUEST_METHOD"] == "POST") || isset($_POST["new_user"])) {
            $user_firstname = helper::cleaner($_POST["user_firstname"]);
            $user_lastname = helper::cleaner($_POST["user_lastname"]);
            $user_name = helper::cleaner($_POST["user_name"]);
            $user_age = helper::cleaner($_POST["user_age"]);
            $user_email = helper::cleaner($_POST["user_email"]);
            $user_password = helper::cleaner($_POST["user_password"]);
            $user_password2 = helper::cleaner($_POST["user_password2"]);
            $user_address = helper::cleaner($_POST["user_address"]);
            $user_city = helper::cleaner($_POST["user_city"]);
            $user_country = helper::cleaner($_POST["user_country"]);

            if (empty($user_firstname) || empty($user_lastname) || empty($user_name) || empty($user_age) || empty($user_email) || empty($user_password) || empty($user_password2) || empty($user_address) || empty($user_city) || empty($user_country)) {
                $message = "Please fill out all form fields.";
                helper::flashData("messageRegister", $message);
            } elseif (strlen($user_firstname) < 3 || strlen($user_firstname) > 40 || strlen($user_lastname) > 40 || strlen($user_lastname) < 2 || strlen($user_name) > 40 || strlen($user_name) < 2) {
                $message = "Your username, name and surname must be between 3 and 40 characters.";
                helper::flashData("messageRegister", $message);
            } elseif (25 < strlen($user_password) || strlen($user_password) < 3) {
                $message = "Your password must be between 8 and 25 characters.";
                helper::flashData("messageRegister", $message);
            } elseif (!(preg_match('/^[a-zA-zıİğĞöÖüÜşŞçÇ\s]+$/u', $user_firstname))) {
                $message = "Enter your last name correctly.";
                helper::flashData("messageRegister", $message);
            } elseif (!(preg_match('/^[a-zA-zıİğĞöÖüÜşŞçÇ\s]+$/u', $user_lastname))) {
                $message = "Enter your last name correctly.";
                helper::flashData("messageRegister", $message);
            } elseif (!(filter_var($user_email, FILTER_VALIDATE_EMAIL))) {
                $message = "Your password must contain at least one uppercase letter, one lowercase letter, and one number.";
                helper::flashData("messageRegister", $message);
            } elseif (!preg_match('/^(?=.*[A-ZİĞÖÜŞÇ])(?=.*[a-zığöüşç])(?=.*[0-9]).{8,20}/u', $user_password)) {
                $message = "Your password must contain at least one uppercase letter, one lowercase letter, and one number.";
                helper::flashData("messageRegister", $message);
            } elseif (UserModel::isHave($user_name, $user_email)) {
                $message = "This username or e-mail is used.";
                helper::flashData("messageRegister", $message);
            } else {
                $user_password = md5(md5(md5(sha1($user_password))));
                $add = UserModel::register($user_firstname,
                    $user_lastname,
                    $user_name,
                    $user_age,
                    $user_email,
                    $user_password,
                    $user_address,
                    $user_city,
                    $user_country
                );

                if ($add) {
                    $message = "Your account has been created.";
                    helper::flashData("messageRegister", $message);
                    SessionController::createSession(["user_name" => $user_name, "user_password" => $user_password, "user_id" => $add]);
                    helper::redirect("/");
                } else {
                    $message = "Your account could not be created.";
                    helper::flashData("messageRegister", $message);
                }
            }

        }
        HomeLayoutController::header();
        echo MainView::render("home/register");
        HomeLayoutController::footer();
    }

    public function login(): void
    {
        if (isset($_SESSION["user_name"])) {
            helper::redirect("/");
        }

        //USER LOGIN
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_name = helper::cleaner($_POST["user_name"]);
            $user_password = helper::cleaner($_POST["user_password"]);
            if (empty($user_name) || empty($user_password)) {
                $message = "Please fill out all form fields.";
                helper::flashData("messageLogin", $message);
            } else {
                $user_password = md5(md5(md5(sha1($user_password))));
                $login = UserModel::isUserLogin($user_name, $user_password);
                $userInfo = UserModel::getUserInfoWithUsername($user_name);
                if (!$login == false) {
                    SessionController::createSession(["user_id" => $userInfo->user_id, "user_name" => $user_name, "user_type" => $userInfo->user_type]);
                    $message = "Login successful";
                    helper::flashData("messageLogin", $message);
                    helper::redirect("/");
                } else {
                    $message = "Wrong username or password.";
                    helper::flashData("messageLogin", $message);
                }
            }
        }
        HomeLayoutController::header();
        echo MainView::render("home/login");
        HomeLayoutController::footer();
    }


    public function accountPage(): void
    {
        if (!isset($_SESSION["user_name"])) {
            helper::redirect("/");
        }

        //USER UPDATE
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_user"])) {
            $user_firstname = helper::cleaner($_POST["user_firstname"]);
            $user_lastname = helper::cleaner($_POST["user_lastname"]);
            $user_name = helper::cleaner($_POST["user_name"]);
            $user_age = helper::cleaner($_POST["user_age"]);
            $user_email = helper::cleaner($_POST["user_email"]);
            $user_address = helper::cleaner($_POST["user_address"]);
            $user_city = helper::cleaner($_POST["user_city"]);
            $user_country = helper::cleaner($_POST["user_country"]);
            $user_id = helper::cleaner($_POST["user_id"]);


            $userInfo = UserModel::getUser($user_id);


            if (empty($user_firstname) || empty($user_lastname) || empty($user_name) || empty($user_age) || empty($user_email) || empty($user_address) || empty($user_city) || empty($user_country)) {
                $message = "Please fill out all form fields.";
                helper::flashData("messageUserUpdate", $message);
            } elseif (strlen($user_firstname) < 3 || strlen($user_firstname) > 40 || strlen($user_lastname) > 40 || strlen($user_lastname) < 2 || strlen($user_name) > 40 || strlen($user_name) < 2) {
                $message = "Your username, name and surname must be between 3 and 40 characters.";
                helper::flashData("messageUserUpdate", $message);
            } elseif (!(preg_match('/^[a-zA-zıİğĞöÖüÜşŞçÇ\s]+$/u', $user_firstname))) {
                $message = "Enter your last name correctly.";
                helper::flashData("messageUserUpdate", $message);
            } elseif (!(preg_match('/^[a-zA-zıİğĞöÖüÜşŞçÇ\s]+$/u', $user_lastname))) {
                $message = "Enter your last name correctly.";
                helper::flashData("messageUserUpdate", $message);
            } elseif (!(filter_var($user_email, FILTER_VALIDATE_EMAIL))) {
                $message = "Your password must contain at least one uppercase letter, one lowercase letter, and one number.";
                helper::flashData("messageUserUpdate", $message);
            } elseif (($userInfo->user_name != $user_name || $userInfo->user_email != $user_email) || ($userInfo->user_name != $user_name && $userInfo->user_email != $user_email)) {
                if ((UserModel::isHave($user_name, $user_email))) {
                    $message = "This username or e-mail is used.";
                    helper::flashData("messageUserUpdate", $message);
                }
            } else {
                $update = UserModel::updateUser($user_firstname,
                    $user_lastname,
                    $user_name,
                    $user_age,
                    $user_email,
                    $user_address,
                    $user_city,
                    $user_country,
                    $user_id
                );
                if ($update) {
                    $message = "Your account has been updated.";
                    helper::flashData("messageUserUpdate", $message);
                    SessionController::createSession(["user_name" => $user_name]);
                } else {
                    $message = "Your account could not be updated.";
                    helper::flashData("messageUserUpdate", $message);
                }
            }

        }


        //CHANGE PASSWORD
        if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["change_password"])) {
            $user_id = helper::cleaner($_POST["user_id"]);
            $user_password = helper::cleaner($_POST["user_password"]);
            $user_newpassword = helper::cleaner($_POST["user_newpassword"]);
            $user_newpassword2 = helper::cleaner($_POST["user_newpassword2"]);

            $userInfo = UserModel::getUser($user_id);
            $user_password = md5(md5(md5(sha1($user_password))));

            if (empty($user_password) || empty($user_newpassword) || empty($user_newpassword2)) {
                $message = "Please fill out all form fields.";
                helper::flashData("messageUserUpdate", $message);
            } elseif ($user_password != $userInfo->user_password) {
                $message = "Your current password is incorrect";
                helper::flashData("messageUserUpdate", $message);
            } elseif (25 < strlen($user_newpassword) || strlen($user_newpassword) < 3) {
                $message = "Your password must be between 8 and 25 characters.";
                helper::flashData("messageUserUpdate", $message);
            } elseif (!preg_match('/^(?=.*[A-ZİĞÖÜŞÇ])(?=.*[a-zığöüşç])(?=.*[0-9]).{8,20}/u', $user_newpassword)) {
                $message = "Your password must contain at least one uppercase letter, one lowercase letter, and one number.";
                helper::flashData("messageUserUpdate", $message);
            } elseif ($user_newpassword != $user_newpassword2) {
                $message = "Passwords do not match";
                helper::flashData("messageUserUpdate", $message);
            } else {
                $user_newpassword = md5(md5(md5(sha1($user_newpassword))));

                $update = UserModel::updatePassword($user_newpassword,
                    $user_id
                );
                if ($update) {
                    $message = "Your password has been successfully changed.";
                    helper::flashData("messageUserUpdate", $message);
                } else {
                    $message = "Your password could not be changed.";
                    helper::flashData("messageUserUpdate", $message);
                }
            }

        }

        //USER DELETE
        if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["delete_me"]) && isset($_POST["delete_acc"])) {
            $user_id = helper::cleaner($_POST["user_id"]);
            $user_password = helper::cleaner($_POST["user_password"]);

            $user_password = md5(md5(md5(sha1($user_password))));
            $userInfo = UserModel::getUser($user_id);

            if ($user_password != $userInfo->user_password) {
                $message = "Your current password is incorrect";
                helper::flashData("messageUserUpdate", $message);
            } else {

                $delete = UserModel::deleteUser($user_id);

                if ($delete) {
                    $message = "K.O.";
                    session_destroy();
                    helper::flashData("messageUserUpdate", $message);
                    helper::redirect("/");
                } else {
                    $message = "You are lucky.";
                    helper::flashData("messageUserUpdate", $message);
                }
            }
        }

        //USER COMMENTS
        $user_id = helper::cleaner($_SESSION["user_id"]);

        $userComment = UserModel::userComment($user_id);


        //USER COMMENTS DELETE
        if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["delete_comment"])) {
            $comment_id = helper::cleaner($_POST["comment_id"]);
            $delete = UserModel::deleteComment($comment_id);

            if ($delete) {
                $message = "Comment Deleted";
                helper::flashData("messageUserUpdate", $message);
                helper::redirect("/account");
            } else {
                $message = "Something is wrong";
                helper::flashData("messageUserUpdate", $message);
            }
        }

        //MY NEWS
        $allCategory = UserModel::allCategory();
        $myCategory = UserModel::myCategory($user_id);

        if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["myNews"])) {

            $user_id = helper::cleaner($_POST["user_id"]);
            UserModel::deleteAllMyNews($user_id);


            foreach ($_POST["category"] as $category_id) {
                $user_id = helper::cleaner($_POST["user_id"]);
                $category_id = helper::cleaner($category_id);

                UserModel::setMyNews($user_id, $category_id);

            }
            helper::redirect("/account");
        }


        $user_id = helper::cleaner($_SESSION["user_id"]);
        $userInfo = UserModel::getUser($user_id);
        HomeLayoutController::header();
        echo MainView::render("home/account",
            [
                "userInfo" => $userInfo,
                "userComment" => $userComment,
                "myCategory" => $myCategory,
                "allCategory" => $allCategory
            ]);
        HomeLayoutController::footer();
    }


}
