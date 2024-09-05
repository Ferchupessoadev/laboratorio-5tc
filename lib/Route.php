<?php

namespace lib;

class Route
{
    public static $routes = [];

    /**
     * Add a GET route
     * @param string $uri
     * @param callable $callback
     */
    public static function get($uri, $callback): void
    {
        self::$routes[$uri] = $callback;
    }

    /**
     * Add a POST route
     * @param string $uri
     * @param callable $callback
     */
    public static function post($uri, $callback): void
    {
        self::$routes[$uri] = $callback;
    }

    /**
     * Dispatch the route
     */
    public static function start(): void
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = explode('?', $uri)[0];

        foreach (self::$routes as $route => $callback) {
            if ($uri == $route) {
                $callback();
                return;
            }
        }

        header('HTTP/1.0 404 Not Found');
        require 'view/404.php';
    }
}
