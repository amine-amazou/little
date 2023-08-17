<?php
    namespace App\Middleware;

    use Core\Middleware;

    class isModerator extends Middleware {

        public static $redirect = '/';

        static function handler(): bool {
            return true;
        }

    }