<?php   
    namespace App\Controller;

    use Core\Auth;
    use Core\Request;

    class HomeController {

        public function index() {
            $user = Auth::user();
            return view('index', compact('user'));
        }
        
        public function information() {
            return view('info');
        }

    }