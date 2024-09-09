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
    public static function redirect($paramRoute = null)
    {
        global $routes;
        
        foreach ($routes as $route) {
            foreach ($route as $r) {
                if ($paramRoute === $r['name']) {
                    header("Location:" . $r['path']);
                }
            }
        }
    }
}