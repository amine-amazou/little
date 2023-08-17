<?php
    namespace Core\CLI;

    use Core\Facade\Extractor;
    use Core\Facade\File;
    use Core\Facade\Formater;

    class Generator {
        public function generateMessage($type, $name) {
            return Formater::colorToGreen() . ucfirst(strtolower($type)) . ' successfully created: ' . Formater::colorToWhite() . $name . Extractor::getExtension($type);
        }

        public function generateCode($type, $name) {
            $type = ucfirst($type);
            switch($type) {
                case $type == 'Model' || $type == 'Controller':
                    return str_replace('[]', $name, str_replace('...', $type, File::read('template_model_controller', '/core/CLI/templates/')));
                case 'Middleware':
                    return str_replace('[]', $name, File::read('template_middleware', '/core/CLI/templates/'));
                default:
                    return '';
            }
        }
    }