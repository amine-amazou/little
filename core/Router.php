<?php
    namespace Core;

    use Core\Facade\Middleware as Middleware;

    class Router {

        static $root_url = '/';

        static $routes = array();

        static function registre(array $routes, string $middleware = null, string $prefix = '') {
            foreach($routes as $route) {
                !is_null($middleware) && $route->middleware($middleware);
                self::$routes[$prefix . $route->path] = $route;
            }
        }

        private static function get_current_path() {
            $url = parse_url($_SERVER['REQUEST_URI'])['path'];
            return self::$root_url != '/' ? '/' . join('/', array_slice(explode("/", $url), 2)) : $url;
        }

        static function get_route_from_name(string $name) {
            foreach(self::$routes as $route) {
                if($route->name == $name || $route->path == '/' . $name) {
                    return $route->path;
                }
            }
        }

        static function listen() {
            $path = self::get_current_path();
            if(array_key_exists($path, self::$routes)) {
                $route = self::$routes[$path];
                Middleware::verify($route->middleware);
                return $route->exec();
            }
            header("HTTP/1.0 404 Not Found");
            die();
        }
    }