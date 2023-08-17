<?php
    namespace App\Middleware;
    
    use App\Middleware\AuthMiddleware;
    use App\Middleware\GuestMiddleware;
    use Core\Kernel\Middleware as MiddlawereKernel;

    class Kernel extends MiddlawereKernel {

        protected static $middlewares = [
            'auth' => AuthMiddleware::class,
            'guest' => GuestMiddleware::class
        ];

    }