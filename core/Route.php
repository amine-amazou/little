<?php
    namespace Core;

use Error;

    class Route {

        public $path;
        public $method;
        public $handler;
        public $function;
        public $middleware;
        public $name;

        function __construct()
        {
            return $this;
        }

        private function handle(string $path, string $method, $handler, $function) {
            $path[0] != '/' && $path = '/' . $path;
            $this->path = $path;
            $this->method = $method;
            $this->handler = $handler;
            $this->function = $function;
        }
        function get(string $path, $handler, string $function=null) {
            $this->handle($path, 'GET', $handler, $function);
            return $this;
        }
        function post(string $path, $handler, string $function=null) {
            $this->handle($path, 'POST', $handler, $function);
            return $this;
        }
        function name($name) {
            $this->name = $name;
            return $this;
        }
        function middleware($middleware) {
            $this->middleware = $middleware;
            return $this;
        }

        function exec() {
            $request = new Request();
            if(!is_null($this->function)) {
                $handler_instance = new $this->handler();
                $func = $this->function;
                $handler_instance->$func($request);
                die();
            }
            call_user_func($this->handler, $request);
        }
       
    }