<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

/***
 *
 *
 * GET  /user   ->  UserController@index
 * POST /user   ->  UserController@insert
 * GET /user/*  ->  UserController@show
 *
 */

$routes = new RouteCollection();



/**HOME START*/

$routes->add(
    "index",
    new Route("/", ["controller" => \App\Controller\HomeController::class, "method" => "index"])
);

$routes->add(
    "about",
    new Route("/about", ["controller" => \App\Controller\HomeController::class, "method" => "about"])
);


$routes->add(
    "contact",
    new Route("/contact", ["controller" => \App\Controller\HomeController::class, "method" => "contact"])
);


/**HOME END*/


/**NEWS START */
$routes->add(
    "news",
    new Route("/news/{name}", ["controller" => \App\Controller\NewsController::class, "method" => "news"])
);

$routes->add(
    "mynews",
    new Route("/mynews", ["controller" => \App\Controller\NewsController::class, "method" => "myNews"])
);

/**NEWS END */


/**CATEGORY START */
$routes->add(
    "categories",
    new Route("/category", ["controller" => \App\Controller\CategoryController::class, "method" => "categories"])
);

$routes->add(
    "category",
    new Route("/category/{name}", ["controller" => \App\Controller\CategoryController::class, "method" => "category"])
);

/**CATEGORY END */


/**USER START */
$routes->add(
    "register",
    new Route("/register", ["controller" => \App\Controller\UserController::class, "method" => "registerPage"])
);

$routes->add(
    "account",
    new Route("/account", ["controller" => \App\Controller\UserController::class, "method" => "accountPage"])
);

$routes->add(
    "login",
    new Route("/login", ["controller" => \App\Controller\UserController::class, "method" => "login"])
);
/**USER END */


/**LOGOUT START */

$routes->add(
    "logout",
    new Route("/logout", ["controller" => \App\Controller\LogoutController::class, "method" => "logout"])
);

/**LOGOUT END */


/**ADMIN START*/

$routes->add(
    "admin",
    new Route("/admin", ["controller" => \App\Controller\AdminController::class, "method" => "index"])
);

/**ADMIN END*/

/**API START*/


$routes->add(
    "apinews",
    new Route("/api/news/{name}", ["controller" => \App\Controller\ApiController::class, "method" => "news"])
);

$routes->add(
    "apinews",
    new Route("/api/category/{name}", ["controller" => \App\Controller\ApiController::class, "method" => "newsAsCategory"])
);


/**API END*/
$routes->add(
    "user",
    new Route("/user", ["controller" => \App\Controller\UserController::class, "method" => "index"])
);


$routes->add(
    "user.show",
    new Route("/user/{name}", ["controller" => \App\Controller\UserController::class, "method" => "show"], ["name" => "[A-Za-z0-9]+"])
);

$routes->add(
    "user.full",
    new Route(
        "/user/{name}/{surname}/{age}",
        ["controller" => \App\Controller\UserController::class, "method" => "full"],
        ["name" => "[A-Za-z0-9]+", "surname" => "[A-Za-z0-9]+", "age" => "[0-9]+"]
    )
);


return $routes;
