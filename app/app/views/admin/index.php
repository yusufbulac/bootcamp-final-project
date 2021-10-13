<?php
if ($_SESSION["user_type"] == 4 || (!isset($_SESSION["user_type"]))) {
    \App\helpers\helper::redirect("/");
}


