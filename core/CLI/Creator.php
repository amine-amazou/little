<?php
    namespace Core\CLI;

    use Core\Facade\Extractor;
    use Core\Facade\File;
    use Core\Facade\Generator;

    class Creator {

        private static function makeFile($name, $type) {
            $directory = Extractor::getDirectory($type);
            $extension = Extractor::getExtension($type);
            $content = Generator::generateCode($type, $name);
            File::create($name, $directory, $extension);
            File::fill($name, $directory, $extension, $content);
            echo Generator::generateMessage($type, $name);
        }


        public function make(string $file_type, string $name, $shortcut) {
            switch($shortcut) {
                case 'all':
                    static::makeFile($name, 'view');
                    static::makeFile($name, 'controller');
                    static::makeFile($name, 'model');
                    static::makeFile($name, 'middleware');
                    break;
                default:
                    static::makeFile($name, strtolower($file_type));
                    break;
            }
        }
    }