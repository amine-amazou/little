<?php

    use Core\Auth;
    use Core\Router as Router;
    use Core\Facade\Route as Route;

    Router::registre(Auth::routes(), 'guest');

    Router::registre([
        Route::get('/welcome', function () {
            return view('welcome');
        }),
        Route::get('/', App\Controller\HomeController::class, 'index')->name('home'),
        Route::get('/info', App\Controller\HomeController::class, 'information')->name('info')
        
    ], 'auth');
    
    Router::listen();