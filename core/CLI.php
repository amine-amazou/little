<?php
    namespace Core;
    use Autoloader;
    use Core\Facade\Executor;

    class CLI {
        static function init(array $argv) {
            require_once __DIR__ . '\..\autoloader.php';
            require __DIR__ . '\..\helpers\functions.php';
            Autoloader::registre();
            Executor::init($argv);
            Executor::execute();
        }
    }