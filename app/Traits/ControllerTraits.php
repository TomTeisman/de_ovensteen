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
     * @param  string  $routeName
     * @param  array   $parameters
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

    /**
     * Validate the request input
     * 
     * @param  array  $parameters
     * @return array
     */
    public static function validate($keys)
    {
        $return = [];

        foreach ($keys as $key => $rules) {
            $rules = explode('|', $rules);

            foreach ($rules as $rule) {
                switch ($rule) {
                    case 'required':
                        if (!isset($_POST[$key]) || empty($_POST[$key])) {
                            die("error_handling: required");
                        };
                        break;
                    case 'string':
                        if (!is_string($_POST[$key])) {
                            die("error_handling: string");
                        }
                        break;
                    case 'integer':
                        if (!is_integer($_POST[$key])) {
                            die("error_handling: integer");
                        }
                        break;
                    case 'boolean':
                        if (!is_bool($_POST[$key])) {
                            die("error_handling: boolean");
                        }
                        break;
                    case 'numeric':
                        if (!is_numeric($_POST[$key])) {
                            die("error_handling: numeric");
                        }
                        break;
                    case str_contains($rule, 'min'):
                        $rule = explode(":", $rule);
                        
                        if (strlen($_POST[$key]) <= $rule[1]) {
                            die("error_handling: min");
                        }
                        break;
                    case str_contains($rule, 'max'):
                        $rule = explode(":", $rule);

                        if (strlen($_POST[$key]) >= $rule[1]) {
                            die("error_handling: max");
                        }
                        break;
                    default:
                        die("rule: \"" . $rule . "\" is not recognised.");
                        break;
                }
            }
            $return[$key] = $_POST[$key];
        }

        return $return;
    }
}
