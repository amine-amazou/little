<?php   
    namespace App\Controller;

    use Core\Auth;
    use Core\Facade\File;
    use Core\Request;
    use Error;

    class GeneratorController {

        public function generator() {
            return view('generator');
        }

        public function view(Request $request) {
            $view_name = $request->view_name;
            File::create($view_name, 'ressources/views/', '.view.php');
            return Redirect('generator');
        }

        public function model(Request $request) {
            $model_name = $request->model_name;
            File::create($model_name, 'app/Models/', '.php');
            return Redirect('generator');
        }

        public function controller(Request $request) {
            $controller_name = $request->controller_name;
            File::create($controller_name, 'app/Controllers/', '.php');
            return Redirect('generator');
        }

        public function middleware(Request $request) {
            $middleware_name = $request->middleware_name;
            File::create($middleware_name, 'app/Middlewares/', '.php');
            return Redirect('generator');
        }

        public function migration(Request $request) {
            $migration_name = date('d_m') . '_' . uniqid() . '_' .  'table'. '_' . $request->migration_name;
            File::create($migration_name, 'database/migrations/');
            return Redirect('generator');

        }
    }