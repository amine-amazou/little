<?php
    namespace Core;
    use Core\DB;
    use Autoloader;
    use Error;
    class App {
        static function init() {
            try {
                session_start();
                require '../autoloader.php';
                require '../helpers/functions.php';
                Autoloader::registre();
                DB::connect();
                Auth::init();
                include '../routes/web.php';
            } catch (Error $e) {
                echo $e;
            }
        }
    }