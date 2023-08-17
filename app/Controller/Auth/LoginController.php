<?php

    namespace App\Controller;
    use Core\DB;

    class LoginController {

        protected $redirect = '/';

        public function login() {
            _session_set('logged', DB::execFunc('log_in', 'id', [$_POST['username'], $_POST['password']]));
            _session_get('logged') && Redirect('/');
            Redirect('/login');
        }

        public function logout() {
            _session_unset('logged', 0);
            Redirect($this->redirect);
        }
        
    }
