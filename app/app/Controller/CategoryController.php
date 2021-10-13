<?php

namespace App\Controller;

use App\Core\MainController;
use App\Model\CategoryModel;


class CategoryController extends MainController
{

    public function categories(): void
    {
        echo HomeLayoutController::header();

        $categories = CategoryModel::categories();
        $this->render("home/categories", ["categories" => $categories]);
        echo HomeLayoutController::footer();
    }

    public function category(string $name): void
    {
        echo HomeLayoutController::header();

        $category = CategoryModel::category($name);

        $categoryid = $category[0]->category_id;
        $news = CategoryModel::news($categoryid);

        $categories = CategoryModel::categories();

        $this->render("home/category", ["category" => $category, "news" => $news, "categories" => $categories]);
        echo HomeLayoutController::footer();
    }
}