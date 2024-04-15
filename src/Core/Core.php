<?php

namespace App\Core;

class Core
{
    public static function dispatch(array $routes)
    {
        // dd($routes);

        // isset($_SERVER['REQUEST_URI']) ?? $_SERVER['REQUEST_URI'];

        $prefixController = "App\\Controllers\\";

        foreach ($routes as $route) {
            [$controller, $action] = explode('@', $route['action']);
            // dd($controller, $action);
            $controller = $prefixController . $controller;
            $extendController = new $controller;
            $extendController->$action();
        }
    }
}
