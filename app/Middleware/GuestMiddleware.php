<?php
    namespace App\Middleware;

    use Core\Auth;
    use Core\Middleware;

    class GuestMiddleware extends Middleware {

        public static $redirect = '/';

        static function handler(): bool {
            return !Auth::check();
        }

    }