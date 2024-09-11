<?php

namespace App\Traits;

trait ControllerTraits
{
    /**
     * Get the given view
     * 
     * @param  string  $view
     * @param  array   $parameters
     * @return void
     */
    public static function view($view, $parameters = []) 
    {
        extract($parameters);

        $basePath = "../app/Views/";
        $path = $basePath . str_replace(".", "/", $view) . ".php";

        return include $path;
    }

    /**
     * Redirect to the given route
     * 
     * @param  string  $route
     * @return void
     */
    public static function redirect($routeName = null, $parameters = [])
    {
        global $routes;

        foreach ($routes as $routeMethods) {
            foreach ($routeMethods as $route) {
                if ($routeName === $route['name']) {
                    
                    $path = $route['path'];
                    
                    foreach ($parameters as $key => $value) {
                        $path = str_replace('{' . $key . '}', $value, $path);
                    }
                    
                    header("Location:" . $path);
                    exit;
                }
            }
        }
    }
}