<?php
    namespace Core;

    use Core\Facade\Layout;
    use Core\Facade\Yield_;
    use Core\Facade\Yields;

    class View {

        function extractName(string $file_path) {
            $view_path = explode('\\', substr($file_path, strrpos($file_path, 'views'))); 
            if(count($view_path) == 3) {
                return $view_path[1] . '.' . explode('.', $view_path[2])[0];
            } 
            return explode('.', $view_path[1])[0];        
        }

        public function render(string $view_name, array $variables) {
            Layout::load($view_name, $variables);
        }

        public function _yield(string $name) {
            Yields::create($name, Yield_::init());
            Layout::set_yield($name);
        }
    }