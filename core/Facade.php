<?php
    namespace Core;

    class Facade {

        protected static $class;
        
        public static function __callStatic($name, $arguments)
        {
            $class_ = static::$class;
            return call_user_func_array([
                new $class_(),
                $name
            ], $arguments);
        }
    }