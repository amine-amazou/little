<?php
    namespace Core\Kernel;

    class Middleware {
        
        protected static $middlewares = array();

        private function get_m_class(string $name) {
            return static::$middlewares[$name];
        }

        public function verify(string $name) {
            if(!is_null($name)) {
                $middleware = $this->get_m_class($name);
                if(!$middleware::handler()) {
                    return Redirect($middleware::$redirect);
                }
            }
        }

    }