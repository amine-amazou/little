<?php
    namespace Core;

    use App\Kernel;

    class Route {

        private static $root_url = '/';
        static $routes = array();

        static function get(string $path, $handler, $function = '', string $name = '', string $middleware = '') {
           self::addHandler('GET', $path, $handler, $function, $name, $middleware);
        }
        static function post(string $path, $handler, $function = '', string $name = '', string $middleware = '') {
            self::addHandler('POST', $path, $handler, $function, $name, $middleware);
        }

        private static function get_current_path() {
            $url = parse_url($_SERVER['REQUEST_URI'])['path'];
            return self::$root_url != '/' ? '/' . join('/', array_slice(explode("/", $url), 2)) : $url;
        }
        static function get_route_from_name(string $name) {
            foreach(self::$routes as $route) {
                if($route['name'] == $name || $route['path'] == '/' . $name) {
                    return $route['path'];
                }
            }
        }
        private static function get_func(string $route) {
            if(self::$routes[$route]['function'] == '') {
                return self::$routes[$route]['handler'];
            } else {
                return self::$routes[$route]['handler'] . '::' . self::$routes[$route]['function'];
            }
        }

        private static function addHandler(string $method, string $path, $handler, $function, $name, $middleware) {
            $path[0] != '/' && $path = '/' . $path;
            $name == '' && $name = $path;
            self::$routes[$method . $path] = [
                'path' => $path,
                'method' => $method,
                'handler' => $handler,
                'function' => $function,
                'name' => $name,
                'middleware' => $middleware
            ];
        }

        static function init() {
            $route = $_SERVER['REQUEST_METHOD'] . self::get_current_path();
            if(array_key_exists($route, self::$routes)) {
                if(self::$routes[$route]['middleware'] != '') {
                    $middleware = self::$routes[$route]['middleware'];
                    !(Kernel::get_m_class($middleware)::handler()) && Redirect(Kernel::get_m_class($middleware)::$redirect);
                }
                return call_user_func(self::get_func($route), array($_GET, $_POST));
            }
            header("HTTP/1.0 404 Not Found");
            die();
        }
    }