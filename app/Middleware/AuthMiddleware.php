<?php
    namespace App\Middleware;

    use Core\Auth;
    use Core\Middleware;

    class AuthMiddleware extends Middleware {

        public static $redirect = '/login';

        static function handler(): bool {
            return Auth::check();
        }

    }