<?php
    namespace Core\CLI;

use Core\Facade\Creator;
use Core\Facade\Extractor;
use Core\Facade\File;

    class Executor {

        protected static $argv = array();

        public function init(array $argv) {
            static::$argv = $argv;
        }

        private function commandType() {
            return strtolower(Extractor::extractCommandType(static::$argv[1]));
        }
        public function execute() {
            switch($this->commandType()) {
                case 'make':
                    Creator::make(Extractor::extractFileType(static::$argv[1]), static::$argv[2], Extractor::extractShortcut(static::$argv));
                    break;
                case 'help':
                    $this->getHelp();
                    break;
                default:
                    echo 'Invalid command';
            }
        }
        static function getHelp() {
            $content = str_replace('[]', 'AchatController', str_replace('...', 'Controller', File::read('template_model_controller', '/core/CLI/templates/')));
            File::fill('test', 'core/CLI/templates/', '.txt', $content, false);
            //file_put_contents(__DIR__ . '\templates\Mod.txt', str_replace('[]', 'Model', \file_get_contents(__DIR__ . '\templates\template_model_controller.txt')));
        }
    }
