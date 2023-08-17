<?php
    namespace App\Middleware;

    use Core\Middleware;

    class isEditor extends Middleware {

        public static $redirect = '/';

        static function handler(): bool {
            return true;
        }

    }