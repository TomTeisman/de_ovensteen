<?php

namespace App;

class Route
{
    public $routes = [];

    /**
     * Add a new route
     * 
     * @param  string           $method      HTTP method of the route (GET, POST, PUT, PATCH, DELETE)
     * @param  string           $path        URL path of the route
     * @param  callable|string  $handler     Function or "Controller@method" to handle the request
     * @param  array            $middleware  The middleware to execute before route handeling
     * @param  string           $name        The name of the route
     */
    private static function add_route($method, $path, $handler, $middleware, $name)
    {
        global $routes;
        $routes[strtoupper($method)][] =
            [
                'path' => $path,
                'handler' => $handler,
                'middleware' => $middleware,
                'name' => $name
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
            $middleware = $route['middleware'] ?? [];

            // Convert dynamic parts like {id} to regex patterns
            $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[^/]+)', $path);
            $pattern = str_replace('/', '\/', $pattern);
            $pattern = '/^' . $pattern . '$/';

            // Check if the current route matches the requested URL
            if (preg_match($pattern, $url, $matches)) {
                // Extract named parameters from the matches
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                // Execute middleware
                foreach ($middleware as $mw) {
                    $middlewareClass = "App\\Controllers\\Middleware\\$mw[class]";
                    if (class_exists($middlewareClass)) {
                        // check if middleware gets parameters 
                        if (isset($mw["parameters"])) {
                            $middlewareClass::handle($mw["parameters"]);
                        } else {
                            $middlewareClass::handle();
                        }
                    }
                }
                
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
     * Set a name for a route
     * 
     * @param  string  $handler
     */
    protected static function setDefaultName(string $handler)
    {
        $splitHandler = explode('@', $handler);
        $controllerName = strtolower(str_replace('Controller', '', $splitHandler[0]));
        $functionName = $splitHandler[1];
        
        $name = $controllerName . '.' . $functionName;
        return $name;
    }

    /**
     * Resolve what middleware to execute with wich parameters
     * 
     * @param  array  $middlewares
     */
    protected static function resolveMiddleware(array $middlewares)
    {
        $return = [];

        if (!empty($middlewares) && $middlewares !== null) {
            foreach ($middlewares as $middleware) {
                if (str_contains($middleware, ":")) {
                    $middleware = explode(":", $middleware);
                    $class = $middleware[0];
                    $parameters = explode(",", $middleware[1]);

                    $middleware = [
                        "class" => $class,
                        "parameters" => $parameters
                    ];

                    array_push($return, $middleware);
                } else {
                    $middleware = [
                        "class" => $middleware
                    ];
                    
                    array_push($return, $middleware);
                }
            }
        }

        return $return;
    }

    /**
     * Register a new route with GET method
     */
    public static function get(string $url, string $handler, array $middleware = [], string $name = null)
    {
        if ($name === null) {
            $name = static::setDefaultName($handler);
        }

        $resolvedMiddleware = static::resolveMiddleware($middleware);

        static::add_route("GET", $url, $handler, $resolvedMiddleware, $name);
    }

    /**
     * Register a new route with POST method
     */
    public static function post(string $url, string $handler, array $middleware = [], string $name = null)
    {
        if ($name === null) {
            $name = static::setDefaultName($handler);
        }

        static::add_route("POST", $url, $handler, $middleware, $name);
    }
}
