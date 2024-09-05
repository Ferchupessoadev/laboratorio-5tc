<?php

namespace lib;

class Route
{
    public static $routes = [];

    public static function get($uri, $callback)
    {
        self::$routes[$uri] = $callback;
    }

    public static function post($uri, $callback)
    {
        self::$routes[$uri] = $callback;
    }

    public static function start()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = explode('?', $uri)[0];

        foreach (self::$routes as $route => $callback) {
            if ($uri == $route) {
                $callback();
                return;
            }
        }
    }
}
