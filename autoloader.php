<?php
    class Autoloader {

        protected static $folders = array(
            'Controller' => array('Auth'),
            'Model' => array(),
            'Middleware' => array()
        );

        private static function searchFolder($path, $class_name) {
            foreach(self::$folders as $key => $value) {
                if(stripos($path, $key)) {
                    $pos = stripos($class_name, array_reverse(explode('\\', $class_name))[0]) + 41;
                    foreach($value as $folder) {
                        $n_path = substr($path, 0, $pos) . $folder . '/' . substr($path, $pos);
                        if(file_exists($n_path)) {
                            return $n_path;
                        }
                    }
                }
            }
        }
        static function registre() {
            spl_autoload_register(array(__CLASS__, 'autoload'));
        }

        static function autoload($class_name) {
            $path = __DIR__ . '/' . lcfirst(str_replace('\\', '/', $class_name)) . '.php';
            file_exists($path) ? require $path : require static::searchFolder($path, $class_name);
        }
    }