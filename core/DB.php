<?php
    namespace Core;

    use PDO;

    define('DB_NAME', 'blog_db');
    define('DB_HOST', '127.0.0.1');
    define('DB_PORT', '3307');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'root');

    class DB {

        private static $pdo;

        static function connect() {
            $dsn = "mysql:dbname=" . DB_NAME . ";host=" . DB_HOST . ':' . DB_PORT;
            self::$pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
        } 
        
        private static function implodeParams($params) {
            return " '" . implode("', '", $params) . "' ";
        }

        private static function generateStatement($f, $params) {
            return $f . '(' . self::implodeParams($params) . ') ';
        }

        public static function query($statement, $class = null) {
            is_null($class) ? $result = self::$pdo->query($statement)->fetchAll(PDO::FETCH_OBJ) : $result = self::$pdo->query($statement)->fetchAll(PDO::FETCH_CLASS, 'App\Model\\' . ucfirst($class));
            return count($result) == 1 ? $result[0] : $result;
        }

        public static function execProc($procedure, $params = []) {
            $statement = 'CALL ' . self::generateStatement($procedure, $params);
            return self::query($statement);        
        }
        
        public static function execFunc($function, $as = 'data', $params = []) {
            $statement = 'SELECT ' . self::generateStatement($function, $params) . "as $as";
            return self::query($statement)->$as;
        }
    }