<?php

namespace App\Core;

use App\Controller\ErrorController;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\NoConfigurationException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;

class Router
{

    public function __construct(protected RouteCollection $routeCollection)
    {
    }

    public function __invoke()
    {


        $request = new RequestContext();
        $matcher = new UrlMatcher($this->routeCollection, $request);




        try {
            $match = $matcher->match($_SERVER["REQUEST_URI"]);

            $className = $match["controller"];
            //Does class exists?
            if (class_exists($className)) {
                $instance = new $className;
            } else {
                die("{$className} class does not exists");
            }

        } catch (MethodNotAllowedException $e) {
            http_response_code(405);
            echo ErrorController::page404();
            exit;
        } catch (NoConfigurationException $e) {
            http_response_code(500);
            echo ErrorController::page500();
            exit;
        } catch (ResourceNotFoundException $e) {
            http_response_code(404);
            echo ErrorController::page404();
            exit;
        }






        if (method_exists($className, $match["method"])) {

            call_user_func_array([$instance, $match["method"]], array_slice($match, 2, -1));
        }else{
            die("{$match["method"]} method does not exists");
        }
    }
}
