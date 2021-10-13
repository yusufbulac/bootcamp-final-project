<?php

namespace App\Controller;

use App\Model\AdminModel;
use App\Core\MainController;

class AdminController extends MainController
{
    public function index(): void
    {
        echo AdminLayoutController::header();
        $this->render("admin/index");
        echo AdminLayoutController::footer();
    }


}
