<?php

    use Core\Facade\Layout;
    use Core\Facade\View;
    use Core\Facade\Yields;
    use Core\Router;

    $yields = array();
    function view(string $name, array $variables = []) {
        try {
            View::render($name, $variables);
        } catch (Error $e) {
            echo $e;
        }
    }

    function route(string $name) {
        return Router::get_route_from_name($name);
    }

    function Redirect(string $path) {
        header('Location: ' . $path);
    }

    function is(string $session_variable) {
        return !empty($_SESSION[$session_variable]);
    }

    function _session_set(string $variable_name, $value = true) {
        $_SESSION[$variable_name] = $value;
    }

    function _session_unset(string $variable_name) {
        unset($_SESSION[$variable_name]);
    }
    function _session_get(string $variable_name) {
        return $_SESSION[$variable_name];
    }

    function dd(...$callbacks) {
        foreach($callbacks as $callback) {
            echo '<pre>';
            var_dump($callback);
            echo '</pre>';
        }
        
        die();
    }

    function _yield(string $name) {
        return Yields::get($name)->content;
    }

    function _extends(string $master_view) {
        Layout::set_master($master_view);
    }
    function _section(string $yield_name) {
        View::_yield($yield_name);
    }

    function asset(string $path) {
        return '../public/' . $path;
    }