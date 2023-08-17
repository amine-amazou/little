<?php
    namespace Core;

    use Core\Facade\Yield_;

    class Yields {
        
        protected static $yields = array();

        public function create(string $yield_name, $yield) {
            if(!array_key_exists($yield_name, static::$yields)) {
                self::$yields[$yield_name] = $yield;
            } 
        }

        public static function get(string $yield_name) {
            if(array_key_exists($yield_name, static::$yields)) {
                return static::$yields[$yield_name];
            }
            return null;

        }
    }