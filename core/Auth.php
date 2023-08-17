<?php
    namespace Core;

    use App\Controller\LoginController;
    use Core\DB;
    use Core\Facade\Route;
    use Error;

    class Auth {

        private static $logged;
        private static $user;

        static function check() {
            return self::$logged !== 0 && !is_null(self::$logged);
        }

        private static function set_logged_user() {
            if(self::$logged) {
                $id = self::$logged;
                return DB::query("SELECT * FROM utilisateurs WHERE id = '$id' ", 'User');
            } 
            return null;
        }

        static function login() {
            
            $username = $_POST['username'];
            $password_ = $_POST['password'];
            try {
                $successful = DB::execFunc('log_in', 'successful', [$username, $password_])->successful;
                self::$user = DB::query("SELECT * FROM utilisateurs WHERE id = '$successful'", 'User');
            } catch (Error $e) {
                echo $e;
            }
            
            $successful && _session_set('logged', $successful);
            Redirect('/');
        }
        static function logout() {
            _session_unset('logged');
        }

        static function user() {
            return self::$user;
        }

        static function init() {
            self::$logged = _session_get('logged');
            self::$user = self::set_logged_user();
        }

        static function routes() {
            return [

                Route::get('/registre', function (Request $request) {
                    $x = $request->x;
                    return view('auth.registre', compact('x'));
                }),
        
                Route::get('/login', function () {
                    return view('auth.login');
                }),
        
                Route::post('/log_in', LoginController::class, 'login')->name('auth.login'),
                Route::post('/log_out', LoginController::class, 'logout')->name('auth.logout'),
        
            ];
        }
    }