<?php

namespace App;

class Route
{
    public $routes = [];

    /**
     * Add a new route
     * 
     * @param  string           $method   HTTP method of the route (GET, POST, PUT, PATCH, DELETE)
     * @param  string           $path     URL path of the route
     * @param  callable|string  $handler  Function or "Controller@method" to handle the request
     */
    private static function add_route($method, $path, $handler)
    {
        global $routes;
        $routes[strtoupper($method)][] =
            [
                'path' => $path,
                'handler' => $handler,
            ];
    }

    /**
     * Handle the incomming request
     * 
     * @param  string  $url     Request URL
     * @param  string  $method  HTTP method
     */
    public static function handle_request($url, $method)
    {
        global $routes;

        foreach ($routes[$method] as $route) {
            $path = $route['path'];
            $handler = $route['handler'];

            // Convert dynamic parts like {id} to regex patterns
            $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[^/]+)', $path);
            $pattern = str_replace('/', '\/', $pattern);
            $pattern = '/^' . $pattern . '$/';

            // Check if the current route matches the requested URL
            if (preg_match($pattern, $url, $matches)) {
                // Extract named parameters from the matches
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                // If the handler is a callable function
                if (is_callable($handler)) {
                    return call_user_func_array($handler, $params);
                }

                // If the handler is a string like "Controller@method"
                if (is_string($handler)) {
                    list($controller, $action) = explode('@', $handler);
                    $controller = "App\\Controllers\\" . $controller;

                    if (class_exists($controller)) {
                        $controllerInstance = new $controller();
                        if (method_exists($controllerInstance, $action)) {
                            return call_user_func_array([$controllerInstance, $action], $params);
                        }
                    }
                }
            }
        }

        http_response_code(404);
        echo "404 - Not Found";
    }

    /**
     * Register a new route with GET method
     */
    public static function get(string $url, string $handler)
    {
        static::add_route("GET", $url, $handler);
    }
}
